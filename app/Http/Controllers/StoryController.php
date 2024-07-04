<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(){
        $posts = Post::where('approve',true)->get();
        return view('dashboard.notice-board',compact('posts'));
    }
}
