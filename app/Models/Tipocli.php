<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipocli extends Model
{
	protected $table = 'tipocli';
	protected $primaryKey = 'tipocli_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
