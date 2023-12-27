<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class UserController extends Controller
{
         public function getName(){

           $username =  Auth::user()->name;
           return view('admin.admin-home', compact('username'));

         }

         public function updatePassword(Request $request){

            //current_password
            // new_password
            // password_confirm
            $user = Auth::user();
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Mật khẩu hiện tại không đúng. Hãy nhập lại.');
            }
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => Hash::make($request->new_password)]);
          return redirect()->back()->with('success', 'Mật khẩu đã được cập nhật thành công!');
        }
         }


