<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Avaliacoes;
use App\Models\Consultas_nutricionais;
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
        $avaliacoes = Avaliacoes::count();
        $consultas_nutricionais = Consultas_nutricionais::count();

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
        $avaliacoes = [
            'avaliacoes' => $avaliacoes,
            //...
        ];
        $consultas_nutricionais = [
            'consultas_nutricionais' => $consultas_nutricionais,
            //...
        ];

        return view('efitness/Recepcao/home-recepcao', compact('alunos','professores','nutricionistas','avaliacoes','consultas_nutricionais'));
    }
}
