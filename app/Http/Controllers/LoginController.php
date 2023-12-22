<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function home(){
        return view ('home');
    }
    public function check_login(){

        request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',

        ]);

        $data = request()->all('email', 'password');
            if(auth()->attempt($data)){

                return redirect()->route('dashboard');
            }else{
                return redirect()->back();
            }

    }
    public function dangky(){
        return view ('register');
    }

    public function check_dangky(){
         request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
         ]);
         $data = request()->all('name','email', 'password', 'password_confirm');
        $data['password'] = bcrypt( request('password'));
       User::create($data);
       return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }





}
