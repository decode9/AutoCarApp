<?php

namespace App\Http\Middleware;

use App\Http\Middleware\ApiMiddleware;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use App\Models\User;
use Exception;
use Closure;

class JwtMiddleware extends ApiMiddleware
{
    public function handle($request, Closure $next, ...$type)
    {
        try {
            $flag = isset($type[0]) ? $type[0] : null; // Esto puede ser la referencia o logout, es el primer parametro

            $token = $request->header('AuthorizationToken');

            if (!$token) throw new Exception('Token not provided', 001);

            $user = $this->verifyUser($token, $flag);

            $request->auth = $user;

            return $next($request);
        } catch (ExpiredException $e) {
            return $this->responseApi(['error' => 'Provided token is expired', 'code' => 002], 400);
        } catch (Exception $e) {
            return $this->responseApi(['error' => $e->getMessage(), 'code' => $e->getCode()], 401);
        }
    }

    private function verifyUser($token, $flag)
    {
        $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);

        $user = User::where('id', $credentials->sub)->first();

        if ($flag != 'logout') {
            $invalid_login = $this->verifyTokenSession($user, $token);
            if ($invalid_login) throw new Exception($invalid_login['error'], $invalid_login['code']);
        }


        return $user;
    }

    private function verifyTokenSession($user, $token)
    {
        foreach ($user->token_blacklists as $blacklist) {
            if ($blacklist->jwt_token == $token) {
                return [
                    'error' => 'Token not allowed',
                    'code' => 006
                ];
            }
        }

        return false;
    }
}
