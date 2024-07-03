<?php

namespace App\Http\Middleware;

use App\Traits\ToastNotifications;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    use ToastNotifications;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check() || Auth::user()->role->description != $role) {
            $this->sendToast('success', "Você não pode acessar essa página");
            return redirect('dashboard');
        }

        return $next($request);
    }
}
