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
            'AccountID'          => 'required|unique:users,AccountID|max:16',
            'Password'           => ['required','min:8', 'max:32',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#*]).+$/'],
            'PasswordAgain'      => 'required|same:Password',
        ],[
            'AccountID.required' => "Bạn chưa nhập tên tài khoản",
            'AccountID.unique'   => 'Tài khoản này đã tồn tại',
            'AccountID.max'      => 'Tên tài khoản không quá 16 ký tự',
            'Password.required'  => "Bạn chưa nhập mật khẩu",
            'Password.min'       => 'Mật khẩu phải có độ dài tối thiểu 8 ký tự',
            'Password.max'       => 'Mật khẩu không vượt quá 32 ký tự',
            'Password.regex'     => 'Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường, một chữ số và một ký tự đặc biệt',
            'PasswordAgain.same' => 'Mật khẩu xác nhận không trùng'
        ]);
        // (?=.*[a-z]) --> Ensure string has one lowercase letter.
        // (?=.*[A-Z]) --> Ensure string has one uppercase letter.
        // (?=.*[0-9]) --> Ensure string has one digital letter.
        // (?=.*[@#*]) --> Ensure string has one special case letter

        // Save information to database
        $users = new Users();
        $users->AccountID = $request->AccountID;
        $users->Password = bcrypt($request->Password);
        $users->Description = $request->Description;
        $users->FullName = $request->FullName;
        $users->Email = $request->Email;
        $users->Telephone = $request->Telephone;
        $users->Status = $request->Status;

        // Get string permission
        static $temp= "";
        if($request->checkboxWifi == "on")
            $temp .= "1";    // Permission Wifi
        else
            $temp .= "0";

        if($request->checkboxEmail == "on")
            $temp .= "1";   // Permission Email
        else
            $temp .= "0";

        if($request->checkboxPC == "on")
            $temp .= "1";   // Permission PC
        else
            $temp .= "0";
        $users->Permission = $temp;

        $users->Organization_Unit = $request->Organization_Unit;
        $users->Position = $request->Position;
        $users->Created_by_SysAdmin = $request->Created_by_SysAdmin;
        $users->save();

        return redirect('page_admin/users/user_add')->with('Notification', 'Thêm tài khoản người dùng thành công');
    }

    public function getUser_Edit($AccountID)
    {
        $users = DB::table('users')->where('AccountID', $AccountID)->first();
        return view('page_admin.users.user_edit', ['users' => $users]);
    }

    public function postUser_Edit(Request $request, $AccountID)
    {
        if($request->ChangePassword == "on")
        {
            $this->validate($request, [
                'Password'           => ['required','min:8', 'max:32',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#*]).+$/'],
                'PasswordAgain'      =>  'required|same:Password',
            ],[
                'Password.required'  => 'Bạn chưa nhập mật khẩu',
                'Password.min'       => 'Mật khẩu phải có độ dài tối thiểu 8 ký tự',
                'Password.max'       => 'Mật khẩu không vượt quá 32 ký tự',
                'Password.regex'     => 'Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường, một chữ số và một ký tự đặc biệt',
                'PasswordAgain.same' => 'Mật khẩu xác nhận không trùng'
            ]);
        }

        static $temp= "";
        if($request->checkboxWifi == "on")
            $temp .= "1";    // Permission Wifi
        else
            $temp .= "0";

        if($request->checkboxEmail == "on")
            $temp .= "1";   // Permission Email
        else
            $temp .= "0";

        if($request->checkboxPC == "on")
            $temp .= "1";   // Permission PC
        else
            $temp .= "0";

        // Save change information to database

        $users = DB::table('users')->where('AccountID', $AccountID)
            ->update(['Password'=>bcrypt($request->Password), 'Description'=>$request->Description,
                'FullName'=>$request->FullName, 'Email'=>$request->Email,
                'Telephone'=>$request->Telephone, 'Status'=>$request->Status, 'Permission'=>$temp,
                'Organization_Unit'=>$request->Organization_Unit, 'Position'=>$request->Position]);
        return redirect('page_admin/users/user_edit/'.$AccountID)
            ->with('Notification', 'Bạn đã sửa tài khoản thành công');
    }

    public function getUser_Delete($AccountID)
    {
        $users = DB::table('users')->where('AccountID', $AccountID)->delete();
        return redirect('page_admin/users/user_list')->with('Notification', 'Bạn đã xóa tài khoản thành công');
    }
}

// Link check regex online: https://regexr.com/