<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Post;

Broadcast::channel('post', function () {
    return true;
});