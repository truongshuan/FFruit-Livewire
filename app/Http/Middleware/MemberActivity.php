<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MemberActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            // $expireTime = Carbon::now()->addMinutes(2); //
            // Cache::put('online' . Auth::guard('admin')->user()->id, true, $expireTime);
            // Admin log lastseen at
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['lastseen_at' => now()]);
        }
        return $next($request);
    }
}
