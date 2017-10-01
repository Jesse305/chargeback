<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    protected $table = 'frameworks';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
    	'no_framework'
    ];
}
