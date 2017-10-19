<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidade';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
        'no_unidade', 'no_sigla', 'no_endereco', 'nu_cep', 'status', 'orgao_id', 'cidade_id',
    ];

    public function getOrgao($id)
    {
        $orgao = Orgao::findOrFail($id);

        return $orgao;
    }
}
