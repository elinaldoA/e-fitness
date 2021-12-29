<?php

namespace App\Http\Controllers\efitness\Professores\Treinos;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Medidas;
use App\Models\Professores;
use App\Models\Treinos;
use Illuminate\Http\Request;

class ProfessorTreinosAlunosController extends Controller
{
    public function index()
    {
        $treinos = Treinos::with('treinos')->get();
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/treinos/alunos/visualizar', ['treinos' => $treinos,'alunos' => $alunos,'professores' => $professores, 'medidas' => $medidas]);
    }
    public function create($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $medidas = Medidas::findOrFail($id);
        return view('efitness/Professores/treinos/alunos/novo', ['alunos' => $alunos,'professores' => $professores, 'medidas' => $medidas]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'alunos_id' => '|required|string',
            'professores_id'=> '|required|string',
            'data_inicio' => '|required|string',
            'objetivo' => '|required|string',
            'observacao' => '|required|string',
            'aquecimento' => '|required|string',
            'nivel' => '|required|string',
            'numero' => '|required|integer',
            'exercicios'=> '|required|string',
            'series' => '|required|string',
            'repeticoes' => '|required|string',
            'cargas' => '|required|string'
            ]);

            $input = $request->all();
            Treinos::create($input);

        return redirect('efitness/Professores/treinos/alunos/visualizar')->with('success', 'Treino criado com sucesso!');
    }

    public function show($id)
    {
        $treinos = Treinos::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $medidas = Medidas::with('medidas')->get();
        return redirect('efitness/Professores/treinos/alunos/visualizar',['treinos' => $treinos,'alunos' => $alunos,'professores' => $professores, 'medidas', $medidas]);
    }

    public function edit($id)
    {
        $treinos = Treinos::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/treinos/alunos/editar',['treinos' => $treinos,'alunos' => $alunos,'professores' => $professores, 'medidas' => $medidas]);
    }
    
    public function update(Request $request, $id)
    {
        $treinos = Treinos::findOrFail($id);

        $request->validate([
            'alunos_id' => 'string',
            'professores_id'=> 'string',
            'data_inicio' => 'string',
            'objetivo' => 'string',
            'observacao' => 'string',
            'aquecimento' => 'string',
            'nivel' => 'string',
            'numero' => 'integer',
            'exercicios'=> 'string',
            'series' => 'string',
            'repeticoes' => 'string',
            'cargas' => 'string'
        ]);

        $input = $request->all();
        $treinos->update($input);

        return redirect('efitness/Professores/treinos/alunos/visualizar')->with('success', 'Treino atualizado com sucesso!');
    }

    public function delete($id)
    {
        $treinos = Treinos::findOrFail($id);
        $treinos->delete();
        return redirect('efitness/Professores/treinos/alunos/visualizar')->with('success', 'Treino excluído com sucesso!');
    }
}
