<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:professores');
    }

    public function index()
    {
        return view('efitness.professores.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::professores()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $professores = Professores::findOrFail(Auth::professores()->id);
        $professores->nome = $request->input('nome');
        $professores->sobrenome = $request->input('sobrenome');
        $professores->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $professores->password)) {
                $professores->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $professores->save();

        return redirect()->route('efitness.professores.profile-professor')->withSuccess('Perfil atualizado com sucesso.');
    }
}
