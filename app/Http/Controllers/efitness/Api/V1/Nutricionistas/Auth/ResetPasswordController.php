<?php

namespace App\Http\Controllers\efitness\Api\V1\Nutricionistas\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;


    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(), $this->validationErrorMessages());

        if ($validator->fails()) {
            return $this->sendResetFailedResponse($request, $validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $user = $request->user();
        $user->password = Hash::make($request['password']);
        $response = $user->save();

        return $response
            ? $this->sendResetResponse($request, [
                'message' => trans('nutricionistas.password.change_password_successfully')
            ], Response::HTTP_OK)
            : $this->sendResetFailedResponse($request, $response, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function sendResetResponse($response, $statusCode)
    {
        return response()->json($response, $statusCode);
    }

    protected function sendResetFailedResponse($response, $statusCode)
    {
        return response()->json($response, $statusCode);
    }

    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password'
        );
    }

    protected function rules()
    {
        return [
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('api-nutricionistas');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('nutricionistas');
    }
}
