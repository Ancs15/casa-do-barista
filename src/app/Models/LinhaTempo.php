<?php

//Nomeia o namespace da Linha do Tempo
namespace App\Models;
//Usa o model padrão do Laravel
use Illuminate\Database\Eloquent\Model;
//Cria a classe LinhaTempo
Class LinhaTempo extends Model {
    //Define a tabela e a chave primária
    protected $table = 'tbl_linha_tempo';
    protected $primaryKey = 'id_linha_tempo';
    //Desativa os timestamps do Laravel
    public $timestamps = false;
    //Define os campos que podem ser preenchidos
    protected $fillable = [
        'titulo_linha_tempo',
        'ano_linha_tempo',
        'descricao_linha_tempo',
        'status_linha_tempo',
    ];

    //Garante que o campo abaixo fixe como data
    protected $casts = [
        'ano_linha_tempo' => 'date',
    ];

}