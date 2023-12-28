<?php

namespace App\Services;
use Illuminate\Support\Str;
use App\interfaces\RepositoryInterface;
use Illuminate\Support\Facades\Validator;
class PostService {

    protected $Postrepository;
     public function __construct(RepositoryInterface $Postrepository)
     {
            $this->Postrepository = $Postrepository;
     }

     public function getPostAll(){

        return $this->Postrepository->getall();
     }

     public function deleteByID($id){
        return $this->Postrepository->delete($id);
     }
     public function insertDatatoPost(array $data){

        $validator  = Validator::make($data,[
            'title' => 'required|unique',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'content' => 'required',
        ]);
        if($validator->failed()){
             return ['success'=>false, 'error' => $validator->errors()->toArray()];
        }
        $data['slug'] = Str::slug($data['title']);
        $image  = $data['image'];
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/images'), $imageName);
        $data['image'] = $imageName;
        $post = $this->Postrepository->insert($data);
        return ['success' => true, 'post' => $post];

     }

     public function updatePost( array $data, $id){
        $validator = Validator::make($data,[
            'title' => 'required|unique',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'content' => 'required',
        ]);
        if($validator->failed()){
            return ['success'=>false, 'error' => $validator->errors()->toArray()];
       }
       if($id === null){
        return ['error' => true];
       }else{
        $data['slug'] = Str::slug($data['title']);
        $image  = $data['image'];
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/images'), $imageName);
        $data['image'] = $imageName;
        $post = $this->Postrepository->update($data,$id);
        return ['success' => true, 'post' => $post];
       }
     }

     public function getCategory(){

        return $this->Postrepository->getCategorytoView();
     }

     public function getAllCategory(){

        return $this->Postrepository->getCategoryForPost();
     }
}




















?>
