<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->admin == 1) {
            return $next($request);
        }

        return redirect('/login'); // Ou outra rota ou resposta de erro
    }
}
