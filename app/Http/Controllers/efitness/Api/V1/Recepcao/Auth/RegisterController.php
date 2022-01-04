<?php

namespace App\Http\Controllers\efitness\Api\V1\Recepcao\Auth;

use App\Http\Controllers\Controller;
use App\Models\Recepcaos;
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
        $recepcao = Recepcaos::create($input);
        $success['token'] =  $recepcao->createToken('efitness')->accessToken;
        $success['nome'] =  $recepcao->nome;
        return response()->json(['success' => $success], $this->successStatus);
    }
}
