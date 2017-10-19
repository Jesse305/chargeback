<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = 'banco_dados';
    protected $primaryKey = 'id_banco';
    public $timestamps = false;

    protected $fillable = [
        'ambiente_banco', 'tecnologia_banco', 'ip_banco', 'usuario_banco',
        'senha_banco', 'schema_banco',
    ];
}
