<?php

namespace App\Http\Controllers\efitness\Recepcao\Professores\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\AgendasProfessores;
use Illuminate\Http\Request;

class RecepcaoProfAgendasController extends Controller
{
    public function index()
    {
        $agendasProfessores = AgendasProfessores::with('agendasProfessores')->get();
        return view('efitness/Recepcao/professores/agendas/visualizar', ['agendasProfessores' => $agendasProfessores]);
    }
    public function create()
    {
        return view('efitness/Recepcao/professores/agendas/novo');
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'inicio' => 'required|string',
            'fim' => 'required|string'
        ]);

        $input = $request->all();
        AgendasProfessores::create($input);
        return redirect('efitness/Recepcao/professores/agendas/visualizar')->with('Agendamento criado com sucesso');
    }
    public function show($id)
    {
        $agendasProfessores = AgendasProfessores::findOrFail($id);
        return view('efitness/Recepcao/professores/agendas/novo', ['agendasProfessores' => $agendasProfessores]);
    }
    public function edit($id)
    {
        $agendasProfessores = AgendasProfessores::findOrFail($id);
        return view('efitness/Recepcao/professores/agendas/novo', ['agendasProfessores' => $agendasProfessores]);
    }
    public function update(Request $request, $id)
    {
        $agendasProfessores = AgendasProfessores::findOrFail($id);
        $request->validate([
            'titulo' => 'string',
            'inicio' => 'string',
            'fim' => 'string'
        ]);

        $input = $request->all();
        $agendasProfessores->update($input);
        return redirect('efitness/Recepcao/professores/agendas/visualizar')->with('Agendamento atualizado com sucesso');
    }
    public function delete($id)
    {
        $agendasProfessores = AgendasProfessores::findOrFail($id);
        $agendasProfessores->delete();
        return redirect('efitness/Recepcao/professores/agendas/visualizar')->with('Agendamento excluído com sucesso');
    }
}