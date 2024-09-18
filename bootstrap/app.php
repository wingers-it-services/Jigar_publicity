<?php

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            Route::middleware('web')->prefix('admin')->group(base_path('routes/admin.php'));

            Route::middleware('web')->group(base_path('routes/web.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['auth.users' => UserMiddleware::class]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['auth.admin' => IsAdmin::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions
            ->report(function (ErrorException $e) {
                Log::error('[app.php][withExceptions] message  : ' . $e->getMessage() . '\n\n' . $e);

                return redirect('/')->send();
            })
            ->stop();

        $exceptions->report(function (ErrorException $e) {
            return false;
        });
    })
    ->create();
