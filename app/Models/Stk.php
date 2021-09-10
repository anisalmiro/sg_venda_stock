<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stk extends Model
{
	protected $table = 'stk';
	protected $primaryKey = 'stk_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
