<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $guard = 'admin';
    
    protected $date=['deleted_at'];
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
