<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'ambientes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'desc_amb', 'ip_trein', 'usuario_trein', 'senha_trein', 'ip_homol', 'usuario_homol', 'senha_homol', 'ip_prod', 'usuario_prod', 'senha_prod', 'link_prod',
    ];
}
