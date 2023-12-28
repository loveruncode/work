<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $guarded = ['users'];

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
