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

    //Converte o campo em data caso não tenha sido convertido
    protected $casts = [
        'data_hora_venda' => 'datetime',
    ];


    //Define apenas os campos que podem ser preenchidos
    protected $fillable = [
        'valor_total_venda',
        'forma_pagamento_venda',
        'id_cliente',
        'status_venda',
    ];

    //Um cliente pode ter MUITAS VENDAS
    public function VendaCliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}