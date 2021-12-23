<?php

namespace App\Http\Controllers;

use App\Models\Nutricionistas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileNutricionistaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:professores');
    }

    public function index()
    {
        return view('efitness.nutricionistas.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::nutricionistas()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $nutricionistas = Nutricionistas::findOrFail(Auth::nutricionistas()->id);
        $nutricionistas->nome = $request->input('nome');
        $nutricionistas->sobrenome = $request->input('sobrenome');
        $nutricionistas->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $nutricionistas->password)) {
                $nutricionistas->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $nutricionistas->save();

        return redirect()->route('efitness.nutricionistas.profile-professor')->withSuccess('Perfil atualizado com sucesso.');
    }
}
