<?php

namespace App\Http\Controllers\efitness\Api\V1\Alunos\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Response;

class VerificationController extends Controller
{
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return response()->json(['message' => __('auth.email_sent')], Response::HTTP_NO_CONTENT);
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return response()->json(['message' => __('auth.user_verified_successfully')], Response::HTTP_RESET_CONTENT);
    }
}
