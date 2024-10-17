<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Services\UtilService;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produto";

    protected $fillable = ['nome_produto', 'desc_produto', 'valr_produto', 'url_imagem'];

    /**
     * Metodo para tratar os dados do formulario
     * @param array $dados
     * @return array
     */
    public static function tratarDadosForm($dados) {

        $dados['valr_produto'] = UtilService::moedaBanco($dados['valr_produto']);

        return $dados;
    }
}
