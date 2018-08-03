<?php

namespace App\Http\Middleware;
use App\function_admin;
use Closure;

class endUser {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$username = function_admin::where('rightId', 'quản lý end-user')->first();
		//dd($username);

		// dd($username['adminId']);

		// dd($_SESSION['tendn1']);

		$username = function_admin::where('rightId', 'quản lý end-user')->where('adminId', $_SESSION['tendn1']);
		if ($username->count()) {
			return $next($request);
		}

		// if ($username['adminId'] == $_SESSION['tendn1']) {
		// 	//dd($_SESSION['tendn1']);
		// 	return $next($request);
		else {
			return redirect('page_admin/users/user_list')->with('Notification', 'bạn không có quyền truy cập');
		}

		if (!isset($_SESSION)) {
			session_start();
		} else {
			return redirect('page_admin/users/user_list')->with('Notification', 'bạn không có quyền truy cập');
		}

	}
}
