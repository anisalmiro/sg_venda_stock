<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabpreco extends Model
{
	protected $table = 'tabpreco';
	protected $primaryKey = 'tabpreco_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
