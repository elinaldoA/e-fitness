<?php

namespace App\Http\Controllers\efitness\Administrativo\Nutricionistas;

use App\Http\Controllers\Controller;
use App\Models\Atendimentos_nutricionistas;
use App\Models\Cargos;
use App\Models\Enderecos;
use App\Models\Funcionarios;
use App\Models\Nutricionistas;
use Illuminate\Http\Request;

class NutricionistasController extends Controller
{
    public function index()
    {
        $nutricionistas = Nutricionistas::with('nutricionistas')->get();
        $cargos = Cargos::with('cargos')->get();
        $atendimentos_nutricionistas = Atendimentos_nutricionistas::with('atendimentos_nutricionistas')->get();
        return view('efitness/Administrativo/nutricionistas/visualizar',
        ['nutricionistas' => $nutricionistas, 'cargos' => $cargos, 'atendimentos_nutricionistas' => $atendimentos_nutricionistas]);
    }
    public function create()
    {
        $cargos = Cargos::with('cargos')->get();
        return view('efitness/Administrativo/nutricionistas/novo', ['cargos' => $cargos]);
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
            'password' => 'required|string',
            'telefone' => 'required|string|max:13',
            'rua' => 'required|string|max:255',
            'numero' => 'required|integer',
            'complemento' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'dia_da_semana' => 'required|string',
            'inicio' => 'required|string',
            'fim' => 'required|string',
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
            Funcionarios::create($input);
            Nutricionistas::create($input);
            Enderecos::create($input);
            Atendimentos_nutricionistas::create($input);
        return redirect('efitness/Administrativo/nutricionistas/visualizar')->with('success', 'Nutricionista(a) cadastrado(a) com sucesso!');
    }
    public function show($id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        return redirect('efitness/Administrativo/nutricionistas/visualizar', ['nutricionistas' => $nutricionistas]);
    }
    public function edit($id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        $cargos = Cargos::with('cargos')->get();
        $enderecos = Enderecos::findOrFail($id);
        $atendimentos_nutricionistas = Atendimentos_nutricionistas::findOrFail($id);
        return view('efitness/Administrativo/nutricionistas/editar', 
        ['nutricionistas' => $nutricionistas,'enderecos' => $enderecos, 
        'cargos' => $cargos, 'atendimentos_nutricionistas' => $atendimentos_nutricionistas]);
    }
    
    public function update(Request $request, $id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        $enderecos = Enderecos::findOrFail($id);
        $atendimentos_nutricionistas = Atendimentos_nutricionistas::findOrFail($id);

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
            'password' => 'string',
            'telefone' => 'string',
            'rua' => 'string',
            'numero' => 'string',
            'complemento' => 'string',
            'bairro' => 'string',
            'cep' => 'string',
            'cidade' => 'string',
            'estado' => 'string',
            'pais' => 'string',
            'dia_da_semana' => 'string',
            'inicio' => 'string',
            'fim' => 'string',
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
        $enderecos->update($input);
        $atendimentos_nutricionistas->update($input);

        return redirect('efitness/Administrativo/nutricionistas/visualizar')->with('success', 'Nutricionista atualizado(a) com sucesso!');
    }

    public function delete($id)
    {
        $nutricionistas = Nutricionistas::findOrFail($id);
        $nutricionistas->delete();
        return redirect('efitness/Administrativo/nutricionistas/visualizar')->with('success', 'Nutricionista excluído(a) com sucesso!');
    }
}
