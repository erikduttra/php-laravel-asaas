# php-laravel-asaas
Projeto de integração de pagamentos com as APIs do ASAAS em Laravel


Seguir os passos para rodar o projeto:
1 - Rodar o script:
CREATE SCHEMA saas;
2 - Executar os comandos:
 a) php artisan migrate
 b) php artisan db:seed --class=TipoPagamentoSeeder

3 - Acessar as rotas:
 a) URL_PROJETO/admin/produto (Cadastrar os produtos)
 b) URL_PROJETO/produto/compra (Escolher o produto e metodo de pagamento)

4 - Versões:
 PHP - 7.4
 MySQL - 8
 Laravel - 8
