<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

use Illuminate\Support\Facades\Session;

use function foo\func;

class LoginController extends Controller
{
    public function get_login()
    {
        return view('auth.login');
    }

    public function post_form()
    {
        $inputs = Input::all();
        unset($inputs['_token']);
        $errors = [];
        if (!isset($inputs['email']) || $inputs['email'] == '') {
            $errors[] = 'Kullanıcı Adı Alanı Boş Geçilemez';
        }
        if (!isset($inputs['password']) || $inputs['password'] == '') {
            $errors[] = 'Şifre Alanı Boş Geçilemez';
        }
        if (isset($inputs['password']) && strlen($inputs['password']) < 6) {
            $errors[] = 'Şifreniz En Az 6 Karakter olmalı';
        }
        if (count($errors) > 0) {
            $error = '';
            foreach ($errors as $err) {
                $error = $error . '<br>' . $err;
            }
            Session::flash('alert', $error);

            return redirect()->back();
        }
        $password = bcrypt($inputs['password']);
        $user = User::where('email', $inputs['email'])->first();
        $user->password = $password;
        if (!$user || !Hash::check($inputs['password'], $user->password)) {
            Session::flash('alert', 'Kullanıdı Adı/Şire Uyuşmazlığı');
            return redirect()->back();
        }

        if ($user->type == 'admin') {
            Auth::login($user, true);
            return redirect()->route('get-task');

        } else if ($user->type == 'supervisor') {
            Auth::login($user, true);
            return redirect()->action('SupervisorController@getSupervisor');
        } else {
            Auth::login($user, true);
            return redirect()->action('UserController@getUser');
        }


    }

    public function getLogout()
    {
        Auth::logout();
        Session::flash('exit', 'Çıkış Yapıldı.');
        return redirect()->action('HomeController@login');

    }


}
