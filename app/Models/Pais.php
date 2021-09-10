<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
	protected $table = 'pais';
	protected $primaryKey = 'pais_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
