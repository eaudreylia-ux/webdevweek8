<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\UserRoleMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Routing;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->redirectUsersTo(fn (Request $request) => route('home'));
        $middleware->redirectUsersTo (fn (Request $request) => route('login.show'));
        $middleware->alias([
            'role' => UserRoleMiddleware::class,
        ]);
            
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
