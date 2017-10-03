<?php namespace App\Http\Middleware;

class LoginVerification {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, \Closure $next)
    {
        if (empty(session('activeUser'))) {
            return redirect('/login');
        } else {
            return $next($request);
        }
    }
}