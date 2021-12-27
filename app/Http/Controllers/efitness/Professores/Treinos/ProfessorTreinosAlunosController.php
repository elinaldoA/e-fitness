<?php

namespace App\Http\Controllers\efitness\Professores\Treinos;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Avaliacoes;
use App\Models\Medidas;
use App\Models\Professores;
use App\Models\Sexos;
use App\Models\Treinos;
use Illuminate\Http\Request;

class ProfessorTreinosAlunosController extends Controller
{
    public function index()
    {
        $treinos = Treinos::with('treinos')->get();
        $alunos = Alunos::with('alunos')->get();
        $sexos = Sexos::with('sexos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::with('avaliacoes')->get();
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/treinos/alunos/visualizar', 
        ['alunos' => $alunos,'sexos' => $sexos, 
        'professores' => $professores, 'medidas' => $medidas, 'avaliacoes' => $avaliacoes]);
    }
    public function create($id)
    {
        $treinos = Treinos::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $sexos = Sexos::with('sexos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::with('avaliacoes')->get();
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/treinos/alunos/novo', 
        ['treinos' => $treinos,'alunos' => $alunos,'sexos' => $sexos, 
        'professores' => $professores, 'medidas' => $medidas, 'avaliacoes' => $avaliacoes]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'alunos_id' => 'required|string',
            'sexos_id' => 'required|string',
            'professores_id' => 'required|string',
            'data' => 'required|string'
            ]);

            $input = $request->all();
            Medidas::create($input);

        return redirect('efitness/Professores/treinos/alunos/visualizar')->with('success', 'Treino realizado com sucesso!');
    }

    public function show($id)
    {
        $treinos = Treinos::findOrFail($id);
        $alunos = Alunos::findOrFail($id);
        $sexos = Sexos::findOrFail($id);
        $professores = Professores::findOrFail($id);
        $avaliacoes = Avaliacoes::findOrFail($id);
        $medidas = Medidas::findOrFail($id);
        return redirect('efitness/Professores/treinos/alunos/visualizar', 
        ['treinos' => $treinos,'avaliacoes' => $avaliacoes, 'alunos' => $alunos,'sexos' => $sexos, 
        'professores' => $professores, 'medidas', $medidas]);
    }

    public function edit($id)
    {
        $treinos = Treinos::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $sexos = Sexos::with('sexos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::with('avaliacoes')->get();
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/treinos/alunos/editar', 
        ['treinos' => $treinos,'avaliacoes' => $avaliacoes, 'alunos' => $alunos,'sexos' => $sexos, 
        'professores' => $professores, 'medidas' => $medidas]);
    }
    
    public function update(Request $request, $id)
    {
        $treinos = Treinos::findOrFail($id);

        $request->validate([
            'alunos_id' => 'string',
            'sexos_id' => 'required|string',
            'professores_id' => 'string',
            'data' => 'required|string'
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
