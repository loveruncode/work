<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Support\Facades\Hash;

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

                return redirect()->route('dashboard')->with('success','Đăng Nhập Thành Công');
            }else{
                return redirect()->back()->with('error', 'Đăng Nhập Thất Bại');
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
            'role' => 'required',
        ]);

        $data = request()->all('name', 'email', 'password', 'password_confirm', 'role');
        $data['password'] = Hash::make(request('password'));

        User::create($data);

        return redirect()->route('register')->with('success', 'Đăng ký thành công');
    }





}
