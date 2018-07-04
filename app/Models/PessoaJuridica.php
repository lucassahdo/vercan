<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model {

    protected $table = 'pessoas_juridicas';
    
    protected $fillable = [
        'cnpj', 
        'razao_social', 
        'nome_fantasia', 
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
