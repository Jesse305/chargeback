<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CircuitoMpls extends Model
{
    protected $table = 'circuitompls';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
        'nu_lote', 'ip_lan', 'ip_mascara', 'wan_cliente', 'no_designacao',
        'itemdeconfiguracao_id', 'categoriaitem_id', 'responsavel_id',
        'unidade_id', 'orgao_id', 'status', 'ds_observacao', 'nu_usuarios',
        'dt_instalacao', 'dt_homologacao', 'wan_operadora', 'nu_dhcp',
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

    public function itemConfig()
    {
        return $this->belongsTo(ItemConfig::class, 'itemdeconfiguracao_id');
    }

    public function existe($valor)
    {
        if ($valor) {
            echo $valor;
        } else {
            echo '<i>Não cadastrado.</i>';
        }
    }

    public function printStatus($status)
    {
        if ($status == 1) {
            echo 'Ativo';
        } else {
            echo 'Inativo';
        }
    }

    public function selected($v1, $v2)
    {
        if ($v1 == $v2) {
            echo 'selected';
        }
    }
}
