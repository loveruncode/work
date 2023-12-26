<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate;

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

            if ($user->role === 'admin') {
                $request->merge(['user' => $user->name]);
                return $next($request);
            } elseif ($user->role === 'employee') {
                $allowedRoutes = ['views', 'viewsAccount', 'logout'];

                if (in_array($request->route()->getName(), $allowedRoutes)) {
                    $request->merge(['user' => $user->name]);
                    return $next($request);
                } else {
                    return redirect()->route('views')->with('error', 'Bạn không có quyền truy cập.');
                }
            }
        }

        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập!');
    }
}
