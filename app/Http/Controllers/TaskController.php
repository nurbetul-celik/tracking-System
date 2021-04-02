<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\userPerformance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Static_;
use function foo\func;

class TaskController extends Controller
{
    public function getTaskForm($id = 0)
    {
        $entry = new Task;
        if ($id > 0) {
            $entry = \App\Models\Task::find($id);
        }
        \Illuminate\Support\Facades\View::share('entry', $entry);
        return view('backend.admin-new-task');
    }

    public function postTaskCreated(Request $inputs)
    {
        if (isset($inputs->id) && $inputs->id) {
            return $this->updateTask($inputs);
        } else {
            return $this->createTask($inputs);
        }
    }

    protected function updateTask($data)
    {
        $type = User::select('type')->whereId($data['id']);
        if ($type == 'user') {
            Task::select('id')->whereId($data['id'])->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'supervisor_id' => 0,
                'start_date' => $data['startedDate'],
                'deadline_date' => $data['finishedDate'],
            ]);
        } else {
            Task::select('id')->whereId($data['id'])->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'supervisor_id' => $data['user_id'],
                'user_id' => 0,
                'start_date' => $data['startedDate'],
                'deadline_date' => $data['finishedDate'],
            ]);
        }
        return redirect()->back();
    }

    protected function createTask($data)
    {
        $type = User::select('type')->whereId($data['id']);
        if ($type == 'user') {
            Task::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'user_id' => $data['user_id'],
                'supervisor_id' => 0,
                'start_date' => $data['startedDate'],
                'deadline_date' => $data['finishedDate'],
            ]);
        } else {
            Task::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'user_id' => 0,
                'supervisor_id' => $data['user_id'],
                'start_date' => $data['startedDate'],
                'deadline_date' => $data['finishedDate'],
            ]);
        }


        return redirect()->back();
    }

    public function getSupervisorTaskForm($id = 0)
    {
        $supervisorTask = new Task;
        if ($id > 0) {
            $supervisorTask = \App\Models\Task::find($id);
        }
        \Illuminate\Support\Facades\View::share('supervisorTask', $supervisorTask);
        return view('backend.supervisor-new-task');
    }


    public
    function postSupervisorTaskCreated(Request $inputs)
    {
        if (isset($inputs->id) && $inputs->id) {
            return $this->updateTaskSupervisor($inputs);
        } else {
            return $this->createTaskSupervisor($inputs);
        }
    }

    protected function createTaskSupervisor($data)
    {
        Task::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'supervisor_id' => 0,
            'start_date' => $data['startedDate'],
            'deadline_date' => $data['finishedDate'],
            'difficulty' => $data['difficulty']
        ]);

        return redirect()->back();
    }

    protected function updateTaskSupervisor($data)
    {

        Task::select('id')->whereId($data['user_id'])->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'supervisor_id' => 0,
            'start_date' => $data['startedDate'],
            'deadline_date' => $data['finishedDate'],
            'difficulty' => $data['difficulty']

        ]);

        return redirect()->back();
    }

    public function getDeleteTask($id)
    {
        Task::deleted($id);
        Task::whereId($id)->update(['status' => 'deleted']);
        return redirect()->back();

    }
}
