<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendasNutricionistas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'inicio', 'fim'
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
        return $this -> hasMany('App\Models\AgendasNutricionistas','id','titulo', 'inicio', 'fim');
    }
}
