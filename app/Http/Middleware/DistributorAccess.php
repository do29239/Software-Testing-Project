<?php

// app/Http/Middleware/DistributorAccess.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistributorAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  \Closure
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role == 3) {
            // If the user is a distributor, allow access only to distributor-specific routes
            return redirect()->back();
        }

        return $next($request);
    }
}

