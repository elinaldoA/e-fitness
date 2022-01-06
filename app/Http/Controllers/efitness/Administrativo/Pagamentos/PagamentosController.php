<?php

namespace App\Http\Controllers\efitness\Administrativo\Pagamentos;

use App\Http\Controllers\Controller;
use App\Models\Pagamentos;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    public function index()
    {
        $pagamentos = Pagamentos::with('pagamentos')->get();
        return view('efitness/Administrativo/pagamentos/visualizar', ['pagamentos' => $pagamentos]);
    }
    public function create()
    {
        return view('efitness/Administrativo/pagamentos/novo');
    }
    public function store(Request $request)
    {
        Pagamentos::create([
            'status' => $request->status,
            'forma_de_pagamento' => $request->forma_de_pagamento
        ]);
        return redirect('efitness/Administrativo/pagamentos/visualizar')->with('success', 'Pagamento cadastrado com sucesso!');
    }
    public function show($id)
    {
        $pagamentos = Pagamentos::findOrFail($id);
        return redirect('efitness/Administrativo/pagamentos/visualizar', ['pagamentos' => $pagamentos]);
    }
    public function edit($id)
    {
        $pagamentos = Pagamentos::findOrFail($id);
        return view('efitness/Administrativo/pagamentos/editar', ['pagamentos' => $pagamentos]);
    }
    
    public function update(Request $request, $id)
    {
        $pagamentos = Pagamentos::findOrFail($id);
        
        $pagamentos->update([
            'status' => $request->status,
            'forma_de_pagamento' => $request->forma_de_pagamento
        ]);

        return redirect('efitness/Administrativo/pagamentos/visualizar')->with('success', 'Pagamento atualizado com sucesso!');
    }

    public function delete($id)
    {
        $pagamentos = Pagamentos::findOrFail($id);
        $pagamentos->delete();
        return redirect('efitness/Administrativo/pagamentos/visualizar')->with('success', 'Pagamento excluído com sucesso!');
    }
}
