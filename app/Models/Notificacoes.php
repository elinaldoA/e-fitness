<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'tipo', 'email', 'conteudo'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function Notificacoes()
    {
        return $this -> hasMany('App\Models\Notificacoes','id','titulo', 'tipo','email', 'conteudo');
    }
}
