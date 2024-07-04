<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Post;

Broadcast::channel('App.Models.Post.{id}', function ($post, $id) {
    return (int) $post->id === (int) $id;
});
