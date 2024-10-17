<!-- <form action="{{ url('produto') }}" method="POST">
    @csrf
    <input type="text" name="nome_produto" id="nome_produto" placeholder="Informe o nome do produto" required>
    <br>
    <input type="text" name="valr_produto" id="valr_produto" placeholder="Informe o Valor do Produto" required>
    <br>
    <textarea name="desc_produto" id="desc_produto" placeholder="Informe a Descricao"></textarea>
    <br>
    <button type="submit">Create Product</button>
</form> -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastrar Produto</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA="
        crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
        <h2>Cadastrar Produto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ url('admin/produto') }}" method="POST">
            <div class="form-group">
                <label for="nome_produto">Produto: *</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Nome do Produto" value="@if(isset($produto)) {{ $produto->nome_produto }}  @endif">
            </div>
            <div class="form-group">
                <label for="desc_produto">Descrição:</label>
                <textarea class="form-control" name="desc_produto" id="desc_produto" placeholder="Informe a descrição do produto"> @if(isset($produto)) {{ $produto->desc_produto }}  @endif</textarea>
            </div>
            <div class="form-group">
                <label for="valr_produto">Valor: *</label>
                <input type="text" class="form-control" id="valr_produto" placeholder="R$ 0,00" name="valr_produto" value="@if(isset($produto)) {{ $produto->valr_produto }}  @endif}">
            </div>
            <div class="form-group">
                <label for="url_imagem">URL Imagem:</label>
                <input type="text" class="form-control" id="url_imagem" name="url_imagem" placeholder="URL da Imagem do Produto" value="@if(isset($produto)) {{ $produto->url_imagem }}  @endif">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ url('admin/produto') }}">
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Voltar
                </button>
            </a>
            @csrf
        </form>
    </div>

</body>
</html>

<script>
    $('input[name=valr_produto]').mask('#.##0,00', {reverse: true, maxlength: false});
    $('input[name=valr_produto]').on('keyup', function(e) {
        if(this.value.length<3 && this.value.length>0)
            this.value='0,0'+this.value;
        this.value = this.value.replace(/^(0*\.)*0+,/, '0,').replace(/^(0+\.?)*([1-9],)/, '$2');
    }).trigger('keyup');
</script>
