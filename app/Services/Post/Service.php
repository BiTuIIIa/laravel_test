<?php

namespace App\Services\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags, ['created_at' => new \DateTime('now')]);

    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);

    }

}
