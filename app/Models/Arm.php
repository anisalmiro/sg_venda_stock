<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arm extends Model
{
	protected $table = 'arm';
	protected $primaryKey = 'arm_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
