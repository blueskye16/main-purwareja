<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::where('is_featured', true)->take(3)->get();

        return view('home', [
            'title' => 'Konten Terbaru',
            'posts' => Post::latest()->paginate(6)->withQueryString(),
            'featuredPosts' => $featuredPosts,
        ]);
    }
}
