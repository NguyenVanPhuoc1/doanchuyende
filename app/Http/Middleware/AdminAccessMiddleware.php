<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra đường dẫn và quyết định chặn hoặc cho phép truy cập
        if ($request->is('admin/*')) {
            // Kiểm tra xác thực người dùng admin ở đây, ví dụ:
            if (!auth()->check() || !auth()->user()->isAdmin()) {
                return redirect('/login'); // Hoặc chuyển hướng đến trang khác
            }
        }
        return $next($request);
    }
}
