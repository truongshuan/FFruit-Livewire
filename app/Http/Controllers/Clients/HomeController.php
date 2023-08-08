<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
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

    public function shop()
    {
        return view('client.pages.shop');
    }

    public function checkout()
    {
        return view('client.pages.checkout');
    }

    public function thank()
    {
        return
            view('client.pages.thank');
    }

    public function detailOrder(int $id)
    {
        $order = Order::where('id', $id)->with('customer')->first();
        $details = OrderDetail::where('order_id', $id)->with('products')->get();
        return view('client.pages.detailorder', compact('order', 'details'));
    }
}
