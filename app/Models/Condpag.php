<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condpag extends Model
{
	protected $table      = 'condpag';
	protected $primaryKey = 'condpag_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded    = []; 
}
