@extends('page_admin.layout.index')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý thiết bị</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeindex')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách thiết bị</li>
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
              <h3 class="card-title">Danh sách thiết bị                
                <div class="navbar-light" style="display: inline;">
                <form class="form-inline ml-3" method="get" action="{{route('devicesearch')}}" style="display: inline;">
                  <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search" name="key">
                  <div class="input-group-append" style="display: inline;">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>  
                </form>
                </div>
                <div style="display: inline;">
                <button type="button" class="btn btn-default-icon btn-sm" style="width: 100px; position: absolute; right: 40px;" title="Thêm thiết bị"><a href="{{route('deviceadd')}}"><center><i class="fa fa-plus-circle"></i></center></a>
                </button>
                </div>
              </h3>
            <!-- /.card-header -->
            </div>
            <div class="card-body" style="overflow-x:auto;">
              <div class="session">
                  @if(count($errors)>0)
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $err)
                        {{$err}}</br>
                      @endforeach
                    </div>
                  @endif

                  @if(Session::has('thongbao'))
                    <center><div class="alert alert-success">
                              {{Session::get('thongbao')}} </br>
                            </div></center>
                  @endif
              </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Details</th>
                  <th>Địa chỉ IP</th>
                  <th>Tên</th>
                  <th>Kiểu</th>
                  <th>Status</th>
                  <th>Khác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($device as $dv)
                <tr>
                  <td style="width: 75px;"><a href="{{route('deviceinformation',[$dv->deviceId,'0'])}}" class="nav-link active"><i class="fa fa-info-circle"> Chi tiết</i></a>
                  </td>
                  <td>{{$dv->IP}}</td>
                  <td>{{$dv->sysName}}</td>
                  <td>{{$dv->type}}</td>
                  <td style="width: 50px;">
                    <center title="Thiết bị được quoét"><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i></center>
                  </td>
                  <td style="width: 10%;">
                    <button type="button" class="btn btn-default-icon btn-sm" title="Sửa">
                      <a href="{{route('deviceedit',[$dv->deviceId,'0'])}}" class="nav-link"><i class="fa fal fa-edit"></i></a></button>
                    <button type="button" class="btn btn-default-icon btn-sm" title="Xóa">
                      <a href="{{route('devicedel',[$dv->deviceId,'0'])}}" class="nav-link"><i class="fa fa-trash-o"></i></a></button>
                  </td>
                </tr>
                @endforeach
                @foreach($deviceadmin as $dva)
                <tr>
                  <td style="width: 75px;"><a href="{{route('deviceinformation',[$dva->deviceId,'1'])}}" class="nav-link active"><i class="fa fa-info-circle"> Chi tiết</i></a>
                  </td>
                  <td>{{$dva->IP}}</td>
                  <td>{{$dva->sysName}}</td>
                  <td>{{$dva->type}}</td>
                  <td style="width: 50px;"> 
                    <center  title="Thiết bị được thêm từ Admin"><i class="fa fa-exclamation-triangle" style="color: #ffd428;"></i></center>    
                  </td>
                  <td style="width: 10%;">
                    <button type="button" class="btn btn-default-icon btn-sm" title="Sửa">
                      <a href="{{route('deviceedit',[$dva->deviceId,'1'])}}" class="nav-link"><i class="fa fal fa-edit"></i></a></button>
                    <button type="button" class="btn btn-default-icon btn-sm" title="Xóa">
                      <a href="{{route('devicedel',[$dva->deviceId,'1'])}}" class="nav-link"><i class="fa fa-trash-o"></i></a></button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Details</th>
                    <th>Địa chỉ IP</th>
                    <th>Tên</th>
                    <th>Kiểu</th>
                    <th>Status</th>
                    <th>Khác</th>
                </tfoot>
              </table>
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