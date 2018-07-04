<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model {

    protected $table = 'pessoas_fisicas';
    
    protected $fillable = [
        'cpf', 
        'nome', 
        'cep',
        'rua',
        'numero',
        'bairro',
        'estado',
        'cidade',
        'telefone',
        'email'
    ];
}
