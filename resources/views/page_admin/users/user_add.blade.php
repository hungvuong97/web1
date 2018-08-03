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
                            <li class="breadcrumb-item"><a href="{{route('homeindex')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm người dùng</li>
                        </ol>
                    </div>
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
                            <h3 class="card-title">Thêm tài khoản người dùng</h3>
                            <div class="card-body" style="overflow-x:auto; width: 100%;">
                                <div class="container-fluid">
                                    <div class="row" style="padding-left:100px;">
                                        <div class="col-lg-10" style="padding-bottom:120px;padding-top:30px">
                                            <div class="session">
                                                @if(count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        @foreach($errors->all() as $err)
                                                            {{$err}}<br>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                @if(session('Notification'))
                                                    <center><div class="alert alert-success">{{session('Notification')}}</div></center>
                                                @endif
                                            </div>

                                            <form>
                                                <input onclick="disableForm()" type="radio" name="input" value="male">&ensp;Tạo mới nhiều người dùng
                                                <input type="file" name="File" value="female" disabled="" style="margin-left: 50px;">
                                                <button type="submit" class="btn" name="File" style="margin-left: 50px;">Thêm</button>
                                                <br>
                                                <input onclick="enableForm()" type="radio" name="input" value="female" checked="checked">&ensp;Tạo mới người dùng
                                            </form><hr>

                                            <form action="page_admin/users/user_add" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                <div class="form-group">
                                                    <label><i class="fa fa-globe &ensp"></i>&ensp;Tên tài khoản (<label style="color: red;">*</label>)</label>
                                                    <input class="form-control Disable" name="AccountID" required="" placeholder="Nhập tên tài khoản"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-key"></i>&ensp;Mật khẩu (<label style="color: red">*</label>)</label>
                                                    <input class="form-control password Disable" type="password" name="Password" id="Password"
                                                           title="Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa và một số"
                                                           required="required" placeholder="Nhập mật khẩu cho tài khoản"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-key"></i>&ensp;Nhập lại mật khẩu (<label style="color: red">*</label>)</label>
                                                    <input class="form-control Disable" type="password" name="PasswordAgain"
                                                           required="required" placeholder="Nhập lại mật khẩu cho tài khoản"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Mô tả</label><br>
                                                    <textarea class="note form-control Disable" rows="4" cols="20"  name="Description"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Họ và Tên</label>
                                                    <input class="form-control Disable" name="FullName" placeholder="Nhập Họ và Tên của tài khoản"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-envelope"></i>&ensp;Địa chỉ Email</label>
                                                    <input class="form-control Disable" name="Email" placeholder="Nhập địa chỉ Email"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-phone"></i>&ensp;Số điện thoại</label>
                                                    <input class="form-control Disable" name="Telephone" placeholder="Nhập số điện thoại"/>
                                                </div>

                                                <!-- Active: 1 or Suspend: 0 -->
                                                <div class="form-group">
                                                    <label>Trạng thái</label><br>
                                                    <input type="radio" name="Status" value="1" checked="checked" class="Disable">&ensp;Hoạt động <br>
                                                    <input type="radio" name="Status" value="0" class="Disable">&ensp;Không hoạt động
                                                </div>

                                                <div class="form-group">
                                                    <label>Phân quyền tài khoản</label><br>
                                                    <input type="checkbox" name="checkboxWifi" class="Disable"/>&ensp;Wifi <br>
                                                    <input type="checkbox" name="checkboxEmail" class="Disable"/>&ensp;Email <br>
                                                    <input type="checkbox" name="checkboxPC" class="Disable"/>&ensp;PC
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Đơn vị</label><br>
                                                    <input class="form-control Disable" name="Organization_Unit" placeholder="Nhập đơn vị công tác"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i>&ensp;Vị trí công tác</label><br>
                                                    <input class="form-control Disable" name="Position" placeholder="Nhập vị trí công tác"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-user"></i>&ensp;Tạo bởi SysAdmin</label>
                                                    <input class="form-control Disable" name="Created_by_SysAdmin" value="tungbt" readonly/>
                                                </div>

                                                <button type="submit" class="btn btn-default Disable">Thêm</button>
                                                <button type="reset" class="btn btn-default Disable">Làm mới</button>
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
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

<!-- Reference: https://github.com/adri-sorribas/passtrength -->
