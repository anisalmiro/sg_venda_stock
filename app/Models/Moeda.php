<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moeda extends Model
{
	protected $table = 'moeda';
	protected $primaryKey = 'moeda_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
