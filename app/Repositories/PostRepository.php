<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;

class PostRepository
{

    /// repository la noi tuong tac voi du lieu
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getall()
    {
        return $this->post::paginate(10);
    }
    public function delete($id)
    {
        return $this->post::find($id);
    }

    public function insert($data)
    {
        return $this->post::create($data);
    }
    public function updatePost($data, $id)
    {
        $post = $this->post::find($id);
        if (!$post) {

            return null;
        } else {
            $post->update($data);
            return $post;
        }
    }

    public function getCategorytoView()
    {
        return $this->post::with('category')->get();
    }

    public function getCategoryForPost()
    {

        return Category::all();
    }
}
