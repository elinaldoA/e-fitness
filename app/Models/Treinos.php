<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alunos_id', 'professores_id','data_inicio','objetivo',
        'observacao','aquecimento','nivel','numero','exercicios','series','repeticoes','cargas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at'
    ];

    public function Treinos()
    {
        return $this -> hasMany('App\Models\Treinos','id','alunos_id', 'professores_id','data_inicio','objetivo',
        'observacao','aquecimento','nivel','numero','exercicios','series','repeticoes','cargas');
    }
}
