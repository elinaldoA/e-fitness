<?php

namespace App\Http\Controllers\efitness\Administrativo\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Cargos;
use App\Models\Enderecos;
use App\Models\Funcionarios;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionarios::with('funcionarios')->get();
        $cargos = Cargos::with('cargos')->get();
        return view('efitness/Administrativo/funcionarios/visualizar', ['funcionarios' => $funcionarios, 'cargos' => $cargos]);
    }
    public function create()
    {
        $cargos = Cargos::with('cargos')->get();
        return view('efitness/Administrativo/funcionarios/novo', ['cargos' => $cargos]);
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
            Enderecos::create($input);
        return redirect('efitness/Administrativo/funcionarios/visualizar')->with('success', 'Funcionário(a) cadastrado(a) com sucesso!');
    }
    public function show($id)
    {
        $funcionarios = Funcionarios::findOrFail($id);
        return redirect('efitness/Administrativo/funcionarios/visualizar', ['funcionarios' => $funcionarios]);
    }
    public function edit($id)
    {
        $funcionarios = Funcionarios::findOrFail($id);
        $cargos = Cargos::with('cargos')->get();
        $enderecos = Enderecos::findOrFail($id);
        return view('efitness/Administrativo/funcionarios/editar', 
        ['funcionarios' => $funcionarios, 'enderecos' => $enderecos, 'cargos' => $cargos]);
    }
    
    public function update(Request $request, $id)
    {
        $funcionarios = Funcionarios::findOrFail($id);
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

        $funcionarios->update($input);
        $enderecos->update($input);

        return redirect('efitness/Administrativo/funcionarios/visualizar')->with('success', 'Funcionário(a) atualizado(a) com sucesso!');
    }

    public function delete($id)
    {
        $funcionarios = Funcionarios::findOrFail($id);
        $funcionarios->delete();
        return redirect('efitness/Administrativo/funcionarios/visualizar')->with('success', 'Funcionário(a) excluído(a) com sucesso!');
    }
}
