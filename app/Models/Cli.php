<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cli extends Model
{
	protected $table = 'cli';
	protected $primaryKey = 'cli_id';
	protected $keyType = 'string';
	public    $timestamps = false;
	protected $guarded = []; 
    const CREATED_AT = 'cli_datacriacao';
    const UPDATED_AT = 'cli_dataatualizacao';
}
