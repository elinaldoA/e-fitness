<?php

namespace App\Http\Controllers\efitness\Nutricionistas\Consultas;

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
        return view('efitness/Nutricionistas/consultas/visualizar', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas, 'consultas_nutricionais' => $consultas_nutricionais,'anamneses' => $anamneses]);
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

        return redirect('efitness/Nutricionistas/consultas/visualizar')->with('success', 'Consulta realizada com sucesso!');
    }

    public function edit($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $anamneses = Anamneses::findOrFail($id);
        $medidas = Medidas::findOrFail($id);
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        return view('efitness/Nutricionistas/consultas/editar',
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas,'medidas' => $medidas, 'consultas_nutricionais' => $consultas_nutricionais, 'anamneses' => $anamneses]);
    }
    
    public function update(Request $request, $id)
    {
        $anamneses = Anamneses::findOrFail($id);

        $request->validate([
        'status' => 'boolean',
        'alunos_id' => 'string',
        'motivo' => 'string',
        'doenca' => 'string',
        'doenca_familiar' => 'string',
        'medicamentos' => 'string',
        'historico_social' => 'string',
        'atividade_fisica' => 'string',
        'motivo_pratica' => 'string',
        'tempo_pratica' => 'string',
        'suplementos' => 'string',
        'refeicoes' => 'string',
        'alimentos' => 'string',
        'observacoes' => 'string',
        'agua' => 'string',
        'diagnostico' => 'string',
        'conduta_dieta' => 'string',
        'data_revisao' => 'string']);

        $input = $request->all();
        $anamneses->update($input);

        return redirect('efitness/Nutricionistas/consultas/visualizar')->with('success', 'Consulta atualizada com sucesso!');
    }

    public function delete($id)
    {
        $anamneses = Anamneses::findOrFail($id);
        $anamneses->delete();
        return redirect('efitness/Nutricionistas/consultas/visualizar')->with('success', 'Consulta excluída com sucesso!');
    }
}
