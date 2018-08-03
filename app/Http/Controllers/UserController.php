<?php
namespace App\Http\Controllers;
use App\authorization;
use App\device;
use App\device_admin;
use App\function_admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\mysqli_fetch_array;
use App\sysadmin;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	/*  private $user;
		        public function __construct(User $user){
		            $this->user = $user;
		        }
	*/
	public function getAddAccount() {
		$account = sysadmin::all();
		$function = function_admin::all();
		$author = authorization::all();
		return view('page_admin.sysadmin.addAccount', ['account' => $account, 'function' => $function, 'author' => $author]);
	}

	public function postAddAccount(Request $request) {
		$this->validate($request, [
			'fullname' => 'required',
			'email' => 'required',
			'username' => 'required',
			'password' => 'required',
			'passwordAgain' => 'required|same:password|min:4',

		], [
			'fullname.required' => 'ban chua nhap ho ten',
			'email.required' => 'bạn chưa nhập email',
			'username.required' => 'bạn chưa nhập password',
			'password.required' => 'bạn chưa nhập password',
			'password.min' => 'nhập khẩu quá ngắn',
			'passwordAgain.required' => 'bạn chưa nhập lại password',
			'passwordAgain.same' => 'mật khẩu không khớp',
		]);

		$admin = new sysadmin;
		$admin->fullname = $request->fullname;
		$admin->mail = $request->email;
		$admin->adminId = $request->username;
		$admin->password = $request->password;

		$admin->save();

		$conn = mysqli_connect('localhost', 'root', '', 'database_bkcs3');
		mysqli_set_charset($conn, 'UTF8');
		$user = "";

//Lấy giá trị POST từ form vừa submit

		if (isset($_POST["username"])) {
			$user = $_POST["username"];
			// dd($user);
			if (isset($_POST['checkbox'])) {
				$checkBox = $_POST['checkbox'];

				$sql = "";
				foreach ($checkBox as $checkbox) {
					$sql .= "INSERT INTO function_admin (adminId,rightId) VALUES ('$user','$checkbox');";
				}

				$sql1 = mysqli_multi_query($conn, $sql);
			}

			mysqli_close($conn);

		}
		return redirect('addAccount')->with('thong bao', 'them tai khoan thanh cong');

	}

	public function getLogin() {

		return view('page_admin.sysadmin.dangnhap');
	}

	public function postLogin(Request $request) {
		$this->validate($request, [
			'tendn' => 'required',
			'password' => 'required|min:3|max:32',
		], [
			'tendn.required' => 'Ban chưa nhập tên đăng nhập',
			'pass.required' => 'Bạn chưa nhập mật khẩu',
			'pass.min' => 'Mật khẩu quá ngắn',
			'pass.max' => 'Mật khẩu quá dài',
		]);
		session_start();
		$_SESSION["tendn1"] = $_POST['tendn'];
		//dd($_SESSION["tendn1"]);
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$u = $p = "";
			if (isset($_POST['tendn'])) {
				$u = $_POST['tendn'];
			}

			if (isset($_POST['password'])) {
				$p = $_POST['password'];
			}

			if ($u && $p) {
				$conn = mysqli_connect("localhost", "root", "", "database_bkcs3") or die("can't connect this database");
				mysqli_select_db($conn, "sysadmin");
				$sql = "select * from sysadmin where adminId='" . $u . "' and password='" . $p . "'";
				$query = mysqli_query($conn, $sql);
				if (mysqli_num_rows($query) == 0) {
					echo "Username or password is not correct, please try again";
				} else {

					return redirect('addAccount');
				}
			}
		}
	}

	public function getLogout() {
		Auth::logout();
		return redirect('dangnhap');
	}

	public function getAccountList() {
		$user = sysadmin::all();
		$author = authorization::all();
		$function = function_admin::all();
		return view('page_admin.sysadmin.accountList', ['user' => $user, 'author' => $author, 'function' => $function]);
	}

	public function getEditAccount($adminId) {

		$account = DB::table('sysadmin')->where('adminId', $adminId)->first();
		//  $account = sysadmin::find($adminId);
		$function = function_admin::all();
		$author = authorization::all();
		return view('page_admin.sysadmin.editAccount', ['account' => $account, 'function' => $function, 'author' => $author]);
	}

	public function postEditAccount(Request $request, $adminId) {
		$this->validate($request, [
			'fullname' => 'required',
			'email' => 'required',
			'username' => 'required',
			'password' => 'required',
			'passwordAgain' => 'required|same:password',

		], [
			'fullname.required' => 'ban chua nhap ho ten',
			'email.required' => 'bạn chưa nhập email',
			'username.required' => 'bạn chưa nhập password',
			'password.required' => 'bạn chưa nhập password',
			'passwordAgain.required' => 'bạn chưa nhập lại password',
			'passwordAgain.same' => 'mật khẩu không khớp',
		]);
		$admin = DB::table('sysadmin')->where('adminId', $adminId)->update(['fullname' => $request->fullname, 'mail' => $request->email, 'adminId' => $request->username, 'password' => $request->password]);
		$conn = mysqli_connect('localhost', 'root', '', 'database_bkcs3');
		mysqli_set_charset($conn, 'UTF8');
		$user = "";

		if (isset($_POST["username"])) {
			$user = $_POST['username'];
			if (isset($_POST['checkbox'])) {
				$checkBox = $_POST['checkbox'];
				$sql = "DELETE FROM function_admin where adminId = '$user'";
				mysqli_query($conn, $sql);
				for ($i = 0; $i < count($checkBox); $i++) {
					$sql = " INSERT INTO function_admin (adminId, rightId ) VALUES ('$user','$checkBox[$i]' )";

					mysqli_query($conn, $sql);
				}
			}
			mysqli_close($conn);
			return redirect('accountList')->with('thong bao', 'them tai khoan thanh cong');

		}
	}

	public function getDeviceList() {
		$devad = device_admin::all();
		$device = device::all();
		return view('page_admin.sysadmin.deviceList', ['devad' => $devad, 'device' => $device]);
	}

	public function getManageDevice() {
		$user = array();
		$adminId = array();
		$device = device::all();
		$conn = mysqli_connect('localhost', 'root', '', 'database_bkcs3');
		mysqli_set_charset($conn, 'UTF8');
		$sql = 'SELECT adminId FROM function_admin Where rightId = "quản lý cấu hình" ';

		$result = mysqli_query($conn, $sql);
		foreach ($result as $res) {
			$i = $res['adminId'];
			$adminId[] = $res['adminId'];
			$sql1 = "SELECT fullname FROM sysadmin where adminId = '$i'";
			//    dd($sql1);
			$result = $conn->query($sql1);
			foreach ($result as $res) {
				$user[] = $res['fullname'];
			}
		}
		//  dd($adminId);
		$conn->close();
		return view('page_admin.sysadmin.manageDevice', ["user" => $user, "device" => $device, "adminId" => $adminId]);
	}

	public function postManageDevice(Request $request) {
		// $i = sysadmin::all();
		$j = device_admin::all();
		// dd($i)

		$conn = mysqli_connect('localhost', 'root', '', 'database_bkcs3');
		mysqli_set_charset($conn, 'UTF8');
		$user = $request->fullname;
		$adminId = "SELECT adminId FROM sysadmin where fullname = '$user'";
		$result = $conn->query($adminId);
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		$sql = "";
		$checkBox = $_POST['checkbox'];
		//dd($row[0]);
		DB::table('device_admin')->where('adminId', $row[0])->delete();
		foreach ($checkBox as $checkbox) {
			$sql = "INSERT INTO device_admin (adminId, deviceId) VALUES ('$row[0]','$checkbox')";
			mysqli_query($conn, $sql);
		}
		$conn->close();
		return redirect('manageDevice');

	}
	public function getLogin1($user) {

		$conn = mysqli_connect('localhost', 'root', '', 'database_bkcs3');
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql = "SELECT * FROM sysadmin WHERE adminId='$user'";
		$result = mysqli_query($conn, $sql);
		// Kiểm tra user_name mình nhập vào có nằm trong mảng đó hay không?
		// User_name thuộc 1 giá trị trong mảng => user_name tồn tại
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				echo "<span class='error'>Tên đăng nhập: <strong>{$user}</strong> đã tồn tại, sorry.!!</span>";
			} else // Ngược lại user_name Ko tồn tại
			{
				echo "<span class='success'>Tên đăng nhập: <strong>{$user}</strong> thành công </span>";
			}
		} else {
			echo "error";
			mysqli_close($conn);
		}
	}

	public function getCheck($fullname) {
		$conn = mysqli_connect('localhost', 'root', '', 'database_bkcs3');
		dd($conn);
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_errno();
		} else {
			//$sql = "SELECT deviceId FROM device_admin where adminId = (SELECT adminId FROM sysadmin WHERE fullname = '$fullname') ";
			$sql1 = "SELECT adminId FROM sysadmin WHERE fullname = '$fullname'";

			dd($sql1);
			$result = mysqli_query($conn, $sql1);
			$adminId = $result->fetch_assoc()['adminId'];
			//dd($result->fetch_assoc()['adminId']);

			$sql2 = "SELECT deviceId FROM device_admin where adminId ='$adminId'";
			$result = mysqli_query($conn, $sql2);
			$i = array();

			while ($deviceId = $result->fetch_assoc()) {
				$i[] = $deviceId['deviceId'];
			};
			dd($i);
			return $i;

		}
	}
}
