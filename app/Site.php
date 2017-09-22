<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'dns';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';
}

 


    