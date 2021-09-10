<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formapag extends Model
{
	protected $table = 'formapag';
	protected $primaryKey = 'formapag_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
