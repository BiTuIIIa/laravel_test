<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResourse;
use App\Models\Post;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {

       $data = $request->validated();

       $post = $this->service->store($data);

       return new PostResourse($post);
       // return redirect()->route('post.index');
   }

}
