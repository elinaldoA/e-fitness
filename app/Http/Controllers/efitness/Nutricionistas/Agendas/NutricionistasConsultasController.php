<?php

namespace App\Http\Controllers\efitness\Nutricionistas\Agendas;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Anamneses;
use App\Models\Consultas_nutricionais;
use App\Models\Medidas;
use App\Models\Nutricionistas;
use Illuminate\Http\Request;

class NutricionistasConsultasController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $consultas_nutricionais = Consultas_nutricionais::with('consultas_nutricionais')->get();
        $anamneses = Anamneses::with('anamneses')->get();
        return view('efitness/Nutricionistas/agendas/visualizar', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas, 'consultas_nutricionais' => $consultas_nutricionais, 'anamneses' => $anamneses]);
    }

    public function create($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $anamneses = Anamneses::with('anamneses')->get();
        $medidas = Medidas::findOrFail($id);
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        return view('efitness/Nutricionistas/consultas/novo', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas,'medidas' => $medidas, 'consultas_nutricionais' => $consultas_nutricionais, 'anamneses' => $anamneses]);
    }
    public function store(Request $request)
    {
        $request->validate([
        'status' => 'required|boolean',
        'alunos_id' => 'required|string',
        'motivo' => 'required|string',
        'doenca' => 'required|string',
        'doenca_familiar' => 'required|string',
        'medicamentos' => 'required|string',
        'historico_social' => 'required|string',
        'atividade_fisica' => 'required|string',
        'motivo_pratica' => 'required|string',
        'tempo_pratica' => 'required|string',
        'suplementos' => 'required|string',
        'refeicoes' => 'required|string',
        'alimentos' => 'required|string',
        'observacoes' => 'required|string',
        'agua' => 'required|string',
        'diagnostico' => 'required|string',
        'conduta_dieta' => 'required|string',
        'data_revisao' => 'required|string']);

        $input = $request->all();
        Anamneses::create($input);

        return redirect('efitness/Nutricionistas/agendas/visualizar')->with('success', 'Consulta realizada com sucesso!');
    }
}
