@extends('page_admin.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1>Quản lý Tài khoản người dùng</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('homeindex')}}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sửa thông tin người dùng</li>
                        </ol>
                    </div>
                    <!-- /.col-sm-6 -->
                </div>
                <!-- /.row mb-2 -->
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Thông tin tài khoản - <b>{{$users->AccountID}}</b></h2>
                            <div class="card-body" style="overflow-x:auto; width: 100%;">
                                <div class="container-fluid">
                                    <div class="row" style="padding-left:100px;">
                                        <div class="col-lg-7" style="padding-bottom:120px;padding-top:30px">
                                            <div class="session">
                                                <!-- Print Error Code -->
                                                @if(count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        @foreach($errors->all() as $err)
                                                            {{$err}}<br>
                                                        @endforeach
                                                    </div>
                                                @endif

                                            <!-- Print Successful Notification -->
                                                @if(session('Notification'))
                                                    <center>
                                                        <div class="alert alert-success">{{session('Notification')}}</div>
                                                    </center>
                                                @endif
                                            </div>

                                            <form action="page_admin/users/user_edit/{{$users->AccountID}}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                    <label>
                                                        <i class="fa fa-globe"></i>&ensp;Tên tài khoản (<label style="color: red;">*</label>)
                                                    </label>
                                                    <input class="form-control" name="AccountID" value="{{$users->AccountID}}" readonly/>
                                                </div>

                                                <div class="form-group">
                                                    <input type="checkbox" name="ChangePassword" id="ChangePassword"
                                                           title="Tích vào checkbox để đổi mật khẩu">&ensp;Đổi mật khẩu<br>
                                                    <label>
                                                        <i class="fa fa-key"></i>&ensp;Mật khẩu (<label style="color: red">*</label>)
                                                    </label>
                                                    <input class="form-control password" type="password" name="Password" id="Password"
                                                           title="Nhập mật khẩu cho tài khoản" placeholder="********" required="" disabled=""/>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <i class="fa fa-key"></i>&ensp;Nhập lại mật khẩu (<label style="color: red">*</label>)
                                                    </label>
                                                    <input type="password" class="form-control password" name="PasswordAgain"
                                                           title="Nhập lại mật khẩu cho tài khoản" placeholder="********" required="" disabled=""/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Mô tả</label><br>
                                                    <textarea class="note form-control" rows="4" cols="20" name="Description"
                                                              value="{{$users->Description}}" title="Nhập vào mô tả về tài khoản">
                                                </textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Họ và Tên</label>
                                                    <input class="form-control" name="FullName" placeholder="Nhập Họ và Tên"
                                                           value="{{$users->FullName}}" title="Nhập vào Họ và Tên"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-envelope"></i>&ensp;Địa chỉ Email</label>
                                                    <input class="form-control" name="Email" placeholder="Nhập địa chỉ Email"
                                                           value="{{$users->Email}}" title="Nhập vào địa chỉ email"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-phone"></i>&ensp;Số điện thoại</label>
                                                    <input class="form-control" name="Telephone" placeholder="Nhập số điện thoại"
                                                           value="{{$users->Telephone}}" title="Nhập vào số điện thoại"/>
                                                </div>

                                                <!-- Active: 1 or Suspend: 0 -->
                                                <div class="form-group">
                                                    <label>Trạng thái</label><br>
                                                    @if($users->Status == 1)
                                                        <input type="radio" name="Status" value="1" checked="checked">&ensp;Hoạt động <br>
                                                        <input type="radio" name="Status" value="0">&ensp;Không hoạt động
                                                    @else
                                                        <input type="radio" name="Status" value="1">&ensp;Hoạt động <br>
                                                        <input type="radio" name="Status" value="0" checked="checked">&ensp;Không hoạt động
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label>Phân quyền tài khoản</label><br>
                                                    @if($users->Permission[0] == 1)
                                                        <input type="checkbox" name="checkboxWifi" checked="checked"/>&ensp;Wifi <br>
                                                    @else
                                                        <input type="checkbox" name="checkboxWifi"/>&ensp;Wifi <br>
                                                    @endif

                                                    @if($users->Permission[1] == 1)
                                                        <input type="checkbox" name="checkboxEmail" checked="checked"/>&ensp;Email <br>
                                                    @else
                                                        <input type="checkbox" name="checkboxEmail"/>&ensp;Email <br>
                                                    @endif

                                                    @if($users->Permission[2] == 1)
                                                        <input type="checkbox" name="checkboxPC" checked="checked"/>&ensp;PC
                                                    @else
                                                        <input type="checkbox" name="checkboxPC"/>&ensp;PC
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Đơn vị</label><br>
                                                    <input class="form-control" name="Organization_Unit" title="Nhập dơn vị công tác"
                                                           placeholder="Nhập đơn vị công tác" value="{{$users->Organization_Unit}}"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Vị trí công tác</label><br>
                                                    <input class="form-control" name="Position" title="Nhập vị trí công tác"
                                                           placeholder="Nhập vị trí công tác" value="{{$users->Position}}"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-user"></i>&ensp;Tạo bởi SysAdmin</label>
                                                    <input class="form-control" name="Created_by_SysAdmin"
                                                           value="{{$users->Created_by_SysAdmin}}" readonly/>
                                                </div>

                                                <button class="btn btn-default" type="submit"> Sửa</button>
                                                <button class="btn btn-default" type="reset"> Làm mới</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-header -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Check if checkbox 'changePassword' click -> unlock filed password
            $("#ChangePassword").change(function () {
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr("disabled");
                }
                else
                {
                    $(".password").attr('disabled', '');
                }
            });

            // Check strength password
            $('#Password').passtrength({
                minChars: 8,
                passwordToggle: true,
                tooltip: true,
                textWeak: "Weak",
                textMedium: "Medium",
                textStrong: "Strong",
                textVeryStrong: "Very Strong",
                eyeImg : "admin_asset_web/dist/img/eye.svg"
            });
        });
    </script>
@endsection