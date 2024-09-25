<?php

namespace App\Providers;

use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonWordController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TopicWordController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/student';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::macro('teacherAndAdminRoutes', function () {
            Route::resource('/student', StudentController::class);
            Route::resource('/note', NoteController::class);
            Route::resource('/topic', TopicController::class);
            Route::resource('/topicCreated', TopicWordController::class);
            Route::resource('/lesson', LessonController::class);
            Route::resource('/lessonCreated', LessonWordController::class);
        });
    }
}
