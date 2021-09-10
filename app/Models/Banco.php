<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table      = 'banco';
	protected $primaryKey = 'banco_id';
	protected $keyType    = 'string';
	public    $timestamps = false;
	protected $guarded    = []; 
}
