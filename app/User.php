<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\ConsultorInd;
use App\Models\Conflito;
use App\Models\Classificacao;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'util';
    protected $primaryKey = 'util_id';
    protected $rememberTokenName = 'util_lembrarsenha';

    protected $fillable = [
        'util_email', 'util_senha',
    ];

    protected $attributes = [

    ];

    protected $hidden = [
        'util_senha',
    ];
}
