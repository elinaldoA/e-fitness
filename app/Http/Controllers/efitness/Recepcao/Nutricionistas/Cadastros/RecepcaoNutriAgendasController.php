<?php

namespace App\Http\Controllers\efitness\Recepcao\Nutricionistas\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\AgendasNutricionistas;
use Illuminate\Http\Request;

class RecepcaoNutriAgendasController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = AgendasNutricionistas::whereDate('inicio', '>=', $request->inicio)
            ->whereDate('fim', '<=', $request->fim)
            ->get(['id','titulo','inicio','fim']);

            return response()->json($data);
        }
        return view('efitness/Recepcao/nutricionistas/agendas/visualizar');
    }
    public function ajax(Request $request)
    {
        switch($request->type)
        {
            case 'add':
                $agenda = AgendasNutricionistas::create([
                    'titulo' => $request->titulo,
                    'inicio' => $request->inicio,
                    'fim' => $request->fim
                ]);
                return response()->json($agenda);
                break;
            case 'update':
                $agenda = AgendasNutricionistas::find($request->id)->update([
                    'titulo' => $request->titulo,
                    'inicio' => $request->inicio,
                    'fim' => $request->fim,
                ]);
                return response()->json($agenda);
                break;
            case 'delete':
                $agenda = AgendasNutricionistas::find($request->id)->delete();
                return response()->json($agenda);
                break;
                default:
                #code ...
                break;
        }   
    }
}