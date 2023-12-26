<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory(){

        $cate = Category::all();
        
    return view('admin.catogory', compact('cate'));
    }

    public function addCategory(Request $request){
             //name
             //description
                //status
         $request->validate([
            'name' => 'required|string|max:20',
            'status' => 'required|in:active,inactive',

         ]);
         $name = $request->input('name');
         $slug = Str::slug($name);
         $status = $request->input('status');
         $cate = new Category();
         $cate->name = $name;
         $cate->slug = $slug;
         $cate->status = $status;
         $cate->save();
         return redirect()->back()->with('success', 'Đã Thêm Chuyên Mục Thành Công');
    }
        public function updateCate($id){
            return view ('admin.updatecategory', compact('id'));
        }

        public function updateFormCategory(Request $request, $id){

            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->status = $request->input('status');
            $category->slug = Str::slug($request->input('name'));
            $category->save();

            return redirect()->back()->with('success','Đã Sửa danh mục thành công!');

        }



}
