<style>
    .hide {
        display: none;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Produtos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Sua Compra</span>
                    </h4>
                    <div>
                        @if(empty($produto->url_imagem))
                            <img src="https://media.istockphoto.com/id/1322376077/pt/foto/abstract-white-studio-background-for-product-presentation-empty-room-with-shadows-of-window.jpg?s=612x612&w=0&k=20&c=dZeWCbsSlN-nj6zxsQ8R8jr5PTPxVqbrBJiNn4uisnk=" class="img-thumbnail">
                        @else
                            <img src="{{ $produto->url_imagem }}" class="img-thumbnail">
                        @endif
                    </div>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h3 class="my-0">{{ $produto->nome_produto }}</h3>
                                <small class="text-muted">{{ $produto->desc_produto }}</small>
                            </div>
                            <span class="text-muted">R$ {{ number_format($produto->valr_produto, 2) }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Selecione a forma de pagamento</h4>
                    <form action="{{ url('pagamento/concluir') }}" method="POST">
                        @foreach($tipoPagamento as $tp)
                            <div class="my-3">
                                <div class="form-check">
                                    <input id="{{$tp->codg_tipo}}" name="metodoPagamento" type="radio" class="form-check-input metodoPagamento" value="{{$tp->codg_tipo}}">
                                    <label class="form-check-label" for="credit">{{ $tp->desc_tipo }}</label>
                                </div>
                            </div>
                        @endforeach
                        <div class="row gy-3">
                            <br>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <br>
                            <div class="col-md-6 hide" id="boleto">
                                Pagamento por BOLETO

                                <table class="table table-bordered" style="width: 180px">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">Vencimento</span>
                                                <br>
                                                <span style="font-size: 10px;">{{date('d/m/Y')}}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">Agência/Código do Beneficiário</span>
                                                <br>
                                                <span style="font-size: 10px;">00</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">Nosso número</span>
                                                <br>
                                                <span style="font-size: 10px;">0000001</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">Nº documento</span>
                                                <br>
                                                <span style="font-size: 10px;">1</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">Espécie</span>
                                                <br>
                                                <span style="font-size: 10px;">DM</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">Quantidade</span>
                                                <br>
                                                <span style="font-size: 10px;">1</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">(=) Valor Documento</span>
                                                <br>
                                                <span style="font-size: 10px;">R$ {{ number_format($produto->valr_produto, 2) }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">(-) Descontos / Abatimentos</span>
                                                <br>
                                                <span style="font-size: 10px;">R$ {{ number_format(0, 2) }}</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <span style="font-size: 13px;">CNPJ do Beneficiário</span>
                                                <br>
                                                <span style="font-size: 10px;">66.356.119/0001-00</span>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-md-6 hide" id="cartao">
                                <div>
                                    <div class="form-group">
                                        <label for="nome_usuario_cartao">Nome Completo *</label>
                                        <input type="text" id="nome_usuario_cartao" name="nome_usuario_cartao" placeholder="João Silva" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_usuario_cartao">Número do Cartão *</label>
                                        <input type="text" id="numero_usuario_cartao" name="numero_usuario_cartao" placeholder="000 000 000 000" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Data Expiração *</span></label>
                                                <div class="input-group">
                                                <input type="text" id="mes_usuario_cartao" name="mes_usuario_cartao" placeholder="MM" class="form-control" pattern="\d*" maxlength="2">
                                                <input type="text" id="ano_usuario_cartao" name="ano_usuario_cartao" placeholder="YY" class="form-control" pattern="\d*" maxlength="2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4">
                                                <label>CVV *</label>
                                                <input type="text" id="cvv_usuario_cartao" name="cvv_usuario_cartao" placeholder="000" class="form-control" pattern="\d*" maxlength="3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 hide" id="pix">
                                Pagamento por PIX

                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">R$ {{ number_format($produto->valr_produto, 2) }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Quantidade 1</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="confirmarPagamento" type="submit" class="btn btn-success hide">Confirmar Pagamento</button>

                        <input type="hidden" id="id_produto" name="id_produto" value="{{ $produto->id }}">
                        @csrf
                    </form>
                </div>
            </div>
        </main>
    </div>

    </body>
</html>

<script>
    $(function () {
        $('.metodoPagamento').click(function() {
            let tipoPagamento = parseInt($(this).val());

            switch (tipoPagamento) {
                case 1:
                    $("#boleto").removeClass('hide');
                    $("#confirmarPagamento").removeClass('hide');

                    $("#cartao").addClass('hide');
                    $("#pix").addClass('hide');
                    break;
                case 2:
                    $("#cartao").removeClass('hide');
                    $("#confirmarPagamento").removeClass('hide');

                    $("#boleto").addClass('hide');
                    $("#pix").addClass('hide');
                    break;
                case 3:
                    $("#pix").removeClass('hide');
                    $("#confirmarPagamento").removeClass('hide');

                    $("#cartao").addClass('hide');
                    $("#boleto").addClass('hide');
                    break;
                default:
                    $("#boleto").addClass('hide');
                    $("#cartao").addClass('hide');
                    $("#pix").addClass('hide');
                    $("#confirmarPagamento").addClass('hide');
                    break;
            }
        });
    });
</script>