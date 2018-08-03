<?php
namespace App\Http\Middleware;
use Closure;
use DB;

class quanly {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		$device = $request->route()->parameters();

		$dev = DB::table('device_admin')->where('adminId', $_SESSION['tendn1'])->where('deviceId', $device['id']);
		//dd($i);
		if ($dev->count()) {
			return $next($request);
		} else {
			return redirect('device-list')->with('thong bao', 'bạn không có quyền truy cập');
		}

		if (!isset($_SESSION)) {
			session_start();
		} else {

			return redirect('device-list')->with('thong bao', 'bạn không có quyền truy cập');
		}

	}
}
