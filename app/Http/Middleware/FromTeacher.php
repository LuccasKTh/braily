<?php

namespace App\Http\Middleware;

use App\Models\Lesson;
use App\Models\Topic;
use App\Traits\ToastNotifications;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FromTeacher
{
    use ToastNotifications;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $model = $this->getModelFromRequest($request);
    
        if ($model && !Auth::user()->teacher->hasAccess($model)) {
            $this->sendToast('success', "Você não pode acessar essa página");
            return to_route('dashboard');
        }
    
        return $next($request);
    }
    
    private function getModelFromRequest(Request $request)
    {
        $model = $request->route('student') ??
               $request->route('note') ??
               $request->route('topic') ??
               $request->route('lesson')->student ??
               optional(Topic::find($request->route('topicCreated')))->student ??
               optional(Lesson::find($request->route('lessonCreated')))->student;

        return $model;
    }
    
}
