<?php

namespace App\Http\Controllers\efitness\Administrativo\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Mensalidades;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function index()
    {
        $mensalidades = Mensalidades::with('mensalidades')->get();
        $alunos = Alunos::with('alunos')->get();
        return view('efitness/Administrativo/mensalidades/visualizar', ['mensalidades' => $mensalidades, 'alunos' => $alunos]);
    }
    public function create()
    {
        $mensalidades = Mensalidades::with('mensalidades')->get();
        $alunos = Alunos::with('alunos')->get();
        return view('efitness/Administrativo/mensalidades/visualizar', ['mensalidades' => $mensalidades, 'alunos' => $alunos]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'planos' => 'required|string',
            'valor' => 'required|double',
            'preco' => 'required|double',
            'forma_de_pagamento' => 'required|string',
            'vencimento' => 'required|string',
            ]);
    
            $input = $request->all();

        Mensalidades::create($input);
        return redirect('efitness/Administrativo/mensalidades/visualizar')->with('success', 'Mensalidade cadastrada com sucesso!');
    }
    public function show($id)
    {
        $mensalidades = Mensalidades::findOrFail($id);
        return redirect('efitness/Administrativo/mensalidades/visualizar', ['mensalidades' => $mensalidades]);
    }
    public function edit($id)
    {
        $mensalidades = Mensalidades::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        return view('efitness/Administrativo/mensalidades/editar', ['mensalidades' => $mensalidades, 'alunos' => $alunos]);
    }
    
    public function update(Request $request, $id)
    {
        $mensalidades = Mensalidades::findOrFail($id);

        $request->validate([
            'planos' => 'string',
            'valor' => 'double',
            'preco' => 'double',
            'forma_de_pagamento' => 'string',
            'vencimento' => 'string',
            ]);

        $input = $request->all();

        $mensalidades->update($input);

        return redirect('efitness/Administrativo/mensalidades/visualizar')->with('success', 'Mensalidade atualizada com sucesso!');
    }

    public function delete($id)
    {
        $mensalidades = Mensalidades::findOrFail($id);
        $mensalidades->delete();
        return redirect('efitness/Administrativo/mensalidades/visualizar')->with('success', 'Mensalidade excluída com sucesso!');
    }
}
