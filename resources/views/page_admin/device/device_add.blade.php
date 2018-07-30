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
              <li class="breadcrumb-item"><a href="{{route('devicelist')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thêm thiết bị</li>
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
              <h3 class="card-title">Thêm thiết bị</h3>
            <!-- /.card-header -->
            <div class="card-body" style="overflow-x:auto; width: 100%;">
              <div class="container-fluid">
                    <div class="row" style="padding-left:100px;">
                                            <!-- /.col-lg-12 -->
                        <div class="col-lg-7" style="padding-bottom:120px;padding-top:30px">
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

                            <form>
                            <input  onclick="disableForm()" type="radio" name="input" value="male" > Tạo mới nhiều thiết bị 
                            <input style="margin-left: 50px;" type="file" name="File" value="female" disabled="">
                            <br>
                            <input onclick="enableForm()" type="radio" name="input" value="female" checked> Tạo mới thiết bị
                            </form><hr>

                            <form action="{{route('deviceadd')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">    
                                <div class="form-group">
                                    <label><i class="fa fa-globe"></i> Tên thiết bị (<label style="color: red;">*</label>)</label>
                                    <input class="form-control" name="Name" value="" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-neuter"></i> Địa chỉ IP (<label style="color: red;">*</label>)</label><br>
                                    <input style="width: 15%;" type="number" class="form-control" name="IP1" value="" required="required" maxlength="3" max="255" min="0"/>.
                                    <input style="width: 15%;" type="number" class="form-control" name="IP2" value="" required="required" maxlength="3" max="255" min="0"/>.
                                    <input style="width: 15%;" type="number" class="form-control" name="IP3" value="" required="required" maxlength="3" max="255" min="0"/>.
                                    <input style="width: 15%;" type="number" class="form-control" name="IP4" value="" required="required" maxlength="3" max="255" min="0"/>
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-pencil"></i> Mô tả</label><br>
                                    <textarea class="note form-control" rows="4" cols="20"  name="Description" value="" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input class="form-control" name="Contact" value="" />
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <input class="form-control" name="Type" value="" />
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input class="form-control" name="Location" value="" />
                                </div>
                                <div class="form-group">
                                    <label>Services</label>
                                    <input class="form-control" name="Services" value="" />
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-info"></i> Ghi chú</label><br>
                                    <textarea class="note form-control" rows="4" cols="20"  name="Note" value=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Community</label>
                                    <input class="form-control" name="Community" value="" />
                                </div>
                                <button type="submit" class="btn btn-default">Thêm</button>
                                <button type="reset" class="btn btn-default">Hoàn tác</button>
                            <form>
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