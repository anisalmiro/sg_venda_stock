<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipofat extends Model
{
	protected $table = 'tipofat';
	protected $primaryKey = 'tipofat_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
