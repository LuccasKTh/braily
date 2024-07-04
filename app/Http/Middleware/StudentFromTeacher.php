<?php

namespace App\Http\Middleware;

use App\Traits\ToastNotifications;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentFromTeacher
{
    use ToastNotifications;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $student = $request->route('student');

        if ($student && Auth::user()->role->description == 'Professor' && !Auth::user()->teacher->is($student->teacher)) {
            $this->sendToast('success', "Você não pode acessar essa página");
            return redirect()->route('student.index');
        }

        return $next($request);
    }
}
