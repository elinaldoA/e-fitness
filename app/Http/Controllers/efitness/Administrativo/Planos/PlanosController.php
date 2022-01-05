<?php

namespace App\Http\Controllers\efitness\Administrativo\Planos;

use App\Http\Controllers\Controller;
use App\Models\Planos;
use Illuminate\Http\Request;

class PlanosController extends Controller
{
    public function index()
    {
        $planos = Planos::with('planos')->get();
        return view('efitness/Administrativo/planos/visualizar', ['planos' => $planos]);
    }
    public function create()
    {
        return view('efitness/Administrativo/planos/novo');
    }
    public function store(Request $request)
    {
        Planos::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
        ]);
        return redirect('efitness/Administrativo/planos/visualizar')->with('success', 'Plano cadastrado com sucesso!');
    }
    public function show($id)
    {
        $planos = Planos::findOrFail($id);
        return redirect('efitness/Administrativo/planos/visualizar', ['planos' => $planos]);
    }
    public function edit($id)
    {
        $planos = planos::findOrFail($id);
        return view('efitness/Administrativo/planos/editar', ['planos' => $planos]);
    }
    
    public function update(Request $request, $id)
    {
        $planos = Planos::findOrFail($id);
        
        $planos->update([
            'nome' => $request->nome,
            'valor' => $request->valor,
        ]);

        return redirect('efitness/Administrativo/planos/visualizar')->with('success', 'Plano atualizado com sucesso!');
    }

    public function delete($id)
    {
        $planos = Planos::findOrFail($id);
        $planos->delete();
        return redirect('efitness/Administrativo/planos/visualizar')->with('success', 'Plano excluído com sucesso!');
    }
}
