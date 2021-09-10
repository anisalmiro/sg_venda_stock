<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabiva extends Model
{
	protected $table = 'tabiva';
	protected $primaryKey = 'tabiva_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
