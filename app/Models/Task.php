<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\userPerformance;

class Task extends Model
{
    protected $table = 'laravel_tb_task';
    protected $fillable = ['name', 'description', 'user_id', 'difficulty', 'start_date', 'deadline_date', 'supervisor_id'];

    public function userInformation()
    {
        return $this->hasOne('App\Models\User', 'id');
    }

    public function userPerformance()
    {
        return $this->hasOne('App\Models\userPerformance', 'id');
    }
}
