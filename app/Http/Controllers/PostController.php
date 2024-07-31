<?php

namespace App\Http\Controllers;

use App\Events\PostSendEvent;
use App\Http\Requests\ApproveRequest;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Mail\PostMail;
use App\Models\Post;
use Dotenv\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $token = sha1($post->id);
        Mail::to('harutarakelyan14@gmail.com')->send(new PostMail($token,$post));
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
        } else{
            $post =  $this->postService->update($token);
            if ($post !== false) {
                event(new PostSendEvent($post));
                return redirect()->route('admin-panel');
            } else {
                return  redirect()->route('admin-panel')->with('error', 'You have already approved the post');
            }
        }
    }


}
