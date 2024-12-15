<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');  // Redirect to login if the user is not authenticated
        }

        return $next($request);  // Proceed to the next request
    }
}
