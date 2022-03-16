<?php

namespace App\Http\Controllers\efitness\Professores\Treinos;

use App\Http\Controllers\Controller;
use App\Models\Treinos;
use PDF;

class AlunosTreinosController extends Controller
{
    public function showTreinos()
    {
        $treinos = Treinos::all();
        return view('efitness/Professores/treinos/alunos/visualizar', ['treinos' => $treinos]);
    }

    public function CreatePDF()
    {
        $data = Treinos::all();

        view()->share('treinos', $data);
        $pdf = \PDF::loadView('efitness/Professores/treinos/alunos/visualizar', $data);
    
        return $pdf->download('efitness.pdf');
    }
}