<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipopag extends Model
{
    protected $table      = 'tipopag';
	protected $primaryKey = 'tipopag_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded    = []; 
}
