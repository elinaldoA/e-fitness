<?php

namespace App\Http\Controllers\efitness\Recepcao\Nutricionistas\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Atendimentos_nutricionistas;
use App\Models\Nutricionistas;
use App\Models\Enderecos;
use App\Models\Cargos;
use Illuminate\Http\Request;

class RecepcaoNutricionistasController extends Controller
{
    public function index()
    {
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        return view('efitness/Recepcao/nutricionistas/visualizar', 
        ['nutricionistas' => $nutricionistas]);
    }
    public function create()
    {
        $cargos = Cargos::with('cargos')->get();
        return view('efitness/Recepcao/nutricionistas/novo', ['cargos' => $cargos]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'active' => 'required|boolean',
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cargos_id' => 'required|string',
            'sexos' => 'required|string',
            'estado_civil' => 'string|max:255',
            'nascimento' => 'string|max:255',
            'cpf' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'telefone' => 'required|string|max:13',
            'rua' => 'required|string|max:255',
            'numero' => 'required|integer',
            'complemento' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
    
            $input = $request->all();
    
            if($image = $request->file('image'))
            {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis').".". $image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                $input['image'] = "$profileImage";
            }
            Nutricionistas::create($input);
            Enderecos::create($input);

        return redirect('efitness/Recepcao/nutricionistas/visualizar')->with('success', 'Nutricionista cadastrada com sucesso!');
    }
    public function show($id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        return redirect('efitness/Recepcao/nutricionistas/visualizar', ['nutricionistas' => $nutricionistas]);
    }
    public function edit($id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        $atendimentos_nutricionistas = Atendimentos_nutricionistas::findOrFail($id);
        $cargos = Cargos::with('cargos')->get();
        $enderecos = Enderecos::findOrFail($id);
        return view('efitness/Recepcao/nutricionistas/editar', ['nutricionistas' => $nutricionistas,
        'enderecos' => $enderecos, 'cargos' => $cargos, 'atendimentos_nutricionistas' => $atendimentos_nutricionistas]);
    }
    
    public function update(Request $request, $id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        $atendimentos_nutricionistas = Atendimentos_nutricionistas::findOrFail($id);
        $enderecos = Enderecos::findOrFail($id);

        $request->validate([
            'active' => 'required',
            'nome' => 'string',
            'sobrenome' => 'string',
            'cargos_id' => 'string',
            'sexos' => 'string',
            'estado_civil' => 'string',
            'nascimento' => 'string',
            'cpf' => 'string',
            'email' => 'string',
            'telefone' => 'string',
            'rua' => 'string',
            'numero' => 'string',
            'complemento' => 'string',
            'bairro' => 'string',
            'cep' => 'string',
            'cidade' => 'string',
            'estado' => 'string',
            'pais' => 'string'
        ]);

        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis').".". $image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $nutricionistas->update($input);
        $atendimentos_nutricionistas->update($input);
        $enderecos->update($input);

        return redirect('efitness/Recepcao/nutricionistas/visualizar')->with('success', 'Nutricionista atualizada com sucesso!');
    }

    public function delete($id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        $nutricionistas->delete();
        return redirect('efitness/Recepcao/nutricionistas/visualizar')->with('success', 'Nutricionista excluída com sucesso!');
    }
}
