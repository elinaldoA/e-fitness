<?php

namespace App\Http\Controllers;

use App\Models\Recepcaos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileRecepcaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:recepcao');
    }

    public function index()
    {
        return view('efitness.recepcao.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::recepcao()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $recepcao = Recepcaos::findOrFail(Auth::recepcao()->id);
        $recepcao->nome = $request->input('nome');
        $recepcao->sobrenome = $request->input('sobrenome');
        $recepcao->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $recepcao->password)) {
                $recepcao->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $recepcao->save();

        return redirect()->route('efitness.recepcao.profile-recepcao')->withSuccess('Perfil atualizado com sucesso.');
    }
}
