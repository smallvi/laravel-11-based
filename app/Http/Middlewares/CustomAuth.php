<?php

namespace App\Http\Middlewares;

use Closure;
use App\Models\User;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth extends Middleware
{
    public function handle(Request $request, Closure $next, $type = null): Response
    {

        if (is_null($type)) {
            return abort(403, 'Nullable User Type');
        }

        if (!Auth::check() || Auth::user()->type != $type) {
            if (Route::has($type . '.login')) {
                return redirect(route($type . '.login'));
            } else {
                return abort(403, 'Invalid User Type');
            }
        }

        return $next($request);
    }
}
