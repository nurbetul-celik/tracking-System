<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\View\View;
use MongoDB\Driver\Session;
use Illuminate\Support\Facades;


class AdminController extends Controller
{

    public function getUser()
    {
        $user = User::where('status', 'active')->orderByDesc('id')->paginate(5);
        Facades\View::share('user', $user);
        return view('backend.admin-user');
    }

    public function getTask()
    {
        $task = Task::all();
       // $task = Task::where('status', 'active')->orderByDesc('id')->paginate(5);
        Facades\View::share('task', $task);
        return view('backend.admin-task');
    }


}
