<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Models\Role;

class HasRoleMiddleware
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
        if(auth()->check()){
            // ambil semua role
            $roles = Role::get();

            // cek apakah user yang login mempunyai akses role ke halaman yang dituju
            if($request->user()->hasAnyRole($roles)){
                return $next($request);
            }else{
                abort(403);
            }
        }else{
            abort(404);
        }
    }
}
