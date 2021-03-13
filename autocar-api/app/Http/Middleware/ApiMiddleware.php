<?php

namespace App\Http\Middleware;

use Exception;
use Closure;

class ApiMiddleware
{
    protected function responseApi($message, $code)
    {
        return response()->json($message, $code);
    }

    protected function returnJsonToArray($result)
    {
        $result = json_encode($result);
        $result = json_decode($result, 1);
        $result = $result['original'];

        return $result;
    }
}