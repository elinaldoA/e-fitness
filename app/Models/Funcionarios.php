<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active','nome','cargos_id','sexos_id','estados_civils_id','nascimento','cpf','email','password','telefone','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function funcionarios()
    {
        return $this -> hasMany('App\Models\Funcionarios','id','active','nome','cargos_id','sexos_id','estados_civils_id','nascimento','cpf','email','password','telefone','image');
    }
}
