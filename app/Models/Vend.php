<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vend extends Model
{
	protected $table = 'vend';
	protected $primaryKey = 'vend_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
