<?php

namespace App\Http\Controllers\efitness\Recepcao\Notificacoes;

use App\Http\Controllers\Controller;
use App\Models\Notificacoes;
use Illuminate\Http\Request;

class RecepcaoNotificacoesController extends Controller
{
    public function index()
    {
        $notificacoes = Notificacoes::with('notificacoes')->get();
        return view('efitness/Recepcao/notificacoes/visualizar', ['notificacoes' => $notificacoes]);
    }
    public function create()
    {
        $notificacoes = Notificacoes::with('notificacoes')->get();
        return view('efitness/Recepcao/notificacoes/novo', ['notificacoes' => $notificacoes]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'tipo' => 'required|string',
            'email' => 'string',
            'conteudo' => 'required|string'
        ]);
        $input = $request->all();
        Notificacoes::create($input);

        return redirect('efitness/Recepcao/notificacoes/visualizar')->with('success', 'Notificação enviada com sucesso!');
    }
    public function show($id)
    {
        $notificacoes = Notificacoes::findOrFail($id);
        return view('efitness/Recepcao/notificacoes/visualizar', ['notificacoes' => $notificacoes]);
    }
    public function edit($id)
    {
        $notificacoes = Notificacoes::findOrFail($id);
        return view('efitness/Recepcao/notificacoes/editar',['notificacoes' => $notificacoes]);
    }
    public function update(Request $request, $id)
    {
        $notificacoes = Notificacoes::findOrFail($id);

        $request->validate([
            'titulo' => 'string',
            'tipo' => 'string',
            'email' => 'string',
            'conteudo' => 'string'
        ]);

        $input = $request->all();

        $notificacoes->update($input);

        return view('efitness/Recepcao/notificacoes/visualizar', ['notificacoes' => $notificacoes]);
    }
    public function delete($id)
    {
        $notificacoes = Notificacoes::findOrFail($id);
        $notificacoes->delete();
        return redirect('efitness/Recepcao/notificacoes/visualizar')->with('success', 'Notificacão excluída com sucesso!');
    }
}