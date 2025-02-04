<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
return view('home', [
    //featured post
    'FeaturePost' => Post::published()->featured()->latest('published_at')->take(3)->get(),
    'LatestPost' => Post::latest()->take(9)->get()

]);
    }
}
