<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Queue\TimeoutExceededException;
use Illuminate\Support\Facades\Cache;

class PostService
{
    public function create($request)
    {

        $post = Post::updateOrCreate([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $token = sha1($post->id);
        Cache::put('STORY_TOKEN_'.$token, $token, 3600);
        $post->update([
            'token' => $token,
        ]);
        return $post;
    }


    public function update($token)
    {
            if (Cache::has('STORY_TOKEN_'.$token)) {
                $post = Post::where('token', $token)->first();
                if ($post->approve !== 1) {
                    $post->approve = 1;
                    $post->save();
                    return $post;
                } else {
                    return false;
                }
            } else {
                throw new TimeoutExceededException('Your approval token  has expired');
            }
    }


}
