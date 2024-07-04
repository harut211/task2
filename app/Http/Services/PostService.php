<?php

namespace App\Http\Services;

use App\Models\Post;

class PostService{
    public function create($request){
        $post = Post::updateOrCreate([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);

        return $post;
    }


    public function update($id){
        $post= Post::find($id);
        $post->approve = 1;
        $post->save();
        return $post;
    }


}
