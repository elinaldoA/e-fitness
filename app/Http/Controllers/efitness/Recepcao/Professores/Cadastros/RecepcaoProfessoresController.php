<?php

namespace App\Http\Controllers\efitness\Recepcao\Professores\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Cargos;
use App\Models\Enderecos;
use App\Models\Funcionarios;
use App\Models\Professores;
use Illuminate\Http\Request;

class RecepcaoProfessoresController extends Controller
{
    public function index()
    {
        $professores = Professores::with('professores')->get();
        $cargos = Cargos::with('cargos')->get();
        return view('efitness/Recepcao/professores/visualizar', ['professores' => $professores, 'cargos' => $cargos]);
    }
    public function create()
    {
        $cargos = Cargos::with('cargos')->get();
        return view('efitness/Recepcao/professores/novo', ['cargos' => $cargos]);
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
            Funcionarios::create($input);
            Professores::create($input);
            Enderecos::create($input);
        return redirect('efitness/Recepcao/professores/visualizar')->with('success', 'Professor(a) cadastrado(a) com sucesso!');
    }
    public function show($id)
    {
        $professores = Professores::findOrFail($id);
        return redirect('efitness/Recepcao/professores/visualizar', ['professores' => $professores]);
    }
    public function edit($id)
    {
        $professores = Professores::findOrFail($id);
        $cargos = Cargos::with('cargos')->get();
        $enderecos = Enderecos::findOrFail($id);
        return view('efitness/Recepcao/professores/editar', 
        ['professores' => $professores,'enderecos' => $enderecos, 'cargos' => $cargos]);
    }
    
    public function update(Request $request, $id)
    {
        $professores = Professores::findOrFail($id);
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

        $professores->update($input);
        $enderecos->update($input);

        return redirect('efitness/Recepcao/professores/visualizar')->with('success', 'Professor(a) atualizado(a) com sucesso!');
    }

    public function delete($id)
    {
        $professores = Professores::findOrFail($id);
        $professores->delete();
        return redirect('efitness/Recepcao/professores/visualizar')->with('success', 'Professor(a) excluído(a) com sucesso!');
    }
}
