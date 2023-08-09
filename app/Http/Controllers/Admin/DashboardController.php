<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $currentDate = Carbon::now()->format('Y-m-d');

        $orderCount = DB::table('orders')
            ->whereDate('created_at', $currentDate)
            ->count();

        $revenueByMonth = DB::table('orders')
            ->select(DB::raw('DATE_FORMAT(created_at, "%m") as month'), DB::raw('SUM(total_price) as revenue'))
            ->groupBy('month')
            ->get();

        $employeeCount = DB::table('admins')->select(DB::raw('COUNT(*) as count'))->value('count');
        $employees = DB::table('admins')->get(['name', 'lastseen_at']);

        $productCounts = Product::select('category_id', DB::raw('COUNT(*) as count'))
            ->groupBy('category_id')
            ->get();

        return view('admin.pages.index', compact('posts', 'orderCount', 'revenueByMonth', 'employeeCount', 'employees', 'productCounts'));
    }
}
