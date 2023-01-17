<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,string $role)
    {
       /* foreach ($request->user()->roles as $userRole) {
            $userRole=$userRole;
         }
         if ($userRole->title ===$role) { return $next($request); } 
          else {
             abort(403);
            }*/  // Or use the following code:
            
          if ( $request->user()->roles->first()->title ===$role){
                return $next($request);
            } else {
             abort(403);
            }
            
       
    }
}
