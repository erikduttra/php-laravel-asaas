<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoProduto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "pagamento_produto";

    protected $fillable = ['qtd_produto', 'id_produto', 'id_pagamento'];

}
