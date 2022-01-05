<?php

namespace App\Http\Controllers\efitness\Api\V1\Alunos\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;


    public function __construct()
    {
        $this->middleware('api');
    }

    public function getResetToken(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $sentResetPasswordEmail = $this->sendResetLinkEmail($request);

        return ($sentResetPasswordEmail)
            ? response()->json(['message' => trans('alunos.password.email_sent_successfully')])
            : response()->json([
                'message' => trans('alunos.password.email_sent_failed'),
                'error' => trans('auth.message.email_not_found')
            ],  Response::HTTP_NOT_FOUND);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT ? 1 : 0;
    }

    public function broker()
    {
        return Password::broker('alunos');
    }
}
