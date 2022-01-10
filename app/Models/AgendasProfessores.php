<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendasProfessores extends Model
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

    public function AgendasProfessores()
    {
        return $this -> hasMany('App\Models\AgendasProfessores','id','titulo', 'Inicio', 'Fim');
    }
}
