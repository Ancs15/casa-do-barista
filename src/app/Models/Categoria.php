<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Categoria extends Model{

    protected $table = 'tbl_categoria';
    protected $primaryKey = 'id_categoria';

    public $timestamps = true;

    const CREATED_AT = 'data_criacao_categoria';
    const UPDATE_AT = 'data_atualizacao_categoria';

    protected $fillable = [
        'nome_categoria',
        'status_categoria',
    ];

    // Uma categoria tem vários produtos

    public function CategoriaProduto(){
    
        return $this->hasMany(Produto::class, 'id_categoria', 'id_categoria');
    
    }

}