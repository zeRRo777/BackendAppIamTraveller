<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        // Установка заголовков для CORS
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, X-Token-Auth, Authorization");

        // Далее выполните следующий middleware в цепочке
        return $next($request);
    }
}
