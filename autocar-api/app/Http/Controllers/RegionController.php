<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends ApiController
{
    # Crear una Region #
    public function createRegion(Request $request)
    {
        try {
            $this->validateRequest($request, 'regions');

            DB::beginTransaction();

            $region = Region::create($request->all());

            $region->save();

            DB::commit();

            return $this->responseApi($region);
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Obtener Todas las Regiones Registrados #
    public function getAllRegions()
    {
        try {
            $regions = Region::all();
            return $this->responseApi($regions);
        } catch (Exception $error) {
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Obtener una region por ID #
    public function getRegion(Request $request)
    {
        try {
            $region = Region::find($request->id);
            return $this->responseApi($region);
        } catch (Exception $error) {
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Actualizar una region #
    public function updateRegion(Request $request)
    {
        try {
            $this->validateRequest($request, 'regions');

            DB::beginTransaction();

            $region = Region::find($request->id);
            unset($request->id);

            if(!$region) throw new Exception("doesnt_exist");
            $region->update($request->all());

            DB::commit();

            return $this->responseApi($region);
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }

    # Eliminar una region #
    public function deleteRegion(Request $request)
    {
        try {
            DB::beginTransaction();

            $region = Region::find($request->id);
            
            if(!$region) throw new Exception("doesnt_exist");
            
            $region->delete();

            DB::commit();

            return $this->responseApi();
        } catch (Exception $error) {
            DB::rollback();
            $code = $this->getErrorCode($error->getCode());
            return $this->responseApi($error->getMessage(), $code);
        }
    }
}
