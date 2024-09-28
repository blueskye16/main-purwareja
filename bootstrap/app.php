<?php

use App\Http\Middleware\role;
use App\Http\Middleware\isAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(isAdmin::class);
        $middleware->alias([
            'admin' => isAdmin::class
        ]);
        // $middleware->alias([
        //     'admin' => role::class
        // ]);
        // $middleware->global([isAdmin::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
