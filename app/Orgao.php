<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    protected $table = 'orgao';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
    	'no_orgao', 'no_sigla', 'tp_orgao', 'status'
    ];
}
