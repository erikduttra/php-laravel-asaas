<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pagamento')->insert([
            [
                'codg_tipo' => 1,
                'desc_tipo' => 'Boleto',

            ],
            [
                'codg_tipo' => 2,
                'desc_tipo' => 'Cartão Credito',
            ],
            [
                'codg_tipo' => 3,
                'desc_tipo' => 'Pix',
            ],
        ]);
    }
}
