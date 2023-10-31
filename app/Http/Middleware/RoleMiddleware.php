<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
  public function handle($request, Closure $next, $role)
  {
    $user = auth()->user();
    if (auth()->check() && !auth()->user()->hasRole($role)) {
      Log::error("Unauthorized");
      abort(403, 'Unauthorized action.');
    }

    return $next($request);
  }
}
