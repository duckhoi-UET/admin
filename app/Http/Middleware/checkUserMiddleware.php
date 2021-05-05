<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\post;
use Closure;

class checkUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $owner_id = post::find($request->route('id'))->idOwner;
        if(Auth::user()->id == $owner_id)
        {
            return $next($request);
        }
        else return redirect('index');
    }
}
