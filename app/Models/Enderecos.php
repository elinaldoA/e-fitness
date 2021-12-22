<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cep','rua','numero','bairro','cidade','complemento','estado','pais'
    ];

    /**
    * The attributes that should be hidden for serialization.
    *
    * @var array
    */
   protected $hidden = [
       'created_at', 'updated_at'
   ];

    public function Enderecos()
    {
        return $this -> hasMany('App\Models\Nutricionistas','id','cep','rua','numero','bairro','cidade','complemento','estado','pais');
    }
}
