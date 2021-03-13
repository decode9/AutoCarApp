<?php

namespace App\Http\Controllers;

use App\Models\Client;
use PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends ApiController
{

    # Crear un Cliente #
    public function createClient(Request $request)
    {
        try {
            $this->validateRequest($request, 'clients');

            DB::beginTransaction();

            $concessionaire = $request->concessionaire_id;
            unset($request['concessionaire_id']);

            $client = Client::create($request->all());
            $client->concessionaire()->associate($concessionaire);
            $client->save();

            $client = Client::With('concessionaire', 'concessionaire.region')->find($client->id);

            DB::commit();

            return $this->responseApi($client);
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Obtener Todos los Clientes Registrados #
    public function getAllClients()
    {
        try {
            $clients = Client::With('concessionaire', 'concessionaire.region')->get();
            return $this->responseApi($clients);
        } catch (Exception $error) {
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Obtener un cliente por ID #
    public function getClient(Request $request)
    {
        try {
            $client = Client::With('concessionaire', 'concessionaire.region')->find($request->id);
            return $this->responseApi($client);
        } catch (Exception $error) {
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Actualizar un cliente #
    public function updateClient(Request $request)
    {
        try {
            $this->validateRequest($request, 'update_clients');

            DB::beginTransaction();

            $concessionaire = $request->concessionaire_id;
            unset($request['concessionaire_id']);

            $client = Client::find($request->id);

            if (!$client) throw new Exception("doesnt_exist");
            $client->update($request->all());
            $client->concessionaire()->associate($concessionaire);
            $client->save();

            $client = Client::with('concessionaire', 'concessionaire.region')->find($request->id);

            unset($client['concessionaire_id']);

            DB::commit();

            return $this->responseApi($client);
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Eliminar un cliente #
    public function deleteClient(Request $request)
    {
        try {
            DB::beginTransaction();

            $client = Client::find($request->id);

            $client->status = false;

            $client->save();

            DB::commit();

            return $this->responseApi('success');
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    public function generateReport(Request $request)
    {
        $user = $request->auth;
        $data = [
            'user' => $user->name,
            'title' => 'Clientes',
            'subtitle' => 'Reporte de clientes',
            'date' => Carbon::now()->toFormattedDateString(),
        ];

        $data['keys'] = ['id', 'name', 'id_number', 'email', 'phone_number', 'concessionaire', 'region', 'status'];

        $clients = Client::With('concessionaire', 'concessionaire.region')->get();

        $records = $clients->map(function ($client) use ($data) {
            $new_client = [];
            foreach ($data['keys'] as $key) {
                if (gettype($client[$key]) == "object") {
                    $new_client[$key] = $client[$key]['name'];
                    $new_client['region'] = $client[$key]['region']['name'];
                    continue;
                }
                if ($client[$key]) $new_client[$key] = $client[$key];
                if ($key == "status") $new_client[$key] = ($client[$key]) ? 'Activo' : 'Inactivo';
            }
            return $new_client;
        });

        $data['users'] = $clients->count();
        $data['records'] = $records;

        $pdf = PDF::loadView('report/clients', $data);
        return $pdf->download('report.pdf');
        
    }
}
