<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $orders = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $postCounts = Post::select('topic_id', DB::raw('COUNT(*) as count'))
            ->groupBy('topic_id')
            ->get();

        $revenueByDate = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_price) as revenue'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        $productCounts = Product::select('category_id', DB::raw('COUNT(*) as count'))
            ->groupBy('category_id')
            ->get();

        return view('admin.pages.chart', compact('orders', 'postCounts', 'revenueByDate', 'productCounts'));
    }
}
