<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $phone  = $request->input('phone');
        $password = $request->input('password');
        $data = new User();
        $data->name = $name;
        $data->phone = $phone;
        $data->email = $email;
        $data->password = Hash::make($password);
        $data->save();
        Session::flash('message', 'insert');
        return redirect('/');
    }

    
}
