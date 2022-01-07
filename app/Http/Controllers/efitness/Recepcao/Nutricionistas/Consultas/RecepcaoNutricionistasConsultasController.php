<?php

namespace App\Http\Controllers\efitness\Recepcao\Nutricionistas\Consultas;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Consultas_nutricionais;
use App\Models\Nutricionistas;
use Illuminate\Http\Request;

class RecepcaoNutricionistasConsultasController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $consultas_nutricionais = Consultas_nutricionais::with('consultas_nutricionais')->get();
        return view('efitness/Recepcao/nutricionistas/consultas/visualizar', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas, 'consultas_nutricionais' => $consultas_nutricionais]);
    }
    public function create()
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $consultas_nutricionais = Consultas_nutricionais::with('consultas_nutricionais')->get();
        return view('efitness/Recepcao/nutricionistas/consultas/novo', ['alunos' => $alunos, 'nutricionistas' => $nutricionistas, 'consultas_nutricionais' => $consultas_nutricionais]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'alunos_id' => 'required|string',
            'nutricionistas_id' => 'required|string',
            'status' => 'required|string',
            'email' => 'required|string',
            'telefone' => 'required|string',
            'data' => 'required|string',
            'hora' => 'required|string'
            ]);

            $input = $request->all();
            Consultas_nutricionais::create($input);

        return redirect('efitness/Recepcao/nutricionistas/consultas/visualizar')->with('success', 'Consulta agendada com sucesso!');
    }
    public function show($id)
    {
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        return redirect('efitness/Recepcao/nutricionistas/consultas/visualizar', ['consultas_nutricionais' => $consultas_nutricionais,'alunos' => $alunos, 'nutricionistas' => $nutricionistas]);
    }
    public function edit($id)
    {
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        return view('efitness/Recepcao/nutricionistas/consultas/editar', ['consultas_nutricionais' => $consultas_nutricionais,'alunos' => $alunos, 'nutricionistas' => $nutricionistas]);
    }
    
    public function update(Request $request, $id)
    {
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);

        $request->validate([
            'alunos_id' => 'string',
            'nutricionistas_id' => 'string',
            'status' => 'string',
            'email' => 'string',
            'telefone' => 'string',
            'data' => 'string',
            'hora' => 'string'
        ]);

        $input = $request->all();
        $consultas_nutricionais->update($input);

        return redirect('efitness/Recepcao/nutricionistas/consultas/visualizar')->with('success', 'Consulta atualizada com sucesso!');
    }

    public function delete($id)
    {
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        $consultas_nutricionais->delete();
        return redirect('efitness/Recepcao/nutricionistas/consultas/visualizar')->with('success', 'Consulta excluída com sucesso!');
    }
}
