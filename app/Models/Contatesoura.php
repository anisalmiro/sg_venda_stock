<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatesoura extends Model
{
    protected $table      = 'contatesoura';
	protected $primaryKey = 'contatesoura_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded    = []; 
}
