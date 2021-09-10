<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fatitem extends Model
{
	protected $table = 'fatitem';
	protected $primaryKey = 'fatitem_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
}
