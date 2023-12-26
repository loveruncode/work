<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Postcontroller extends Controller
{



    public function Postadd()
    {
        $category = Category::all();
        return  view('admin.add-post')->with('category', $category);
    }

    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:30',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        Storage::putFileAs('public/images/', $image, $imageName);
        $category_id = $request->input('category_id');
        $title = $request->input('title');
        $status = $request->input('status');
        $content = $request->input('content');
        $is_featured = $request->has('is_featured') ? 1 : 0;
        $excerpt = $request->input('excerpt');
        $slug = Str::slug($title);

        $post = new Post();
        $post->title = $title;
        $post->status = $status;
        $post->image = $imageName;
        $post->is_featured = $is_featured;
        $post->slug = $slug;
        $post->excerpt = $excerpt;
        $post->content = $content;
        $post->category_id = $category_id;
        $post->save();
        // dd($post);
        return redirect()->back()->with('success', 'Bài viết đã được thêm thành công');
    }

    public function getValueforTable()
    {
        $ps = Post::all();
        return  view('layout.table-admin', compact('ps'));
    }
    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Xoá Thất Bại');
        }
        $post->delete();
        return redirect()->back()->with('success', 'Đã Xoá Thành Công');
    }


    public function update($id){
        return view ('layout.update-post' ,compact('id'));
    }

    public function updateForm(Request $request, $id){

         $post = Post::select('title','status','is_featured','image', 'excerpt', 'content')->find($id);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        Storage::putFileAs('public/images/', $image, $imageName);

        $title = $request->input('title');
        $status = $request->input('status');
        $content = $request->input('content');
        $is_featured = $request->has('is_featured') ? 1 : 0;
        $excerpt = $request->input('excerpt');
        $slug = Str::slug($title);

        $post = Post::find($id);
        $post->title = $title;
        $post->status = $status;
        $post->image = $imageName;
        $post->is_featured = $is_featured;
        $post->slug = $slug;
        $post->excerpt = $excerpt;
        $post->content = $content;

        $post->update();
        return redirect()->back()->with('success', 'Bài viết đã được thay đổi thành công');

    }

    public function deleteSelect(Request $request)
    {
            $bien  = print_r($request->ck);
            return $bien;
    }


         public function getViews(){

            $posts = Post::with('category')->get();
            return view('layout.postview', compact('posts'));

         }



         public function viewAccount(){

            $user = auth()->user();
            $username = $user->name;
            $email = $user->email;
            $role = $user->role;
            return view ('admin.user-view')->with([
                'users' => $username,
                'email' => $email,
                'role' => $role,
            ]);
         }


}

