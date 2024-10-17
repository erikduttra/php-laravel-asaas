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
        <h2>Produtos</h2>
        <br>
        <a href="{{ url('admin/produto/create') }}">
            <button type="button" class="btn btn-success">
                <span class="glyphicon glyphicon-plus"></span> Cadastrar
            </button>
        </a>
        <a href="{{ url('produto/compra') }}">
            <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-shopping-cart"></span> Lista de Compras
            </button>
        </a>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($produto as $p)
                    <tr>
                        <td>{{ $p->nome_produto }}</td>
                        <td>{{ $p->desc_produto }}</td>
                        <td>{{ number_format($p->valr_produto, 2) }}</td>
                        <td>
                            <a href="{{ url('admin/produto/'.$p->id.'/edit') }}">
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ url('admin/produto/'.$p->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </body>
</html>
