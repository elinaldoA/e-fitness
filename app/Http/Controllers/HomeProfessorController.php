<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Avaliacoes;
use App\Models\Treinos;
use Illuminate\Http\Request;

class HomeProfessorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:professores');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alunos = Alunos::count();
        $avaliacoes = Avaliacoes::count();
        $treinos = Treinos::count();

        $alunos = [
            'alunos' => $alunos,
            //...
        ];
        $avaliacoes = [
            'avaliacoes' => $avaliacoes,
            //...
        ];
        $treinos = [
            'treinos' => $treinos,
            //...
        ];

        return view('efitness/Professores/home-professor', compact('alunos','avaliacoes','treinos'));
    }
}
