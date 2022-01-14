<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimentos_nutricionistas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
       'dia_da_semana','inicio','fim'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function Atendimentos_nutricionistas()
    {
        return $this->hasMany('App\Models\Atendimentos_nutricionistas', 'id','dia_da_semana','inicio','fim');
    }
}