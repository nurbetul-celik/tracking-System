<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userPerformance extends Model
{
    protected $table = 'tb_userPerformance';
    protected $fillable = ['user_id', 'task_id', 'starts'];

}
