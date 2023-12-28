<?php

namespace App\Services;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;

class CategoryService{

    protected $category;
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }


    public function AddCategory(array $data){

        $validate = Validator::make($data,[
            'name' => 'required|string|max:20',
            'status' => 'required|in:active,inactive',
        ]);
        if($validate->failed()){
            return ['success' => false, 'error' => $validate->errors()->toArray()];
        }

        $data['slug'] = Str::slug($data['name']);
        $cate = $this->category->insertCategory($data);
        return ['success' => true, 'category' => $cate];
    }

    public function updateCategory($data,$id){
        $validate = Validator::make($data,[
            'name' => 'required|string|max:20',
            'status' => 'required|in:active,inactive',
        ]);
        if($validate->failed()){
            return ['success'=>false, 'error' => $validate->errors()->toArray()];
       }
       if($id === null){
            return ['error' => true];
       }

        $data['slug'] = Str::slug($data['name']);
        $cate =$this->category-> updateCate($data,$id);
        return ['success'=> true, 'cate' => $cate];

    }











}
?>
