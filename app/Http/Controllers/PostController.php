<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        return view('blog.index',[
            'posts' => Post::published()->featured()->latest('published_at')->take(3)->get()
        ]);
    }
}
