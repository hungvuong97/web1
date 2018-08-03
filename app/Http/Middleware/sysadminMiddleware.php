<?php

namespace App\Http\Middleware;
use App/function_admin;
use Closure;

class sysadminMiddleware
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
        $func = function_admin::all()
        $tendn = $request->cookie('tendn');
        foreach($func as $func)
        if($tendn == $func->adminId && $func->rightId == 'quản lý end-user')
        return $next($request);
        else 
        return redirect('dangnhap');
    }
}
