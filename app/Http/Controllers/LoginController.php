<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
        $data = User::where('email', $email)->first();
        if ($data != null) {
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                return redirect('/dashboard');
            }else {
                Session::flash('message', 'login2');
                return redirect('/');
            }
        } else {
            Session::flash('message', 'login1');
            return redirect('/');
        }
    }


    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    
    public function dashboard()
    {
        return view('dashboard');
    }
   
}
