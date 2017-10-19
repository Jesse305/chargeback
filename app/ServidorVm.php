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
        'no_servidor', 'no_dns', 'ip_endereco', 'nu_cpu', 'nu_espaco_sas',
        'nu_espaco_sata', 'cloud_server', 'sis_operacional', 'ds_observacao',
        'responsavel_id', 'unidade_id', 'orgao_id', 'no_aquivo', 'status',
    ];

    public function orgao()
    {
        return $this->belongsTo(Orgao::class, 'orgao_id');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(Responsavel::class, 'responsavel_id');
    }

    public function printStatus($nStatus)
    {
        if ($nStatus === 1) {
            echo 'Ativo';
        } else {
            echo 'Inativo';
        }
    }

    public function existe($variavel)
    {
        if ($variavel) {
            echo $variavel;
        } else {
            echo "<font color='red'>Não Cadastrado</font>";
        }
    }
}
