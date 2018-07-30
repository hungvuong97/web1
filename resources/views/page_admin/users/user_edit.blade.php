@extends('page_admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý Danh sách người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('userlist')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sửa thông tin người dùng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title"><b>Thông tin người dùng</b>
                            <small>{{$users->AccountID}}</small>
                        </h2>

                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x:auto; width: 100%;">
                            <div class="container-fluid">
                                <div class="row" style="padding-left:100px;">
                                    <!-- /.col-lg-12 -->
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
                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                <div class="form-group">
                                                    <label>
                                                        <i class="fa fa-globe"></i> Tên tài khoản (<label style="color: red;">*</label>)
                                                    </label>
                                                    <input class="form-control" name="AccountID" value="{{$users->AccountID}}" readonly/>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <i class="fa fa-key"></i> Mật khẩu (<label style="color: red">*</label>)
                                                    </label>
                                                    <input class="form-control" type="password" name="Password"
                                                           required="required" placeholder="Nhập mật khẩu cho tài khoản"/>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <i class="fa fa-key"></i> Nhập lại mật khẩu (<label style="color: red">*</label>)
                                                    </label>
                                                    <input type="password" class="form-control" name="PasswordAgain"
                                                           required="required" placeholder="Nhập lại mật khẩu cho tài khoản"/>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        <i class="fa fa-pencil"></i> Mô tả</label><br>
                                                    <textarea class="note form-control" rows="4" cols="20" name="Description"
                                                              value="{{$users->Description}}" class="form-control">
                                                    </textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-pencil"></i> Họ và Tên</label>
                                                    <input class="form-control" name="FullName" placeholder="Nhập Họ và Tên" value="{{$users->FullName}}"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-envelope"></i> Địa chỉ Email</label>
                                                    <input class="form-control" name="Email" placeholder="Nhập địa chỉ Email" value="{{$users->Email}}"/>
                                                </div>

                                                <div class="form-group">
                                                    <label><i class="fa fa-phone"></i> Số điện thoại</label>
                                                    <input class="form-control" name="Telephone" placeholder="Nhập số điện thoại" value="{{$users->Telephone}}"/>
                                                </div>

                                                <!-- Active: 1 or Suspend: 0 -->
                                                <div class="form-group">
                                                    <label>Trạng thái</label><br>
                                                    @if($users->Status ==1)
                                                    <input type="radio" name="Status" value="1" checked="">Hoat Dong
                                                        <input type="radio" name="Status" value="1"> Khong
                                                    @else
                                                        <input type="radio" name="Status" value="1">
                                                    Hoạt động
                                                    <input type="radio" name="Status" value="1" checked=""> Khong
                                                    @endif

                                                </div>

                                                <div class="form-group">
                                                <label>Phân quyền tài khoản</label><br>
                                                <input type="checkbox" name="checkboxWifi"/> Wifi <br>
                                                <input type="checkbox" name="checkboxEmail"/> Email <br>
                                                <input type="checkbox" name="checkboxPC"/> PC
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fa fa-pencil"></i> Đơn vị (<label style="color: red">*</label>)</label><br>
                                        <input class="form-control" name="Organization_Unit" placeholder="Nhập đơn vị công tác" value="{{$users->Organization_Unit}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label><i class="fa fa-user"></i> Tạo bởi SysAdmin</label>
                                        <input class="form-control" name="Created_by_SysAdmin" value="{{$users->Created_by_SysAdmin}}" readonly/>
                                    </div>

                                    <button type="submit" class="btn btn-default">Sửa</button>
                                    <button type="reet" class="btn btn-default">Làm mới</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection