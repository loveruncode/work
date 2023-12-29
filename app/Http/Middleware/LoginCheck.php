<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate;
use App\Enums\UserRole;
class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            switch ($user->role) {
                case UserRole::admin:
                    $request->merge(['user' => $user->name]);
                    return $next($request);
                case UserRole::employee:
                    $allowedRoutes = ['views', 'viewsAccount', 'logout', 'dashboard'];
                    if (in_array($request->route()->getName(), $allowedRoutes)) {
                        $request->merge(['user' => $user->name]);
                        return $next($request);
                    } else {
                        return redirect()->route('views')->with('error', 'Bạn không có quyền truy cập.');
                    }
                default:
                    break;
            }
        }
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập!');
    }
}
