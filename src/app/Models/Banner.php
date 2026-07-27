<?php

//Modelo padrão de lista de banner para exibir na home

//Define o namespace do model
namespace App\Models;

//Trabalha com a escrita do MySQL.
use Illuminate\Database\Eloquent\Model;

//Cria a classe Banner
Class Banner extends Model{

    //Define a tabela do modelo
    protected $table = 'tbl_banner';
    //Define a chave primária do modelo
    protected $primaryKey = 'id_banner';

    //O próprio banco de dados já cria as colunas data_criacao e data_atualizacao, então não é necessário que o Laravel faça isso.
    public $timestamps = false;

    //Define apenas os campos que podem ser preenchidos
    protected $fillable = [
        'titulo_banner',
        'imagem_banner',
        'status_banner',
    ];
}

//docker compose.yml cria o banco
//arquivo .env conecta no banco