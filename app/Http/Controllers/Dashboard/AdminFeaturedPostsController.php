<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminFeaturedPostsController extends Controller
{
    public function index()
    {
        $posts = Post::filter(request(['search', 'category']))->latest()->paginate(12)->withQueryString();

        return view('dashboard.featured_posts.index', [
            'posts' => $posts,
        ]);
    }
    // $posts = $posts->sortByDesc('updated_at');
    // kalo dipakein ini jadi error?

    public function pin(Post $post)
    {
        $posts = Post::all();

        if ($posts->where('is_featured', true)->count() < 3) {
            if (!$post->image) {
                return redirect()->route('featured')->with('error', 'Artikel harus memiliki gambar utama untuk disematkan!');
            }
            $post->is_featured = true;
            $post->save();
            return redirect()->route('featured')->with('success', 'Artikel berhasil di sematkan!');
        } elseif ($posts->where('is_featured', true)->count() == 3) {
            return redirect()->route('featured')->with('error', 'Mencapai batas maksimum artikel yang disematkan!');
        }
    }

    public function unpin(Post $post)
    {
        // dd($post);
        $post->is_featured = false;
        $post->save();

        return redirect()->back()->with('success', 'Post unfeatured successfully!');
    }

    // public function unpin(Post $post, $id)
    // {
    //     // Find the featured post by ID
    //     $featuredPost = Post::find($id);

    //     if ($featuredPost) {
    //         // Unfeature the post
    //         $featuredPost->is_featured = false;
    //         $featuredPost->save();

    //         // Redirect back to the dashboard with a success message
    //         return redirect()->back()->with('success', 'Post unfeatured successfully!');
    //     }

    //     // If the post is not found, redirect back with an error message
    //     return redirect()->back()->with('error', 'Post not found!');
    // }
}
