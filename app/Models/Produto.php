<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /*
        |--------------------------------------------------------------------------
        | Função de relacionamento entre as Tabelas de produtos e produto_detalhes
        |--------------------------------------------------------------------------
        |
        | Nesta função, ela irá procurar com base no id da tabela produtos
        | a foreign key na tabela produto_detalhes, adicionando as informações
        | que forem relacionadas com base de relacionamento 1x1
        |
    */
    public function ProdutoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }
}
