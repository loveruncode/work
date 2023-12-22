<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
         public function getName(){

           $username =  Auth::user()->name;
           dd($username);
           return view('admin.admin-home', compact('username'));

         }

}
