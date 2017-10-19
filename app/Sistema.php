<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = 'sistemas';
    protected $primaryKey = 'id';
    const CREATED_AT = 'dt_cadastro';
    const UPDATED_AT = 'dt_atualizacao';

    protected $fillable = [
        'no_sistema', 'no_sigla', 'id_orgao', 'id_unidade', 'id_banco',
        'id_amb', 'desenvolvimento', 'tp_acesso', 'status',
    ];

    public function orgao()
    {
        return $this->belongsTo(Orgao::class, 'id_orgao');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'id_unidade');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'id_banco');
    }

    public function ambientes()
    {
        return $this->belongsTo(Ambiente::class, 'id_amb');
    }

    public function desenvolvedores()
    {
        return $this->belongsToMany(Desenvolvedor::class, 'sistemas_devs', 'id_sistema', 'id_dev');
    }

    public function frameworks()
    {
        return $this->belongsToMany(Framework::class, 'sistemas_frameworks', 'id_sistema', 'id_framework');
    }
}
