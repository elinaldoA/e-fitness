<?php

namespace App\Http\Controllers\efitness\Api\V1\Recepcao\Auth;

use App\Http\Resources\V1\Recepcao as RecepcaoResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController
{
    use AuthenticatesUsers;

    public function logout(Request $request)
    {
        if (!$this->revokeToken($request)) {
            return $this->sendFailedLoggedOutResponse();
        }

        return $this->sendLoggedOutResponse();
    }

    public function login(Request $request)
    {
        $validator = $this->validateLogin($request);

        if ($validator->fails()) {
            return $this->sendFailedLoginResponse($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $credentials = $this->credentials($request);

        if (!$this->guard()->attempt($credentials)) {
            return $this->sendFailedLoginResponse(trans('auth.failed'));
        }

/*        $recepcaoUser = $this->guard()->user();

        if (!$recepcaoUser->hasVerifiedEmail()) {
            return $this->sendFailedLoginResponse(trans('auth.message.email_not_verified_yet'));
        }*/

        return $this->sendLoginResponse();
    }

    protected function sendLoggedOutResponse()
    {
        return response(['message' => trans('auth.message.logout_success')], Response::HTTP_OK);
    }

    protected function sendFailedLoggedOutResponse()
    {
        return response(['message' => trans('auth.message.logout_failed')], Response::HTTP_OK);
    }

    protected function revokeToken(Request $request)
    {
        return $request->user()->token()->revoke();
    }

    protected function sendLoginResponse()
    {
        $token = $this->guard()->user()->createToken(1);
        $professor = $this->guard()->user();

        return response([
            'user' => new RecepcaoResource($professor),
            'token' => $token
        ], Response::HTTP_OK);
    }

    protected function sendFailedLoginResponse($errors, $statusCode = Response::HTTP_UNAUTHORIZED)
    {
        return response([
            'error' => $errors
        ], $statusCode);
    }

    protected function validateLogin(Request $request)
    {
        return Validator::make($request->all(), $this->rulesLogin());
    }

    protected function rulesLogin()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('recepcao');
    }
}