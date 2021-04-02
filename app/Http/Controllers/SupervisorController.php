<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\userMessages;
use App\Models\userPerformance;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class SupervisorController extends Controller
{
    public function getSupervisor()
    {
        $Supervisor = Task::where('supervisor_id', Auth::id())->get();
        View::share('Supervisor', $Supervisor);
        return view('backend.supervisor');
    }

    public function getTaskSupervisor()
    {
        $data['taskSupervisor'] = Task::where('status', 'active')->orderByDesc('id')->paginate(5);
        $data['userPerformance'] = userPerformance::all();
        View::share('data', $data);
        return \view('backend.supervisor-task');

    }

    public function getSupervisorDescriptionChange($id, $description)
    {
        $taskUpdate = Task::where('id', $id)->update(['description' => $description]);
        if ($taskUpdate) {
            Task::where('id', $id)->update(['description' => 'revision']);
            return redirect()->back();
        } else {
            Task::where('id', $id)->update(['description' => 'finished']);
            return redirect()->back();
        }
    }

    public function postPerformance()
    {
        userPerformance::create([
            'starts' => \request('starts'),
            'user_id' => \request('user_id'),
            'task_id' => \request('task_id'),
        ]);

        return redirect()->back();

    }

    public function getPerformance($id = 0)
    {

        if ($id > 0) {
            $data['performance'] = Task::find($id);
        }
        $data['taskSupervisor'] = Task::where('status', 'active')->orderByDesc('id')->paginate(5);
        View::share('data', $data);
        return \view('backend.stars');
    }


}
