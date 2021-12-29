<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas_nutricionais extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'alunos_id','nutricionistas_id','email','telefone','data','hora'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function Consultas_nutricionais()
    {
        return $this->hasMany('App\Models\Consultas_nutricionais', 'id','alunos_id','nutricionistas_id','email','telefone','data','hora');
    }
}
