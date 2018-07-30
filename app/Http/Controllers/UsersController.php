<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;
use DB;

class UsersController extends Controller
{
	
	public function getUser_List()
	{
	    $users = Users::all();
		return View('page_admin.users.user_list', ['users'=>$users]);
	}

    public function getUser_Add(){
        return view('page_admin.users.user_add');
    }

    public function postUser_Add(Request $request){
	    $this->validate($request, [
            'AccountID' => 'required|min:3',
            'Password' => 'required|min:8:max:32',
            'PasswordAgain' => 'required|same:Password',
            'Description' => 'required',
            'Organization_Unit' => 'required'
        ],[
            'AccountID.required' => "Bạn chưa nhập tên tài khoản",
            'AccountID.min' => "Tên tài khoản phải có độ dài tối thiểu 3 ký tự",
            'Password.required' => "Bạn chưa nhập mật khẩu",
            'Password.min' => 'Mật khẩu phải có độ dài tối thiểu 8 ký tự',
            'Password.max' => 'Mật khẩu chỉ có độ dài tối đa 32 ký tự',
            'PasswordAgain.same' => 'Mật khẩu xác nhận không khớp'
        ]);

	    $user = new Users();
	    $user->AccountID = $request->AccountID;
	    $user->Password = bcrypt($request->Password);
	    $user->Description = $request->Description;
	    $user->FullName = $request->FullName;
	    $user->Email = $request->Email;
	    $user->Telephone = $request->Telephone;
        $user->Status = $request->Status;
        static $temp= "";

        if($request->checkboxWifi == "on")
        {
           $temp .= "1";  // Permission Wifi
        }
        else
        {
            $temp .= "0";
        }

        if($request->checkboxEmail == "on")
        {
            $temp .= "1";  // Permission Wifi
        }
        else
        {
            $temp .= "0";
        }

        if($request->checkboxPC == "on")
        {
            $temp .= "1";  // Permission Wifi
        }
        else
        {
            $temp .= "0";  // Permission Wifi
        }
        $user->Permission = $temp;
        $user->Organization_Unit = $request->Organization_Unit;
        $user->Created_by_SysAdmin = "tungbt";
        $user->save();

        return redirect('page_admin/users/user_add')->with('thongbao', 'Thêm thành công');
    }

    public function getUser_Edit($AccountID)
    {
        $users = DB::table('users')->where('AccountID', $AccountID)->first();
        return view('page_admin.users.user_edit', ['users' => $users]);
    }

    public function postUser_Edit(Request $request, $AccountID)
    {
        $this->validate($request, [
            'AccountID' => 'required|min:3',
        ],[
            'AccountID.required' => "Bạn chưa nhập tên tài khoản",
            'AccountID.min' => "Tên tài khoản phải có độ dài tối thiểu 3 ký tự",
        ]);

        $user = Users::find($AccountID);

        if($request->changePassword == "on")
        {
            $this->validate($request, [
                'Password' => 'required|min:8:max:32',
                'PasswordAgain' => 'required|same:Password',
            ],[
                'Password.required' => "Bạn chưa nhập mật khẩu",
                'Password.min' => 'Mật khẩu phải có độ dài tối thiểu 8 ký tự',
                'Password.max' => 'Mật khẩu chỉ có độ dài tối đa 32 ký tự',
                'PasswordAgain.same' => 'Mật khẩu xác nhận không khớp'
            ]);
            $user->Password = bcrypt($request->Password);
        }

        $user->Description = $request->Description;
        $user->FullName = $request->FullName;
        $user->Email = $request->Email;
        $user->Telephone = $request->Telephone;
        $user->Status = $request->Status;

        static $temp= "";

        if($request->checkboxWifi == "on")
        {
            $temp .= "1";  // Permission Wifi
        }
        else
        {
            $temp .= "0";
        }

        if($request->checkboxEmail == "on")
        {
            $temp .= "1";  // Permission Wifi
        }
        else
        {
            $temp .= "0";
        }

        if($request->checkboxPC == "on")
        {
            $temp .= "1";  // Permission Wifi
        }
        else
        {
            $temp .= "0";  // Permission Wifi
        }
        $user->Permission = $temp;
        $user->Organization_Unit = $request->Organization_Unit;
        $user->save();

        return redirect('page_admin/users/user_edit'.$AccountID)->with('thongbao', 'Bạn đã sửa thành công');
    }
}

