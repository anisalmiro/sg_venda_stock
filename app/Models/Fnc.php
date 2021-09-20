<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fnc extends Model
{
            protected $table = 'fnc';
        	protected $primaryKey = 'idfnc';
        	protected $keyType = 'string';
        	public    $timestamps = false;
        	protected $guarded = [];
}
