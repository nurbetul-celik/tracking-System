<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userMessages extends Model
{
    protected $table = 'tb_messages';
    protected $guarded = [];

    public function message()
    {
        return $this->belongsToMany('App\Models\User', 'id');
    }
}
