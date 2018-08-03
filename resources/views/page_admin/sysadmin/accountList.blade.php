@extends('page_admin.layout.index')
@section('content')
 <div class='content-wrapper'>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="page-header">User
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <div class="col-lg-5" style="color:'black' ">
                        <a href=""><H2>Thêm mới</H2></a>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Quyền</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $us)
                            <tr class="odd gradeX" align="center">
                                <td>{{$us->fullname}}</td>
                                <td>{{$us->mail}}</td>
                                <td>{{$us->adminId}}</td>
                                <td>{{$us->password}}</td>
                                <td>
                                @foreach($function as $fu)
                                @foreach($author as $au)
                                    @if($us->adminId == $fu->adminId && $fu->rightId == $au->rightId)
                                {{$au->rightId}} <br>
                                    @endif
                                @endforeach
                                @endforeach
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                    <a href="editAccount/{{$us->adminId}}">Edit</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>

        @endsection