<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Venda extends Model{

    //Define a tabela do modelo
    protected $table = 'tbl_venda';
    //Define a chave primária do modelo
    protected $primaryKey = 'id_venda';

    //O próprio banco de dados já cria as colunas data_criacao e data_atualizacao, então não é necessário que o Laravel faça isso.
    public $timestamps = false;

    //Define apenas os campos que podem ser preenchidos
    protected $fillable = [
        'valor_total_venda',
        'forma_pagamento_venda',
        'status_venda',
    ];
}