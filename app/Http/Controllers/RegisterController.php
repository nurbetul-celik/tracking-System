<?php

namespace App\Http\Controllers;

use App\Mail\usersRegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Psy\Util\Str;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $inputs)
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:50',
            'password' => 'required|confirmed|min:6|max:10',
            'email' => 'required|email',

        ]);

        $user = User::create([
            'name' => $inputs['name'],
            'password' => bcrypt($inputs['password']),
            'remember_token' => 1,
            'email' => $inputs['email'],
            'type' => $inputs['userType'],
            'activation_key' => \Illuminate\Support\Str::random(60),
           // 'activation' => 0


        ]);
        //Mail::to($inputs['email'])->send(new usersRegisterMail($user));
        if ($user->type == 'admin') {
            Auth::login($user, true);
            return redirect()->route('get-task');
        } else {
            Auth::login($user, true);
            return redirect()->action('SupervisorController@getSupervisor');
        }
    }

    public function getActivation($slug)
    {
        $user = User::where('activation_key', $slug)->first();
        if (!is_null($user)) {
            $user->activation_key = null;
            $user->activation = 1;
            $user->save();

            if ($user->type == 'admin') {
                return redirect()->action('AdminController@getAdmin');

            } else if ($user->type == 'supervisor') {
                return redirect()->action('SupervisorController@getSupervisor');
            } else {
                return redirect()->action('UserController@getUser');
            }


        }
    }
}
