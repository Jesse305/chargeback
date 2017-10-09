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
    	'nu_lote', 'ip_lan', 'ip_mascara', 'wan_cliente', 'no_designacao', 'itemdeconfiguração_id', 'categoriaitem_id', 
    	'responsavel_id', 'unidade_id', 'orgao_id', 'status', 'ds_observacao', 'nu_usuarios', 'dt_instalacao', 'dt_homologacao', 
    	'wan_operadora', 'nu_dhcp'
    ];

    public function getOrgao($orgao_id){
    	$orgao = Orgao::findOrFail($orgao_id);
    	return $orgao;
    }

    public function getUnidade($unidade_id){
    	$unidade = Unidade::findOrFail($unidade_id);
    	return $unidade;
    }

    public function getResponsavel($resp_id){
        $responsavel = Responsavel::findOrFail($resp_id);
        return $responsavel;
    }

    public function getItemConfig($itemConfig_id){
    	$itemConfig = ItemConfig::findOrFail($itemConfig_id);
    	return $itemConfig;
    }

    public function existe($valor){
        if($valor){
            echo $valor;
        }else{
            echo "<i>Não cadastrado.</i>";
        }
    }

    public function printStatus($status){
        if($status == 1){
            echo 'Ativo';
        }
        else{
            echo 'Inativo';
        }
    }
}
