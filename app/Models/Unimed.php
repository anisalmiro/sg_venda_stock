<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unimed extends Model
{
	protected $table = 'unimed';
	protected $primaryKey = 'unimed_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
