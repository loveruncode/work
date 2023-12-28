<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $table = 'category';

    protected $guarded = [];
    // protected $fillable = [
    //      'name',
    //      'status',
    //         'slug'
    // ];
     public function post(){

        return $this->HasMany(Post::class);
     }

}
