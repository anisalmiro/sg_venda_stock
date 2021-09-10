<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
	protected $table = 'grupo';
	protected $primaryKey = 'grupo_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = [];
}
