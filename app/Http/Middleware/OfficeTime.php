<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class OfficeTime
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
      //dd(Carbon::now());
        if (Carbon::now()->hour > 19) {
          session()->flash('message','No está permitido editar a esta hora >:| ');
          return back();
        }
        return $next($request);
    }
}
