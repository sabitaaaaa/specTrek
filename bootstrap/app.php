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
<<<<<<< HEAD
    ->withMiddleware(function (Middleware $middleware) {
=======

    ->withMiddleware(function (Middleware $middleware): void {
>>>>>>> origin/merged-anushree
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {


<<<<<<< HEAD
   
=======
>>>>>>> origin/merged-anushree
        //

     //
        //
    })->create();
