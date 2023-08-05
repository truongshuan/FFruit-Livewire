<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class SinglePostController extends Controller
{
    public function show(string $slug)
    {
        $post = Post::getBySlug($slug);
        $latestPosts = Post::latest('created_at')->take(5)->get();
        $relatedPosts = DB::table('posts')
            ->where('topic_id', $post->topic_id)
            ->where('id', '!=', $post->id)
            ->limit(5)
            ->get();
        return view('client.pages.single-news', compact('post', 'latestPosts', 'relatedPosts'));
    }
}
