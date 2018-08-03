@extends('page_admin.layout.index')
@section('content')
 <div class='content-wrapper'>
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" >
                           Sysadmin Account
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('thong bao'))
                        <div class="alert alert-success">
                            {{session('thong bao')}}
                        </div>
                        @endif
                        <form action="editAccount/{{$account->adminId}}" method="POST" enctype="multipart/form-data" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" placeholder="Nhập tên người dùng" name="fullname" value="{{$account->fullname}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{$account->mail}}" />
                            </div>
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input class="form-control" name="username" id="username" placeholder="Nhập tên đăng nhập" value="{{$account->adminId}}" readonly=""/>
                                <div class="thongbao"></div>

                            </div>
                             <div class="form-group">
                                <label>Nhập lại password</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập password" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại password</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại password" />
                            </div>

                            <div>
                                <label>Phân quyền</label><br>

                                   @foreach($author as $au)
                                    <input type="checkbox" name="checkbox[]" value="{{$au->rightId }}">
                                        {{$au->rightId}}
                                    <br/>
                                    @endforeach

                            </div>
                            <div style="margin: 10px">
                                <button  type="submit" class="btn btn-default">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        </div>

@endsection

