<?php

namespace App\Http\Middleware;

use Closure;

class dangnhapMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		session_start();
		if (isset($_SESSION['tendn1'])) {
			//dd($_SESSION['tendn1']);
			return $next($request);
		} else {
			return redirect('dangnhap');
		}

	}
}
