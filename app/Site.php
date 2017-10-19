<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'dns';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
        'orgao_id', 'unidade_id', 'no_dns', 'no_site', 'codigo_analytics',
        'ip_html', 'ip_banco', 'usuario_banco', 'pwd_banco', 'esquema_banco',
        'ds_website', 'tp_portal', 'prefixo_tabela', 'st_token',
        'usuario_analytics', 'senha_analytics',
    ];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id');
    }

    public function orgao()
    {
        return $this->belongsTo(Orgao::class, 'orgao_id');
    }
}
