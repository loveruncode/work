<?php

namespace App\Repositories;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryRepository{

     public function insertCategory($data){

        return DB::table('category')
        ->insert([
            'name'   => $data['name'],
            'slug'   => $data['slug'],
            'status' => $data['status'],
        ]);
    }
    public function updateCate($data,$id){
        return DB::table('category')
        ->where('id', $id)
        ->update([
            'name'   => $data['name'],
            'slug'   => $data['slug'],
            'status' => $data['status'],
        ]);

    }

}

?>
