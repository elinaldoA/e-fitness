<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Nutricionistas;
use App\Models\Professores;
use Illuminate\Http\Request;

class HomeRecepcaoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:recepcao');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alunos = Alunos::count();
        $professores = Professores::count();
        $nutricionistas = Nutricionistas::count();

        $alunos = [
            'alunos' => $alunos,
            //...
        ];
        $professores = [
            'professores' => $professores,
            //...
        ];
        $nutricionistas = [
            'nutricionistas' => $nutricionistas,
            //...
        ];

        return view('efitness/Recepcao/home-recepcao', compact('alunos','professores','nutricionistas'));
    }
}
