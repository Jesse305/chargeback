<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $table = 'responsavel';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
        'no_responsavel', 'nu_telefone', 'no_email', 'status', 'unidade_id',
        'orgao_id', 'nu_celular', 'ds_observacao',
    ];

    public function getUnidade($id)
    {
        $unidade = Unidade::findOrfail($id);

        return $unidade;
    }

    public function getOrgao($id)
    {
        $orgao = Orgao::findOrfail($id);

        return $orgao;
    }
}
