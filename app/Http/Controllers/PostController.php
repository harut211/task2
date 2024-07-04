<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Mail\PostMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }



    public function create(PostRequest $request){

      $post =  $this->postService->create($request);
      Mail::to('harutyuna6@gmail.com')->queue(new PostMail($post));
      return back()->with('success', 'Post Created Successfully');

    }

    public function approved($id){
        $this->postService->update($id);
        return view('auth.admin-panel');
    }

}
