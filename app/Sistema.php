<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = 'sistemas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
    	'no_sistema', 'no_sigla', 'id_orgao', 'id_unidade', 'id_banco', 'id_amb', 'desenvolvimento', 'tp_acesso', 'status'
    ];
}
