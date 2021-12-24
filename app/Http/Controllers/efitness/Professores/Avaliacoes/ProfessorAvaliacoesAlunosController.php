<?php

namespace App\Http\Controllers\efitness\Professores\Avaliacoes;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Avaliacoes;
use App\Models\Medidas;
use App\Models\Professores;

class ProfessorAvaliacoesAlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::with('avaliacoes')->get();
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/avaliacoes/visualizar', 
        ['avaliacoes' => $avaliacoes, 'alunos' => $alunos, 'professores' => $professores, 'medidas' => $medidas]);
    }
}
