<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = 'banco_dados';
    protected $primaryKey = 'id_banco';
    public $timestamps = false;
}
