<?php

use App\Http\Middleware\CustomAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {

            $subdomain_mode = env('SUBDOMAIN_MODE', FALSE);

            if ($subdomain_mode) {
                Route::middleware('admin')
                    ->namespace("App\\Http\\Controllers\\Admin")
                    ->domain('admin.' . env('MAIN_DOMAIN'))
                    ->name('admin.')
                    ->group(base_path('routes/admin.php'));
            } else {
                Route::middleware('admin')
                    ->namespace("App\\Http\\Controllers\\Admin")
                    ->prefix('admin')
                    ->name('admin.')
                    ->group(base_path('routes/admin.php'));
            }
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'custom.auth' => CustomAuth::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
