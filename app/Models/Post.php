<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $table = 'post';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'status',
        'is_featured',
        'image',
        'excerpt',
        'content',
        'posted_at',
        'category_id'
    ];
 //// mot post se co 1 category
    public function category(){

        return $this->belongsTo(Category::class);
    }
}
