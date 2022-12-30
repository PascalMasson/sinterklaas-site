<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('loggedInUser') && (url(route('login')) == $request->url())) {
            $user = \Illuminate\Support\Facades\Session::get('loggedInUser');

            return redirect(route('lijst', $user->id));
        }
        return $next($request);
    }
}
