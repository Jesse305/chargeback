<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServidorVm extends Model
{
    protected $table = 'servidorvm';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = 
    [
    	'no_servidor', 'no_dns', 'ip_endereco', 'nu_cpu', 'nu_espaco_sas', 'nu_espaco_sata', 'ds_observacao', 'responsavel_id', 'unidade_id', 'orgao_id', 'no_aquivo', 'status'
    ];
}
