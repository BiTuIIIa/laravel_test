<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();

        $post = $this->service->update($post, $data);

        return $post instanceof Post ? new PostResourse($post) : $post;
        /*return redirect()->route('post.show', $post->id);*/


    }

}
