<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use App\Http\Services\ConstanteService as Constante;
use Exception;

/**
 * Service para manipular os Pagamentos e Integracao com ASAAS
 * @author Erikson Dutra de Miranda Silva <eriksondutra@gmail.com>
 */
class AsaasService {

    /**
     * Realiza integracao com ASAAS
     * @param array $dados
     * @return array
     */
    public static function pagamento($dados) {

        $retorno = [];

        try {
            switch ($dados['metodoPagamento']) {
                case Constante::TIPO_PAGAMENTO_BOLETO:
                    $retorno = AsaasService::pagamentoBoleto($dados);
                    break;
                case Constante::TIPO_PAGAMENTO_CARTAO_CREDITO:
                    $retorno = AsaasService::pagamentoCartao($dados);
                    break;
                case Constante::TIPO_PAGAMENTO_PIX:
                    $retorno = AsaasService::pagamentoPix($dados);
                    break;

                default:
                    return null;
                    break;
            }
        } catch (Exception $e) {
            $retorno = [
                'codeStatus' => $e->getCode(),
                'erro' => $e->getMessage(),
            ];
        }

        return $retorno;
    }

    /**
     * Realiza integracao com ASAAS pagamento por boleto
     * @param array $dados
     * @return array
     */
    private static function pagamentoBoleto($dados) {

        $client = new Client();

        $body = [
            'billingType' => 'BOLETO',
            'customer' => env('CLIENTE_SAAS'),
            'value' => $dados['produto']->valr_produto,
            'dueDate' => date('Y-m-d'),
            'description' => 'Pedido Produto'.$dados['produto']->nome_produto,
        ];

        $response = $client->request('POST', env('API_SAAS').'/payments', [
            'body' => json_encode($body),
            'headers' => [
              'accept' => 'application/json',
              'content-type' => 'application/json',
              'access_token' => env('CHAVE_SAAS'),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Realiza integracao com ASAAS pagamento por PIX
     * @param array $dados
     * @return array
     */
    private static function pagamentoPix($dados) {

        $client = new Client();

        $body = [
            'billingType' => 'PIX',
            'customer' => env('CLIENTE_SAAS'),
            'value' => $dados['produto']->valr_produto,
            'dueDate' => date('Y-m-d'),
            'description' => 'Pedido Produto '.$dados['produto']->nome_produto,
        ];

        $response = $client->request('POST', env('API_SAAS').'/payments', [
            'body' => json_encode($body),
            'headers' => [
              'accept' => 'application/json',
              'content-type' => 'application/json',
              'access_token' => env('CHAVE_SAAS'),
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Realiza integracao com ASAAS pagamento por PIX
     * @param array $dados
     * @return array
     */
    private static function pagamentoCartao($dados) {

        $client = new Client();

        $body = [
            'billingType' => 'CREDIT_CARD',
            'customer' => env('CLIENTE_SAAS'),
            'value' => $dados['produto']->valr_produto,
            'dueDate' => date('Y-m-d'),
            'creditCard' => [
                'holderName' => $dados['nome_usuario_cartao'],
                'number' => $dados['numero_usuario_cartao'],
                'expiryMonth' => $dados['mes_usuario_cartao'],
                'expiryYear' => $dados['ano_usuario_cartao'],
                'ccv' => $dados['cvv_usuario_cartao'],
            ],
            'creditCardHolderInfo' => [ //Buscaria do cadastro de usuário autenticado se o desafio exigisse sessão
                'name' => 'Teste',
                'email' => 'teste@gmail.com',
                'cpfCnpj' => '44534281030',
                'postalCode' => '89223-005',
                'addressNumber' => '277',
                'addressComplement' => null,
                'phone' => '4738010919',
                'mobilePhone' => '47998781877',
            ],
            'remoteIp' => '116.213.42.532',
        ];

        $response = $client->request('POST', env('API_SAAS').'/payments', [
            'body' => json_encode($body),
            'headers' => [
              'accept' => 'application/json',
              'content-type' => 'application/json',
              'access_token' => env('CHAVE_SAAS'),
            ],
        ]);


        return json_decode($response->getBody(), true);
    }
}