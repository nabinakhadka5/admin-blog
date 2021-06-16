<?php

namespace App\Model\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password','status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Model\Admin\Role');
    }


    public function getNameAttribute($value){
        ucfirst($value);
    }

}
