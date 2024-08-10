<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCorrectColor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $color = $request->route('slug');
        $hex_color = '#'.$color;

        if( preg_match('/^#[a-f0-9]{6}$/i', $hex_color) ){
            return $next($request);
        } else {
            return redirect("/color/$color")->with('error', 'Invalid color');
        }

        
    }
}
