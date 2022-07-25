<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class redirectMiddleware
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
        if (auth()->check()){
            $role = Auth::user()->user_type;
            switch ($role){
                case 'seeker':
                    return redirect()->route('user.profile');
                    break;
                case 'employer':
                    return redirect()->route('company.create');
                    break;
                    case 'admin':
                    return redirect()->route('admin.index');
                    break;
            }
        }
        else{
            return redirect()->route('login')->with([
                'message' => 'Please Login',
                'classes' => 'red rounded'
            ]);
        }
        return $next($request);

    }
}
