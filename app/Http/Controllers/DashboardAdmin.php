<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdmin extends Controller
{
    //



        public function dashboard(){

            if (Auth::check()) {

                $user = Auth::user();
                return view('admin.admin-home',['user' => $user]);
            }
        }


        public function logout(){

            Auth::logout();
                return redirect()->route('login');
        }
}
