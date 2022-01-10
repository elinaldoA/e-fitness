<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendasNutricionistas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'Inicio', 'Fim'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function AgendasNutricionistas()
    {
        return $this -> hasMany('App\Models\AgendasNutricionistas','id','titulo', 'Inicio', 'Fim');
    }
}
