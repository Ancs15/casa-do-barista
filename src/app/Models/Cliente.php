<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table = 'tbl_cliente';
    protected $primaryKey = 'id_cliente';

    //Nesse exemplo o Laravel define as datas de criação e atualização automaticamente, então não é necessário desativar o timestamps.
    public $timestamps = true;

    //Define os nomes das colunas de criação e atualização por padrão do Laravel
    const CREATE_AT = 'data_criacao_cliente';
    const UPDATE_AT = 'data_atualizacao_cliente';
    
    protected $fillable = [
        'nome_cliente',
        'email_cliente',
        'senha_cliente',
        'foto_cliente',
        'status_cliente',
    ];

    // Relacionamento um CLIENTE pertence a muitos DEPOIMENTOS

    //$this = classe atual, ou seja, CLIENTE
    //hasMany = tem muitos
    //Depoimento::class = chama a classe Depoimento

    public function ClienteDepoimento(){
        return $this->hasMany(Depoimento::class, 'id_cliente', 'id_cliente');
    }

}