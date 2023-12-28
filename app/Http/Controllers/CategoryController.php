<?php

namespace App\Http\Controllers;
use App\Services\PostService;
use App\Services\CategoryService;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     protected $categorySerice;
     protected $cate;
     public function __construct(CategoryService $cate,PostService $categorySerice)
     {
            $this->categorySerice = $categorySerice;
            $this->cate = $cate;
     }

    public function viewCategory(){

        $cate = $this->categorySerice->getAllCategory();
        return view('admin.catogory', compact('cate'));
    }

    public function addCategory(Request $request){

        $data = $request->all();
        $result = $this->cate->AddCategory($data);
        if ($result['success']) {
            return redirect()->back()->with('success', 'Danh Mục đã được thêm thành công');
        } else {
            return redirect()->back() - with('error', 'Thêm Danh Mục Thất Bại')->withErrors($result['error']);
        }
    }
        public function updateCate($id){
            return view ('admin.updatecategory', compact('id'));
        }

        public function updateFormCategory(Request $request, $id){

            $data = $request->all();
            $result = $this->cate->updateCategory($data,$id);
            if ($result['success']) {
                return redirect()->back()->with('success', 'Danh Mục đã được sửa thành công');
            } else {
                return redirect()->back() - with('error', 'Sửa Danh Mục Thất Bại')->withErrors($result['error']);
            }
        }

        public function deleteSelect(Request $request)
        {
             $ids = $request->ids;
             if($ids == null){
                return redirect()->back()->with('error', 'vui lòng chọn 1 mục để xoá !');
             }else{
             Category::whereIn('id', $ids)->delete();
             return redirect()->back()->with('success', 'Đã xoá các mục đã chọn');
        }
}
}
