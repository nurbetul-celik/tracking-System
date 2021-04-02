<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable

{

    protected $table = 'laravel_tb_user';
    protected $fillable = ['name', 'email', 'password', 'permission', 'type', 'remember_token', 'activation_key', 'activation'];
    protected $hidden = ['password', 'activation_key', 'remember_token', 'activation'];


    public function messageReceiver()
    {
        return $this->hasMany('App\Models\userMessages', 'id');
    }


}
