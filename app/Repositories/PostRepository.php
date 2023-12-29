<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
use App\interfaces\RepositoryInterface;


class PostRepository implements RepositoryInterface
{

    /// repository la noi tuong tac voi du lieu
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getall()
    {
        return  $this->post->all();
    }
    public function delete($id)
    {
        return $this->post->findOrFail($id);
    }

    public function insert($data)
    {
        return  $this->post->create($data);
    }
    public function update($data, $id)
    {
        $post = $this->post->findOrFail($id);
        if (!$post) {
            return null;
        } else {
            $post->update($data);
            return $post;
        }
    }


    public function getCategorytoView()
    {
        return $this->post->with('category')->get();
    }

    public function getCategoryForPost()
    {
        return Category::all();
    }
}
