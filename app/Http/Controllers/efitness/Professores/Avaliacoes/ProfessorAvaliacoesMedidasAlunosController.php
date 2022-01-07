<?php

namespace App\Http\Controllers\efitness\Professores\Avaliacoes;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Avaliacoes;
use App\Models\Medidas;
use App\Models\Professores;
use Illuminate\Http\Request;

class ProfessorAvaliacoesMedidasAlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::with('avaliacoes')->get();
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/avaliacoes/alunos/visualizar', 
        ['alunos' => $alunos,'professores' => $professores, 'medidas' => $medidas, 'avaliacoes' => $avaliacoes]);
    }
    public function create($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::findOrFail($id);
        $medidas = Medidas::with('medidas')->get();
        return view('efitness/Professores/avaliacoes/alunos/novo', 
        ['alunos' => $alunos,'professores' => $professores, 'medidas' => $medidas, 'avaliacoes' => $avaliacoes]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'alunos_id' => 'required|string',
            'professores_id' => 'required|string',
            'status' => 'required|string',
            'data' => 'required|string',
            'hora' => 'required|string',
            'altura' => 'required|string',
            'peso' => 'required|string',
            'torax' => 'required|string',
            'quadril' => 'required|string',
            'coxa_direita' => 'required|string',
            'coxa_esquerda' => 'required|string',
            'braco_direito' => 'required|string',
            'braco_esquerdo' => 'required|string',
            'panturilha_direita' => 'required|string',
            'panturilha_esquerda' => 'required|string'
            ]);

            $input = $request->all();
            Medidas::create($input);

        return redirect('efitness/Professores/avaliacoes/alunos/visualizar')->with('success', 'Avaliação realizada com sucesso!');
    }

    public function show($id)
    {
        $medidas = Medidas::findOrFail($id);
        $alunos = Alunos::findOrFail($id);
        $professores = Professores::findOrFail($id);
        $avaliacoes = Avaliacoes::findOrFail($id);
        return redirect('efitness/Professores/avaliacoes/alunos/visualizar', 
        ['avaliacoes' => $avaliacoes, 'alunos' => $alunos,'professores' => $professores, 'medidas', $medidas]);
    }

    public function edit($id)
    {
        $medidas = Medidas::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $professores = Professores::with('professores')->get();
        $avaliacoes = Avaliacoes::with('avaliacoes')->get();
        return view('efitness/Professores/avaliacoes/alunos/editar', 
        ['avaliacoes' => $avaliacoes, 'alunos' => $alunos,'professores' => $professores, 'medidas' => $medidas]);
    }
    
    public function update(Request $request, $id)
    {
        $medidas = Medidas::findOrFail($id);

        $request->validate([
            'alunos_id' => 'string',
            'professores_id' => 'string',
            'status' => 'string',
            'data' => 'required|string',
            'hora' => 'required|string',
            'altura' => 'string',
            'peso' => 'string',
            'torax' => 'string',
            'quadril' => 'string',
            'coxa_direita' => 'string',
            'coxa_esquerda' => 'string',
            'braco_direito' => 'string',
            'braco_esquerdo' => 'string',
            'panturilha_direita' => 'string',
            'panturilha_esquerda' => 'string'
        ]);

        $input = $request->all();
        $medidas->update($input);

        return redirect('efitness/Professores/avaliacoes/alunos/visualizar')->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function delete($id)
    {
        $medidas = Medidas::findOrFail($id);
        $medidas->delete();
        return redirect('efitness/Professores/avaliacoes/alunos/visualizar')->with('success', 'Avaliação excluída com sucesso!');
    }
}
