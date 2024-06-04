<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->is_admin==1){
            return redirect()->route('admin.dashboard');
        }
        if (auth()->user()?->is_verified == 1) {
            if(auth()->user()?->hasFilledProfile()) {
                return $next($request); // Cho phép truy cập nếu đã xác minh và điền thông tin
                }
            else {
                return redirect()->route('user.updateInformation'); // Chuyển hướng đến trang profile của Breeze
            }
        }
        abort(403, 'Tài khoản của bạn chưa được xác minh.'); // Hoặc chuyển hướng đến trang khác
    }
}
