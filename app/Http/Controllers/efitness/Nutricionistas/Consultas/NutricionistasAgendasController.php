<?php

namespace App\Http\Controllers\efitness\Nutricionistas\Consultas;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Consultas_nutricionais;
use App\Models\Nutricionistas;

class NutricionistasAgendasController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $consultas_nutricionais = Consultas_nutricionais::with('consultas_nutricionais')->get();
        return view('efitness/Nutricionistas/consultas/visualizar', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas, 'consultas_nutricionais' => $consultas_nutricionais]);
    }

    public function create($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        return view('efitness/Nutricionistas/consultas/novo', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas, 'consultas_nutricionais' => $consultas_nutricionais]);
    }
}
