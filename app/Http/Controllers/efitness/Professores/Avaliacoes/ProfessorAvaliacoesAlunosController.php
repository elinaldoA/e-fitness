<?php

namespace App\Http\Controllers\efitness\Professores\Avaliacoes;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Avaliacoes;
use App\Models\Professores;
use Illuminate\Http\Request;

class ProfessorAvaliacoesAlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::with('avaliacoes')->get();
        return view('efitness/Recepcao/avaliacoes/visualizar', ['avaliacoes' => $avaliacoes, 'alunos' => $alunos, 'professores' => $professores]);
    }/*
    public function create()
    {
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        return view('efitness/Recepcao/avaliacoes/novo', ['alunos' => $alunos, 'professores' => $professores]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'alunos_id' => 'required|string',
            'professores_id' => 'required|string',
            'data' => 'required|string',
            'hora' => 'required|string'
            ]);

            $input = $request->all();
            Avaliacoes::create($input);

        return redirect('efitness/Recepcao/avaliacoes/visualizar')->with('success', 'Avaliação cadastrada com sucesso!');
    }
    public function show($id)
    {
        $avaliacoes = Avaliacoes::findOrFail($id);
        $alunos = Alunos::findOrFail($id);
        $professores = Professores::findOrFail($id);
        return redirect('efitness/Recepcao/avaliacoes/visualizar', 
        ['avaliacoes' => $avaliacoes, 'alunos' => $alunos, 'professores' => $professores]);
    }
    public function edit($id)
    {
        $avaliacoes = Avaliacoes::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        return view('efitness/Recepcao/avaliacoes/editar', 
        ['avaliacoes' => $avaliacoes, 'alunos' => $alunos, 'professores' => $professores]);
    }
    
    public function update(Request $request, $id)
    {
        $avaliacoes = Avaliacoes::findOrFail($id);

        $request->validate([
            'alunos_id' => 'string',
            'professores_id' => 'string',
            'data' => 'string',
            'hora' => 'string',
        ]);

        $input = $request->all();
        $avaliacoes->update($input);

        return redirect('efitness/Recepcao/avaliacoes/visualizar')->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function delete($id)
    {
        $avaliacoes = Avaliacoes::findOrFail($id);
        $avaliacoes->delete();
        return redirect('efitness/Recepcao/avaliacoes/visualizar')->with('success', 'Avaliação excluída com sucesso!');
    }*/
}
