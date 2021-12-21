<?php

namespace App\Http\Controllers\efitness\Administrativo\Cargos;

use App\Http\Controllers\Controller;
use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function index()
    {
        $cargos = Cargos::with('cargos')->get();
        return view('efitness/Administrativo/cargos/visualizar', ['cargos' => $cargos]);
    }
    public function create()
    {
        return view('efitness/Administrativo/cargos/novo');
    }
    public function store(Request $request)
    {
        Cargos::create([
            'nome' => $request->nome
        ]);
        return redirect('efitness/Administrativo/cargos/visualizar')->with('success', 'Cargo cadastrado com sucesso!');
    }
    public function show($id)
    {
        $cargos = Cargos::findOrFail($id);
        return redirect('efitness/Administrativo/cargos/visualizar', ['cargos' => $cargos]);
    }
    public function edit($id)
    {
        $cargos = Cargos::findOrFail($id);
        return view('efitness/Administrativo/cargos/editar', ['cargos' => $cargos]);
    }
    
    public function update(Request $request, $id)
    {
        $cargos = Cargos::findOrFail($id);
        
        $cargos->update([
            'nome' => $request->nome
        ]);

        return redirect('efitness/Administrativo/cargos/visualizar')->with('success', 'Cargo atualizado com sucesso!');
    }

    public function delete($id)
    {
        $cargos = Cargos::findOrFail($id);
        $cargos->delete();
        return redirect('efitness/Administrativo/cargos/visualizar')->with('success', 'Cargo excluído com sucesso!');
    }
}
