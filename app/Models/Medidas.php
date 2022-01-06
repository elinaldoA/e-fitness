<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alunos_id',
        'sexo',
        'professores_id',
        'data',
        'hora',
        'altura',
        'peso',
        'torax',
        'quadril',
        'coxa_direita',
        'coxa_esquerda',
        'braco_direito',
        'braco_esquerdo',
        'panturilha_direita',
        'panturilha_esquerda'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function Medidas()
    {
        return $this -> hasMany('App\Models\Medidas','id','alunos_id',
        'sexo',
        'professores_id',
        'data',
        'hora',
        'altura',
        'peso',
        'torax',
        'quadril',
        'coxa_direita',
        'coxa_esquerda',
        'braco_direito',
        'braco_esquerdo',
        'panturilha_direita',
        'panturilha_esquerda');
    }
}
