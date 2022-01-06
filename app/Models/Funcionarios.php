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
        'active','nome','sobrenome','cargos_id','sexo','estado_civil','nascimento','cpf','email','password','telefone','image'
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

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        if (is_null($this->sobrenome)) {
            return "{$this->nome}";
        }

        return "{$this->nome} {$this->sobrenome}";
    }

    /**
     * Set the user's password.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function funcionarios()
    {
        return $this -> hasMany('App\Models\Funcionarios','id','active','nome','sobrenome','cargos_id','sexo','estado_civil','nascimento','cpf','email','password','telefone','image');
    }
}
