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
            <div class="row">
                @foreach($produto as $p)
                    <div class="col-sm-3">
                        <div class="card" style="width: 18rem;">
                            <div>
                                @if(empty($p->url_imagem))
                                    <img src="https://media.istockphoto.com/id/1322376077/pt/foto/abstract-white-studio-background-for-product-presentation-empty-room-with-shadows-of-window.jpg?s=612x612&w=0&k=20&c=dZeWCbsSlN-nj6zxsQ8R8jr5PTPxVqbrBJiNn4uisnk=" class="img-thumbnail">
                                @else
                                    <img src="{{ $p->url_imagem }}" class="img-thumbnail">
                                @endif
                            </div>
                            <br>
                            <div class="card-body">
                                <h2 class="card-title">{{ $p->nome_produto }}</h2>
                                <p class="card-text">{{ $p->desc_produto }}</p>
                                <center><h3 class="card-title">R$ {{ number_format($p->valr_produto, 2) }}</h3></center>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="{{ url('pagamento/'.$p->id) }}">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Comprar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    </body>
</html>
