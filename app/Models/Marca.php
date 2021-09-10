<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
	protected $table = 'marca';
	protected $primaryKey = 'marca_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
