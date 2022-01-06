<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Funcionarios;
use App\Models\Mensalidades;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $alunos = Alunos::count();
        $funcionarios = Funcionarios::count();
        $mensalidades = Mensalidades::count();

        $widget = [
            'users' => $users,
            //...
        ];
        
        $funcionarios = [
            'funcionarios' => $funcionarios,
            //...
        ];
        $alunos = [
            'alunos' => $alunos,
            //...
        ];
        $mensalidades = [
            'mensalidades' => $mensalidades
        ];

        return view('efitness/Administrativo/home', compact('widget','funcionarios','alunos','mensalidades'));
    }
}
