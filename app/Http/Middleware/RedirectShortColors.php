<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectShortColors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(strlen($request->route('slug')) === 3){
            $color = $request->route('slug');
            $color = str_split($color);
            $color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];

            return redirect("/color/" . $color);
        } else if(strlen($request->route('slug')) != 6){
            return redirect("/404-no-color");
        }

        return $next($request);
        
    }
}
