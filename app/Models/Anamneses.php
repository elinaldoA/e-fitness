<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamneses extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'status',
        'alunos_id',
        'motivo',
        'doenca',
        'doenca_familiar',
        'medicamentos',
        'historico_social',
        'atividade_fisica',
        'motivo_pratica',
        'tempo_pratica',
        'suplementos',
        'refeicoes',
        'alimentos',
        'observacoes',
        'agua',
        'diagnostico',
        'conduta_dieta',
        'data_revisao'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function Anamneses()
    {
        return $this->hasMany('App\Models\Anamneses', 
        'id',
        'status',
        'alunos_id',
        'motivo',
        'doenca',
        'doenca_familiar',
        'medicamentos',
        'historico_social',
        'atividade_fisica',
        'motivo_pratica',
        'tempo_pratica',
        'suplementos',
        'refeicoes',
        'alimentos',
        'observacoes',
        'agua',
        'diagnostico',
        'conduta_dieta',
        'data_revisao');
    }
}
