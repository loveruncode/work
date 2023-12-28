<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
                return redirect()->back()->withErrors(['error' => 'Sai Tài Khoản hoặc Mật khẩu'])->withInput();
            }

    }
    public function dangky(){
        return view ('register');
    }

    public function check_dangky(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'role' => ['required', Rule::in([UserRole::employee, UserRole::admin])],
        ]);

        $data = $request->only('name', 'email', 'password', 'password_confirm', 'role');
        $data['password'] = Hash::make($request->input('password'));
        User::create($data);
        return redirect()->route('register')->with('success', 'Đăng ký thành công');


    }





}
