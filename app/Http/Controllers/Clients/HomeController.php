<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::latest('created_at')
            ->with('topic:id,title')
            ->select('id', 'title', 'slug', 'content', 'topic_id', 'thumbnail', 'created_at')
            ->take(3)
            ->get();
        return view('client.pages.index', compact('latestPosts'));
    }
}
