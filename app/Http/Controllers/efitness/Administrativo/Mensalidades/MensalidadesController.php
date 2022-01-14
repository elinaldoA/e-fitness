<?php

namespace App\Http\Controllers\efitness\Administrativo\Mensalidades;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\FormaPags;
use App\Models\Mensalidades;
use App\Models\Pags;
use App\Models\Planos;
use Illuminate\Http\Request;

class MensalidadesController extends Controller
{
    public function index()
    {
        $mensalidades = Mensalidades::with('mensalidades')->get();
        $alunos = Alunos::with('alunos')->get();
        $planos = Planos::with('planos')->get();
        $formaPags = FormaPags::with('formaPags')->get();
        return view('efitness/Administrativo/mensalidades/visualizar', ['mensalidades' => $mensalidades, 
        'alunos' => $alunos, 'planos' => $planos, 'formaPags' => $formaPags]);
    }
    public function create()
    {
        $mensalidades = Mensalidades::with('mensalidades')->get();
        $alunos = Alunos::with('alunos')->get();
        $planos = Planos::with('planos')->get();
        return view('efitness/Administrativo/mensalidades/visualizar', ['mensalidades' => $mensalidades, 'alunos' => $alunos, 'planos' => $planos]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'alunos_id' => 'required|string',
            'planos_id' => 'required|string',
            'valor' => 'required|double',
            'forma_de_pagamento' => 'required|string',
            'vencimento' => 'required|string',
            'status_id' => 'required|string',
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
        $planos = Planos::with('planos')->get();
        $alunos = Alunos::with('alunos')->get();
        return view('efitness/Administrativo/mensalidades/editar', ['mensalidades' => $mensalidades, 'planos' => $planos, 'alunos' => $alunos]);
    }
    
    public function update(Request $request, $id)
    {
        $mensalidades = Mensalidades::findOrFail($id);

        $request->validate([
            'alunos_id' => 'string',
            'planos_id' => 'string',
            'valor' => 'required|double',
            'status' => 'required|string',
            'forma_de_pagamento' => 'string',
            'vencimento' => 'string',
            'status_id' => 'string',
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
