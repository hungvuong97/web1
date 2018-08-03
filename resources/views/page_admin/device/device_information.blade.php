@extends('page_admin.layout.index')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Thông tin chi tiết</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeindex')}}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thông tin thiết bị</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fa fa-info"></i> Note:</h5>
              {{$device->note}}
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-globe"></i> Tên Thiết Bị: {{$device->sysName}}
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              
              <div class="row invoice-info">
                
                <div class="col-sm-4 invoice-col">
                  <i class="fa fa-pencil"></i>
                  <strong>Mô tả</strong>
                  <address>
                    {{$device->sysDescr}}
                  </address>
                  <hr>
                  <div class="col-sm-4 invoice-col">
                      <i class="fa fa-neuter"></i>
                      <strong>Địa chỉ IP</strong>
                      @foreach($deviceip as $dvip)
                      <address>
                         <h4 style="color:#00a390;"> {{$dvip->ip}} </h4>
                      </address>
                      @endforeach
                  </div>
                  <hr>
                  <div class="col-sm-4 invoice-col">
                  <h4><small><i class="nav-icon fa fa-calendar"></i> Date: {{date("d/m/Y")}}</small></h4>
                  </div>
                  
                </div>

                <div class="row col-sm-1">
                </div>
                <!-- /.col -->
                
                <div class="row col-sm-4">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead style="background-color: #8ce8ff;">
                      <tr>
                        <th>Infomation</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>SysUpTime</td>
                        <td>{{$uptime}}</td>
                      </tr>
                      <tr>
                        <td>SysContact</td>
                        <td>{{$device->sysContact}}</td>
                      </tr>
                      <tr>
                        <td>Type</td>
                        <td>{{$device->type}}</td>
                      </tr>
                      <tr>
                        <td>SysLocation</td>
                        <td>{{$device->sysLocation}}</td>
                      </tr>
                      <tr>
                        <td>SysServices</td>
                        <td>{{$device->sysServices}}</td>
                      </tr>
                      <tr>
                        <td>Community</td>
                        <td>{{$device->community}}</td>
                      </tr>
                      <tr>
                        <td>Fixed</td>
                        <td>{{$device->fixed}}</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row col-sm-1">
                </div>

                <div class="col-sm-2">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                      Tùy chọn
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="{{route('deviceedit',[$device->deviceId,$Status])}}">Sửa</a></li>
                      <li class="dropdown-item"><a href="{{route('devicedel',[$device->deviceId,$Status])}}">Xóa</a></li>
                    </ul>
                  </div>
              <!-- /.row -->

            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</section>
</div>
@endsection