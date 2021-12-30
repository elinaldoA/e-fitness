<?php

namespace App\Http\Controllers\efitness\Nutricionistas\Dietas;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Anamneses;
use App\Models\Consultas_nutricionais;
use App\Models\Dietas;
use App\Models\Medidas;
use App\Models\Nutricionistas;
use Illuminate\Http\Request;

class NutricionistasDietasController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $consultas_nutricionais = Consultas_nutricionais::with('consultas_nutricionais')->get();
        $anamneses = Anamneses::with('anamneses')->get();
        return view('efitness/Nutricionistas/dietas/visualizar', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas, 'consultas_nutricionais' => $consultas_nutricionais,'anamneses' => $anamneses]);
    }

    public function create($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $anamneses = Anamneses::with('anamneses')->get();
        $medidas = Medidas::findOrFail($id);
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        return view('efitness/Nutricionistas/dietas/novo', 
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas,'medidas' => $medidas, 'consultas_nutricionais' => $consultas_nutricionais, 'anamneses' => $anamneses]);
    }
    public function store(Request $request)
    {
        $request->validate([

        ]);

        $input = $request->all();
        Dietas::create($input);

        return redirect('efitness/Nutricionistas/dietas/visualizar')->with('success', 'Consulta realizada com sucesso!');
    }

    public function edit($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $anamneses = Anamneses::findOrFail($id);
        $medidas = Medidas::findOrFail($id);
        $consultas_nutricionais = Consultas_nutricionais::findOrFail($id);
        return view('efitness/Nutricionistas/dietas/editar',
        ['alunos' => $alunos, 'nutricionistas' => $nutricionistas,'medidas' => $medidas, 'consultas_nutricionais' => $consultas_nutricionais, 'anamneses' => $anamneses]);
    }
    
    public function update(Request $request, $id)
    {
        $dietas = Dietas::findOrFail($id);

        $request->validate([
            
        ]);

        $input = $request->all();
        $dietas->update($input);

        return redirect('efitness/Nutricionistas/dietas/visualizar')->with('success', 'Dieta atualizada com sucesso!');
    }

    public function delete($id)
    {
        $dietas = Dietas::findOrFail($id);
        $dietas->delete();
        return redirect('efitness/Nutricionistas/dietas/visualizar')->with('success', 'Dieta excluída com sucesso!');
    }
}
