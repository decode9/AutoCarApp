<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class AuthController extends ApiController
{

    public function login(Request $request)
    {
        try {
            $this->validateRequest($request, 'login_data');

            DB::beginTransaction();

            $user = User::where('email', $request->email)->first();

            if ($user) {
                $loginInfo = $this->validateUser($user, $request);

                if (isset($loginInfo['message'])) {
                    DB::commit();
                    return $this->responseApi(null, 401);
                }

                DB::commit();

                return $this->responseApi($loginInfo);
            }

            throw new Exception('invalid_email', 400);
        } catch (Exception $e) {
            DB::rollback();

            $code = $this->getErrorCode($e->getCode());
            return $this->responseApi($e->getMessage(), $code);
        }
    }

    public function logout(Request $request)
    {
        try {
            DB::beginTransaction();

            $token = $request->header('AuthorizationToken');

            if ($token) {
                $user = $request->auth;

                $token = ['jwt_token' => $token];

                $user->token_blacklists()->updateOrCreate($token, $token);
                
                $user->push();

                DB::commit();
                return $this->responseApi();
            }

            throw new Exception('token_not_found', 400);
        } catch (Exception $e) {
            DB::rollback();

            $code = $this->getErrorCode($e->getCode());
            return $this->responseApi($e->getMessage(), $code);
        }
    }

    /**
     * Payload JWT
     */
    private function jwt($user)
    {
        $time_expired = (int) env('JWT_TIME_EXPIRED');
        $payload = [
            'iss' => 'autocar-jwt',
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + $time_expired
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }

    /* Validacion de usuario */
    private function validateUser($user, $request)
    {
        $password = $request->password;
        $password = Hash::check($password, $user->password);
        if ($password) {
            return $this->getJWT($user);
        }

        throw new Exception('invalid_password', 400);
    }

    /* Retornar El Token de la sesion */
    private function getJWT($user)
    {
        $token = $this->jwt($user);
        return [
            'api_token' => $token,
            'user' => $user
        ];
    }
}
