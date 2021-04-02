<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Task;
use App\Models\userMessages;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Mosquitto\Message;
use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Stmt\Echo_;


class UserController extends Controller
{
    public function getUserForm($id = 0)
    {
        $entry = new User;
        if ($id > 0) {
            $entry = \App\Models\User::find($id);
        }
        View::share('entry', $entry);
        return view('backend.admin-new-user');
    }

    public function postUserCreated(Request $inputs)
    {
        if (isset($inputs->id) && $inputs->id) {
            return $this->updateUser($inputs);
        } else {
            return $this->createUser($inputs);
        }
    }

    protected function updateUser($data)
    {
        if ($data->filled($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        \App\Models\User::select('id')->whereId($data['id'])
            ->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => $data['type'],
                'permissions' => $data['permissions'],
            ]);
        return redirect()->back();
    }

    protected function createUser($data)
    {
        \App\Models\User::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'permissions' => $data['permissions'],
            'remember_token' => 1,
            'activation_key' => \Illuminate\Support\Str::random(60),
            'activation' => 0
        ]);
        return redirect()->back();
    }

    public function getDelete($id)
    {
        \App\Models\User::deleted($id);
        \App\Models\User::whereId($id)->update(['status' => 'deleted']);
        return redirect()->route('get-user');
    }

    public function getUser()
    {
        $data['taskUser'] = Task::where('user_id', Auth::id())->get();
        View::share('data', $data);
        return view('backend.user');
    }

    public function getMessage()
    {
        $mail = userMessages::orderByDesc('id')->paginate(10);
        View::share('mail', $mail);
        return \view('backend.user-mailbox');
    }

    public function getNewMessage()
    {
        return \view('backend.user-mailbox-content');
    }

    public function postNewMessage($inputs)

    {
        $receiverId = \App\Models\User::where('email', $inputs->email)->select('id')->value('id');
        $type = \App\Models\User::where('email', $inputs->email)->select('type')->value('type');
        if ($type == 'personel') {
            $message = userMessages::create([
                'message_text' => request('message'),
                'sender_id' => (Auth::id()),
                'receiver_id' => $receiverId,
            ]);
            if ($message) {
                return \view('backend.user-mailbox-content');
            }
        } else {
            return \view('backend.user-mailbox-content');
        }
    }

    public function getDeleteMessage($id)
    {
        userMessages::deleted($id);
        userMessages::whereId($id)->update(['status' => 'deleted']);
        return redirect()->back();
    }

    public function getDescriptionChange($id, $description)
    {
        $taskUpdate = Task::where('id', $id)->update(['description' => $description]);
        if ($taskUpdate) {
            Task::where('id', $id)->update(['description' => 'started']);
            return redirect()->back();
        } else {
            Task::where('id', $id)->update(['description' => 'on_confirmation']);
            return redirect()->back();
        }
    }


}


