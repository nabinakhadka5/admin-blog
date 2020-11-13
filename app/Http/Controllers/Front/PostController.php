<?php

namespace App\Http\Controllers\Front;

use App\Model\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Post $post){

        return view('user.post',compact('post'));
    }
}
