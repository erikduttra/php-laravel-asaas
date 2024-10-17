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
        <h2>Obrigado pela sua compra!</h2>

        <a href="{{ url('produto/compra') }}">
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-shopping-cart"></span> Lista de Produtos
            </button>
        </a>
    </div>

    </body>
</html>
