<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento_produto', function (Blueprint $table) {
            $table->index('id_produto');
            $table->index('id_pagamento');

            $table->id();
            $table->double('qtd_produto');
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id')->on('produto');
            $table->unsignedBigInteger('id_pagamento');
            $table->foreign('id_pagamento')->references('id')->on('pagamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamento_produto');
    }
}
