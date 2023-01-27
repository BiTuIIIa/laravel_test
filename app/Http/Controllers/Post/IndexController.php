<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;

class IndexController extends Controller
{
   public function __invoke()
   {
       $posts = Post::paginate(10);


       return PostResourse::collection($posts);
       //return view('post.index', ['posts' => $posts]);
   }

}
