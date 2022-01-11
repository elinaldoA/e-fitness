<?php

namespace App\Http\Controllers\efitness\Recepcao\Nutricionistas\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\AgendasNutricionistas;
use Illuminate\Http\Request;

class RecepcaoNutriAgendasController extends Controller
{
    public function index()
    {
        $agendasNutricionistas = AgendasNutricionistas::with('agendasNutricionistas')->get();
        return view('efitness/Recepcao/nutricionistas/agendas/visualizar', ['agendasNutricionistas' => $agendasNutricionistas]);
    }
    public function create()
    {
        return view('efitness/Recepcao/nutricionistas/agendas/novo');
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'inicio' => 'required|string',
            'fim' => 'required|string'
        ]);

        $input = $request->all();
        AgendasNutricionistas::create($input);
        return redirect('efitness/Recepcao/nutricionistas/agendas/visualizar')->with('Agendamento criado com sucesso');
    }
    public function show($id)
    {
        $agendasNutricionistas = AgendasNutricionistas::findOrFail($id);
        return view('efitness/Recepcao/nutricionistas/agendas/novo', ['agendasNutricionistas' => $agendasNutricionistas]);
    }
    public function edit($id)
    {
        $agendasNutricionistas = AgendasNutricionistas::findOrFail($id);
        return view('efitness/Recepcao/nutricionistas/agendas/novo', ['agendasNutricionistas' => $agendasNutricionistas]);
    }
    public function update(Request $request, $id)
    {
        $agendasNutricionistas = AgendasNutricionistas::findOrFail($id);
        $request->validate([
            'titulo' => 'string',
            'inicio' => 'string',
            'fim' => 'string'
        ]);

        $input = $request->all();
        $agendasNutricionistas->update($input);
        return redirect('efitness/Recepcao/nutricionistas/agendas/visualizar')->with('Agendamento atualizado com sucesso');
    }
    public function delete($id)
    {
        $agendasNutricionistas = AgendasNutricionistas::findOrFail($id);
        $agendasNutricionistas->delete();
        return redirect('efitness/Recepcao/nutricionistas/agendas/visualizar')->with('Agendamento excluído com sucesso');
    }
}