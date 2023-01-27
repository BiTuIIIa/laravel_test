<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;

class ShowController extends Controller
{
   public function __invoke(Post $post)
   {
       return new PostResourse($post);
       /*return view('post.show', ['post' => $post]);*/
   }

}
