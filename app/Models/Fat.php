<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fat extends Model
{
	protected $table = 'fat';
	protected $primaryKey = 'fat_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
