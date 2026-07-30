<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

Class Produto extends Model {

    protected $table = 'tbl_produto';
    protected $foreignKey = 'id_produto';

    public $timestamps = true;

    const CREATED_AT = 'data_criacao_produto';
    const UPDATE_AT = 'data_atualizacao_produto';

    protected $fillable = [
        'nome_produto',
        'id_categoria',
        'descricao_curta_produto',
        'descricao_longa_produto',
        'valor_produto',
        'imagem_produto',
        'destaque_produto',
        'status_produto',    
    ];

    //Vários produtos podem estar em uma categoria.

    public function ProdutoCategoria() {

        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');

    }

}