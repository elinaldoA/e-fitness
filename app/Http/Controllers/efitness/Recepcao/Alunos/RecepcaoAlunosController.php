<?php

namespace App\Http\Controllers\efitness\Recepcao\Alunos;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Enderecos;
use App\Models\FormaPags;
use App\Models\Mensalidades;
use App\Models\Planos;
use Illuminate\Http\Request;

class RecepcaoAlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        return view('efitness/Recepcao/alunos/visualizar', ['alunos' => $alunos]);
    }
    public function create()
    {
        $planos = Planos::with('planos')->get();
        $mensalidades = Mensalidades::with('mensalidades')->get();
        $formaPags = FormaPags::with('formaPags')->get();
        return view('efitness/Recepcao/alunos/novo', ['planos' => $planos, 'mensalidades' => $mensalidades, 'formaPags' => $formaPags]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'active' => 'required|boolean',
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'sexos' => 'required|string',
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alunos_id' => 'required|string',
            'status_id' => 'required|string',
            'planos_id' => 'required|string',
            'valor' => 'required|string',
            'formas_de_pagamentos_id' => 'required|string',
            'vencimento' => 'required|string'
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
            Mensalidades::create($input);
            Enderecos::create($input);
        return redirect('efitness/Recepcao/alunos/visualizar')->with('success', 'Aluno(a) cadastrado(a) com sucesso!');
    }
    public function show($id)
    {
        $alunos = Alunos::findOrFail($id);
        return redirect('efitness/Recepcao/alunos/visualizar', ['alunos' => $alunos]);
    }
    public function edit($id)
    {
        $alunos = Alunos::findOrFail($id);
        $planos = Planos::with('planos')->get();
        $formaPags = FormaPags::with('formaPags')->get();
        $mensalidades = Mensalidades::findOrFail($id);
        $enderecos = Enderecos::findOrFail($id);
        return view('efitness/Recepcao/alunos/editar', 
        ['alunos' => $alunos,'enderecos' => $enderecos, 'planos' => $planos, 'mensalidades' => $mensalidades, 'formaPags' => $formaPags]);
    }
    
    public function update(Request $request, $id)
    {
        $alunos = Alunos::findOrFail($id);
        $enderecos = Enderecos::findOrFail($id);
        $mensalidades = Mensalidades::findOrFail($id);

        $request->validate([
            'active' => 'required',
            'nome' => 'string',
            'sobrenome' => 'string',
            'sexos' => 'string',
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
            'pais' => 'string',
            'alunos_id' => 'string',
            'status_id' => 'string',
            'planos_id' => 'string',
            'valor' => 'string',
            'formas_de_pagamentos_id' => 'string',
            'vencimento' => 'integer'
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
        $mensalidades->update($input);

        return redirect('efitness/Recepcao/alunos/visualizar')->with('success', 'Aluno(a) atualizado(a) com sucesso!');
    }

    public function delete($id)
    {
        $alunos = Alunos::findOrFail($id);
        $alunos->delete();
        return redirect('efitness/Recepcao/alunos/visualizar')->with('success', 'Aluno(a) excluído(a) com sucesso!');
    }
}
