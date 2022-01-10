<?php

namespace App\Http\Controllers\efitness\Recepcao\Professores\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\AgendasProfessores;
use Illuminate\Http\Request;

class RecepcaoProfAgendasController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = AgendasProfessores::whereDate('inicio', '>=', $request->inicio)
            ->whereDate('fim', '<=', $request->fim)
            ->get(['id','titulo','inicio','fim']);

            return response()->json($data);
        }
        return view('efitness/Recepcao/professores/agendas/visualizar');
    }
    public function ajax(Request $request)
    {
        switch($request->type)
        {
            case 'add':
                $agenda = AgendasProfessores::create([
                    'titulo' => $request->titulo,
                    'inicio' => $request->inicio,
                    'fim' => $request->fim
                ]);
                return response()->json($agenda);
                break;
            case 'update':
                $agenda = AgendasProfessores::find($request->id)->update([
                    'titulo' => $request->titulo,
                    'inicio' => $request->inicio,
                    'fim' => $request->fim,
                ]);
                return response()->json($agenda);
                break;
            case 'delete':
                $agenda = AgendasProfessores::find($request->id)->delete();
                return response()->json($agenda);
                break;
                default:
                #code ...
                break;
        }   
    }
}