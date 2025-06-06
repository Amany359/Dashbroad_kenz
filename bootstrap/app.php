<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // تسجيل جميع الميدلوير هنا
        $middleware->append([
            \App\Http\Middleware\CheckUserStatus::class,
          //  \App\Http\Middleware\AdminMiddleware::class,
          // \App\Http\Middleware\ApprovedMiddleware::class,
           // \App\Http\Middleware\CheckUserRole::class,
         
         ]);
         
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();