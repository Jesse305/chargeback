<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemConfig extends Model
{
    protected $table = 'itemdeconfiguracao';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable =  [
    	'no_item', 'ds_descricao', 'nu_custo_mensal', 'categoriaitem_id', 'ds_configuracao', 'status'
    ];

}
