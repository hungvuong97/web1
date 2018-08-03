@extends('page_admin.layout.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách cảnh báo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeindex')}}">Home</a></li>
              <li class="breadcrumb-item active">Cảnh báo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline card-body-warning">
            <div class="card-header">
              <h3 class="card-title">Cảnh báo</h3>
              <div class="card-tools">
                <form class="input-group input-group-sm" method="get" action="{{route('warningsearch')}}">
                  <input type="text" class="form-control" placeholder="Tìm kiếm" name="key">
                  <div class="input-group-append">
                    <button class="btn btn-primary">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                  <a href="{{route('home')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button></a>
                </div>
                <!-- /.btn-group -->
                <a href="{{route('warninglist')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Địa chỉ IP</th>
                      <th>Sự kiện</th>
                      <th>Thời gian</th>
                    </tr>
                  </thead>
                  <tbody ng-app="test">
                  @foreach($event as $ev)
                  <tr>
                    <td><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i></td>
                    <td class="mailbox-name"><a href="read-mail.html">{{$ev->address}}</a></td>
                    <td class="mailbox-subject">{{$ev->event}}</td>
                    <td class="mailbox-date">{{$ev->timestamp}}</td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 @endsection