<?php

namespace App\Http\Controllers;

use App\Events\PostSendEvent;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Mail\PostMail;
use Illuminate\Support\Facades\Cache;
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

    public function approved(Request $request)
    {
        $token = $request->route('token');
        $validator = \Illuminate\Support\Facades\Validator::make(
            ['token' => $token],
            ['token' => 'required|exists:posts,token']
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $post = $this->postService->update($token);
            if ($post !== false) {
                event(new PostSendEvent($post));
                return redirect()->route('admin-panel');
            } else {
                return redirect()->route('admin-panel')->with('error', 'You have already approved the post');
            }
        }
    }
}
