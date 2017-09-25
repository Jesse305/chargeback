<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'responsavel';
    protected $primaryKey = 'id';
    public $timestamps = true;
    const CREATED_AT = 'dt_cadastro';    
    const UPDATED_AT = 'dt_atualizacao';   
}
