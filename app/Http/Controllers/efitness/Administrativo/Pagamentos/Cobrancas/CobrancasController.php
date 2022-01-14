<?php

namespace App\Http\Controllers\efitness\Administrativo\Pagamentos\Cobrancas;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use App\Models\Cobrancas;
use App\Models\Mensalidades;
use Illuminate\Http\Request;

class CobrancasController extends Controller
{
    public function index()
    {
        $alunos = Alunos::with('alunos')->get();
        $mensalidades = Mensalidades::with('mensalidades')->get();
        return view('efitness/Administrativo/pagamentos/cobrancas/visualizar',['alunos' => $alunos, 'mensalidades' => $mensalidades]);
    }
    public function create($id)
    {
        $alunos = Alunos::with('alunos')->get();
        $mensalidades = Mensalidades::with('mensalidades')->get();
        $cobrancas = Cobrancas::findOrFail($id);
        return view('efitness/Administrativo/pagamentos/cobrancas/novo', ['alunos' => $alunos, 'mensalidades' => $mensalidades, 'cobrancas' => $cobrancas]);
    }
    public function store()
    {
        return view('efitness/Administrativo/pagamentos/cobrancas/visualizar')->with('success','Cobrança efetuada com sucesso !');
    }
    public function show($id)
    {
        return redirect('efitness/Administrativo/pagamentos/cobrancas/visualizar');
    }
    public function edit($id)
    {
        return view('efitness/Administrativo/pagamentos/cobrancas/editar');
    }
    public function update(Request $request, $id)
    {
        return redirect('efitness/Administrativo/pagamentos/cobrancas/visualizar')->with('success', 'Cobrança Atualizada com sucesso!');
    }
    public function delete($id)
    {
        return redirect('efitness/Administrativo/pagamentos/cobrancas/visualizar')->with('success','Cobranca excluída com sucesso!');
    }
}