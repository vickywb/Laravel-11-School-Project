<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //Middleware Role Spatie
        $middleware->alias([
           'role' => RoleMiddleware::class,
           'permission' => PermissionMiddleware::class,
           'role_or_permission' => RoleOrPermissionMiddleware::class,
        ]);

        //Middleware guests and users
        $middleware->redirectTo(
            guests: '/',
            users: '/admin'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
