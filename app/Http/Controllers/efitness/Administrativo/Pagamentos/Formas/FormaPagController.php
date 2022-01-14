<?php

namespace App\Http\Controllers\efitness\Administrativo\Pagamentos\Formas;

use App\Http\Controllers\Controller;
use App\Models\FormaPags;
use Illuminate\Http\Request;

class FormaPagController extends Controller
{
    public function index()
    {
        $formaPags = FormaPags::with('formaPags')->get();
        return view('efitness/Administrativo/pagamentos/formas/visualizar', ['formaPags' => $formaPags]);
    }
    public function create()
    {
        return view('efitness/Administrativo/pagamentos/formas/novo');
    }
    public function store(Request $request)
    {
        FormaPags::create([
            'status' => $request->status,
            'forma_de_pagamento' => $request->forma_de_pagamento
        ]);
        return redirect('efitness/Administrativo/pagamentos/formas/visualizar')->with('success', 'Pagamento cadastrado com sucesso!');
    }
    public function show($id)
    {
        $formaPags = FormaPags::findOrFail($id);
        return redirect('efitness/Administrativo/pagamentos/formas/visualizar', ['formaPags' => $formaPags]);
    }
    public function edit($id)
    {
        $formaPags = FormaPags::findOrFail($id);
        return view('efitness/Administrativo/pagamentos/formas/editar', ['formaPags' => $formaPags]);
    }
    
    public function update(Request $request, $id)
    {
        $formaPags = FormaPags::findOrFail($id);
        
        $formaPags->update([
            'status' => $request->status,
            'forma_de_pagamento' => $request->forma_de_pagamento
        ]);

        return redirect('efitness/Administrativo/pagamentos/formas/visualizar')->with('success', 'Pagamento atualizado com sucesso!');
    }

    public function delete($id)
    {
        $formaPags = FormaPags::findOrFail($id);
        $formaPags->delete();
        return redirect('efitness/Administrativo/pagamentos/formas/visualizar')->with('success', 'Pagamento excluído com sucesso!');
    }
}
