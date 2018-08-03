@extends('page_admin.layout.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Quản lý Tài khoản người dùng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('homeindex')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách người dùng</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Danh sách người dùng
                                <div class="navbar-light" style="display: inline;">
                                    <form class="form-inline ml-3" style="display: inline;">
                                        <input class="form-control form-control-navbar" type="search"
                                               placeholder="Tìm kiếm" aria-label="Search">
                                        <div class="input-group-append" style="display: inline;">
                                            <button class="btn btn-navbar" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div style="display: inline;">
                                    <button class="btn btn-default-icon btn-sm" type="button" style="width: 100px;
                                        position: absolute; right: 40px;" title="Thêm người dùng">
                                        <a href="page_admin/users/user_add">
                                            <center><i class="fa fa-plus-circle"></i></center>
                                        </a>
                                    </button>
                                </div>
                            </h3>
                            <!-- /.card-title -->

                            <div class="card-body">
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr align="center">
                                        <th rowspan="2">Tài khoản</th>
                                        <th rowspan="2">Mô tả</th>
                                        <th rowspan="2">Trang thái</th>
                                        <th colspan="3">Phân quyền</th>
                                        <th rowspan="2">Đơn vị</th>
                                        <th rowspan="2">Tạo bởi SysAdmin</th>
                                        <th rowspan="2">Thời gian cập nhật cuối</th>
                                        <th rowspan="2">Khác</th>
                                    </tr>
                                    <tr>
                                        <th>Wifi</th>
                                        <th>Email</th>
                                        <th>PC</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $u)
                                        <tr align="center">
                                            <td>{{$u->AccountID}}</td>
                                            <td>{{$u->Description}}</td>
                                            <td>
                                                @if($u->Status == 1)
                                                    <center title="Hoạt động"><i class="fa fa-check"></i></center>
                                                @else
                                                    <center title="Không hoạt động">
                                                        <i class="fa fa-times" style="color: red"></i>
                                                    </center>
                                                @endif
                                            </td>
                                            <td>
                                                @if($u->Permission[0] == '1')
                                                    <center title="Hoạt động"><i class="fa fa-check"></i></center>
                                                @endif
                                            </td>
                                            <td>
                                                @if($u->Permission[1] == '1')
                                                    <center title="Hoạt động"><i class="fa fa-check"></i></center>
                                                @endif
                                            </td>
                                            <td>
                                                @if($u->Permission[2] == '1')
                                                    <center title="Hoạt động"><i class="fa fa-check"></i></center>
                                                @endif
                                            </td>
                                            <td>{{$u->Organization_Unit}}</td>
                                            <td>{{$u->Created_by_SysAdmin}}</td>
                                            <td>{{date_format($u->created_at, 'H:i:s d/m/Y')}}</td>
                                            <td>
                                                <button class="btn btn-default-icon btn-sm" type="button" title="Sửa">
                                                    <a href="page_admin/users/user_edit/{{$u->AccountID}}" class="nav-link">
                                                        <i class="fa fal fa-edit"></i>
                                                    </a>
                                                </button>
                                                <button class="btn btn-default-icon btn-sm" type="button" title="Xóa">
                                                    <a href="page_admin/users/user_delete/{{$u->AccountID}}" class="nav-link">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-header -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection