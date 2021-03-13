<?php

namespace App\Http\Controllers;

use App\Models\Concessionaire;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConcessionaireController extends ApiController
{
    # Crear un Concesionario #
    public function createConcessionaire(Request $request)
    {
        try {
            $this->validateRequest($request, 'concessionaires');

            $region = $request->region_id;
            unset($request['region_id']);

            DB::beginTransaction();

            $concessionaire = Concessionaire::create($request->all());
            $concessionaire->region()->associate($region);
            $concessionaire->save();

            $concessionaire = Concessionaire::With('region')->find($concessionaire->id);

            DB::commit();

            return $this->responseApi($concessionaire);
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Obtener Todos los Concessionairees Registrados #
    public function getAllConcessionaires()
    {
        try {
            $concessionaires = Concessionaire::With('region')->get();
            return $this->responseApi($concessionaires);
        } catch (Exception $error) {
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    public function getTableConcessionaires(Request $request)
    {
        try {
            $per_page = ($request['per_page']) ? $request['per_page'] : '10';
            $concessionaires = Concessionaire::With('region')->paginate($per_page);
            return $this->responseApi($concessionaires);
        } catch (Exception $error) {
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Obtener un concessionairee por ID #
    public function getConcessionaire(Request $request)
    {
        try {
            $concessionaire = Concessionaire::With('region')->find($request->id);
            return $this->responseApi($concessionaire);
        } catch (Exception $error) {
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Actualizar un concessionairee #
    public function updateConcessionaire(Request $request)
    {
        try {
            $this->validateRequest($request, 'update_concessionaires');

            DB::beginTransaction();

            $region = $request->region_id;
            unset($request['region_id']);

            $concessionaire = Concessionaire::With('region')->find($request->id);

            if (!$concessionaire) throw new Exception("doesnt_exist");

            $concessionaire->update($request->all());
            $concessionaire->region()->associate($region);

            $concessionaire->save();

            $concessionaire->refresh();

            unset($concessionaire['region_id']);
            DB::commit();

            return $this->responseApi($concessionaire);
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Eliminar un concessionairee #
    public function deleteConcessionaire(Request $request)
    {
        try {
            DB::beginTransaction();

            $concessionaire = Concessionaire::find($request->id);
            if (!$concessionaire) throw new Exception("doesnt_exist");
            $concessionaire->delete();

            DB::commit();

            return $this->responseApi();
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }
}
