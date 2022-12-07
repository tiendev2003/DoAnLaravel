<?php

namespace App\Http\Middleware;

use App\Models\UserVaitro;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {

            return redirect('login');
        }
        $item = Auth::user()->id;
        $usertype = UserVaitro::where('user_id', $item)->first();
        $userRoles = $usertype->vaitro_id;
        if ($userRoles != '3') {
            return redirect(route('login'))->with('error', 'You Cannot Acces Here');
        } else {
        }
        return $next($request);
    }
}
