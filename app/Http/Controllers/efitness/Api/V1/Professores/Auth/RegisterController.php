<?php

namespace App\Http\Controllers\efitness\Api\V1\Professores\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professores;
use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $professores = Professores::create($input);
        $success['token'] =  $professores->createToken('efitness')->accessToken;
        $success['nome'] =  $professores->nome;
        return response()->json(['success' => $success], $this->successStatus);
    }
}
