<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'dev';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'no_dev', 'ip_dev',
    ];
}
