<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovCircuito extends Model
{
    protected $table = 'movimentacaocircuito';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
        'circuitompls_id', 'ip_lan', 'ip_mascara', 'wan_cliente',
        'wan_operadora', 'no_designacao', 'ds_observacao', 'dt_instalacao',
        'dt_homologacao', 'itemdeconfiguracao_id', 'responsavel_id',
        'unidade_id',
    ];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id');
    }

    public function itemConfig()
    {
        return $this->belongsTo(ItemConfig::class, 'itemdeconfiguracao_id');
    }

    public function nulo($valor)
    {
        if ($valor) {
            echo $valor;
        } else {
            echo '<i>Informação indisponível.</i>';
        }
    }

    public function selected($val1, $val2)
    {
        if ($val1 == $val2) {
            echo 'selected';
        }
    }
}
