<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoPagamento;
use App\Models\Pagamento;
use App\Models\PagamentoProduto;
use App\Http\Services\ConstanteService as Constante;
use App\Http\Services\AsaasService;
use Illuminate\Support\Facades\Validator;

class PagamentoController extends Controller
{
    public function index($id)
    {
      $produto = Produto::findOrFail($id);
      $tipoPagamento = TipoPagamento::all();

      return view('pagamento.index', compact('produto', 'tipoPagamento'));
    }

    public function concluir(Request $request)
    {

      $dados = $request->all();
      $produto = Produto::findOrFail($dados['id_produto']);

      if($dados['metodoPagamento'] == Constante::TIPO_PAGAMENTO_CARTAO_CREDITO) {
          $validator = Validator::make($dados, [
            'nome_usuario_cartao' => 'required',
            'numero_usuario_cartao' => 'required',
            'mes_usuario_cartao' => 'required|max:2',
            'ano_usuario_cartao' => 'required|max:2',
            'cvv_usuario_cartao' => 'required|max:3',
          ]);

          if ($validator->fails()) {
              return redirect()->back()
                  ->withErrors($validator)
                  ->withInput();
        }
      }

      /**
       * Realiza integracao pagamento com ASAAS
       */
      $dados['produto'] = $produto;
      $retornoAsaas = AsaasService::pagamento($dados);

      $pagamento = Pagamento::create([
        'info_adicional' => json_encode($retornoAsaas),
        'id_tipo_pagamento' => $dados['metodoPagamento'],
      ]);

      if($pagamento) {
        PagamentoProduto::create([
          'qtd_produto' => 1,
          'id_produto' => $produto->id,
          'id_pagamento' => $pagamento->id,
          ]
        );
      }

      if(isset($retornoAsaas['invoiceUrl'])) {
        return redirect($retornoAsaas['invoiceUrl'])->with('success', 'Compra finalizada!');
      } else {
        return view('pagamento.concluir');
      }
    }

}
