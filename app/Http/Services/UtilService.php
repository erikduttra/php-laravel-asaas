<?php

namespace App\Http\Services;

/**
 * Service para manipular Funções uteis na aplicação, conversores de data, limpar maskaras e etc.
 * @author Erikson Dutra de Miranda Silva <eriksondutra@gmail.com>
 */
class UtilService {

    /**
     * Converte o monetário para o banco de dados
     */
    public static function moedaBanco($valor) {
        if ($valor == '') {
            return null;
        }
        return (float) str_replace(',', '.', str_replace('.', '', $valor));
    }

}