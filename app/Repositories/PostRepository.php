<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Post;

class PostRepository extends BaseRepository
{

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function index()
    {
        return $this->model
                    ->orderBy('sort', 'asc')
                    ->orderBy('release_date', 'desc')
                    ->paginate(10);
    }

    public function store($inputs)
    {
        $post = new $this->model;
        $post->id           = $this->uniqid();
        $post->cat          = '';
        $post->name         = $inputs['name'];
        $post->release_date = $inputs['release_date'];
        $post->img          = $inputs['img'];
        $post->content      = $inputs['content'];
        $post->status       = $inputs['status'];
        $post->sort         = $inputs['sort'];
        $post->title        = $inputs['title'];
        $post->keywords     = $inputs['keywords'];
        $post->description  = $inputs['description'];
        $post->slug         = '';
        $post->save();
    }

    public function edit($id)
    {
        return $this->getById($id);
    }

    public function update($id, $inputs)
    {
        $this->getById($id)->update($inputs);
    }
}
