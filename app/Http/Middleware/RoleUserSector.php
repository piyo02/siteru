<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleUserSector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( in_array( auth()->user()->role_id, [ 1,2,3 ] ) ){
            return $next($request);
        }
        return redirect('/admin/dashboard')->with('error', 'Anda tidak memiliki izin akses ke halaman yang dituju (Role Admin, Role User Admin, Role User Sector)!!');
    }
}
