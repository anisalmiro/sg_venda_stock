<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cencusto extends Model
{
	protected $table = 'cencusto';
	protected $primaryKey = 'cencusto_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
