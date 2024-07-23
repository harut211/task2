<?php

namespace App\Http\Controllers;

use App\Events\PostSendEvent;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Mail\PostMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(PostRequest $request)
    {
        $post = $this->postService->create($request);
        Mail::to('harutarakelyan14@gmail.com')->send(new PostMail($post));
        return back()->with('success', 'Post Created Successfully');
    }

    public function approved($id)
    {
        $this->postService->update($id);
        $post = Post::find($id);
        event(new PostSendEvent($post));
        return redirect()->route('admin-panel');
    }


}
