<?php

namespace App\Http\Controllers;

use App\Mail\PostMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{

    public function create(Request $request){

     $r =  Mail::to('harutyuna6@gmail.com')->send(new PostMail($request));
     if ($r){
         echo "success";
     }
    }


    public function approved(Request $request){

    }
}
