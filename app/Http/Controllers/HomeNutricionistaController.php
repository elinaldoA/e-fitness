<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\Consultas_nutricionais;
use Illuminate\Http\Request;

class HomeNutricionistaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:nutricionistas');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $alunos = Alunos::count();
        $consultas_nutricionais = Consultas_nutricionais::count();

        $alunos = [
            'alunos' => $alunos,
            //...
        ];
        $consultas_nutricionais = [
            'consultas_nutricionais' => $consultas_nutricionais,
            //...
        ];

        return view('efitness/Nutricionistas/home-nutricionista', compact('alunos','consultas_nutricionais'));
    }
}
