<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = "pagamento";

    protected $fillable = ['info_adicional', 'id_tipo_pagamento', 'id_user'];

}
