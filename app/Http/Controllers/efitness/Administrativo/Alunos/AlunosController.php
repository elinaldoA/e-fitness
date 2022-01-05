<?php

namespace App\Http\Controllers\efitness\Administrativo\Alunos;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Enderecos;
use App\Models\Sexos;
use App\Models\Planos;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        return view('efitness/Administrativo/alunos/visualizar', ['alunos' => $alunos]);
    }
    public function create()
    {
        $sexos = Sexos::with('sexos')->get();
        $planos = Planos::with('planos')->get();
        return view('efitness/Administrativo/alunos/novo', ['sexos' => $sexos, 'planos' => $planos]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'active' => 'required|boolean',
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'sexos_id' => 'required|string',
            'nascimento' => 'string|max:255',
            'cpf' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'telefone' => 'required|string|max:13',
            'planos_id' => 'required|string',
            'valor' => 'required|string',
            'vencimento' => 'required|string',
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
            Alunos::create($input);
            Enderecos::create($input);
        return redirect('efitness/Administrativo/alunos/visualizar')->with('success', 'Aluno(a) cadastrado(a) com sucesso!');
    }
    public function show($id)
    {
        $alunos = Alunos::findOrFail($id);
        return redirect('efitness/Administrativo/alunos/visualizar', ['alunos' => $alunos]);
    }
    public function edit($id)
    {
        $alunos = Alunos::findOrFail($id);
        $sexos = Sexos::with('sexos')->get();
        $planos = Planos::with('planos')->get();
        $enderecos = Enderecos::findOrFail($id);
        return view('efitness/Administrativo/alunos/editar', 
        ['alunos' => $alunos, 'sexos' => $sexos, 'enderecos' => $enderecos, 'planos' => $planos]);
    }
    
    public function update(Request $request, $id)
    {
        $alunos = Alunos::findOrFail($id);
        $enderecos = Enderecos::findOrFail($id);

        $request->validate([
            'active' => 'required',
            'nome' => 'string',
            'sobrenome' => 'string',
            'sexos_id' => 'string',
            'nascimento' => 'string',
            'cpf' => 'string',
            'email' => 'string',
            'telefone' => 'string',
            'planos_id' => 'string',
            'valor' => 'string',
            'vencimento' => 'string',
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

        $alunos->update($input);
        $enderecos->update($input);

        return redirect('efitness/Administrativo/alunos/visualizar')->with('success', 'Aluno(a) atualizado(a) com sucesso!');
    }

    public function delete($id)
    {
        $alunos = Alunos::findOrFail($id);
        $alunos->delete();
        return redirect('efitness/Administrativo/alunos/visualizar')->with('success', 'Aluno(a) excluído(a) com sucesso!');
    }
}
