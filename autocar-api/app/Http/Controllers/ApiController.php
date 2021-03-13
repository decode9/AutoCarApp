<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    /**
     * Response
     */
    protected function responseApi($result = null, $code = 200)
    {
        return response()->json(['result' => $result], $code);
    }

    protected function getErrorCode($error)
    {
        return $error >= 300 && $error <= 505 ? $error : 500;
    }

    protected function validateRequest($request, $rule = '')
    {
        $rules = $this->getRules($rule);
        $validator = Validator::make($request->all(), $rules);
        $errors = $validator->fails() ? $validator->errors() : [];


        if (count($errors)) {
            $errors = $errors->messages();
            $stringError = '';

            foreach ($errors as $key => $error) {
                foreach ($error as $err) {
                    $new_string = $this->replaceString($key, $err);
                    $stringError = $new_string . ' ' . $stringError;
                }
            }

            throw new Exception($stringError, 422);
        }
        return false;
    }

    private function getRules($flag)
    {
        return config('rules.' . $flag);
    }

    private function replaceString($key, $value)
    {
        $array_value = explode('_', $key);
        $old_string = $this->countLabels($array_value);

        $new_string = ' ' . __($key);
        $replace_string = str_replace($old_string, $new_string, $value);

        return $replace_string;
    }

    private function countLabels($values)
    {
        $word = '';
        foreach ($values as $value) $word = "$word $value";
        return $word;
    }
}
