@extends('page_admin.layout.index')
@section('content')
<div class='content-wrapper'>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Device List
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>

                            <tr align="center">

                                <th>Tên thiết bị</th>
                                 <th>Sysadmin</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($device as $dev)

                            <tr class="odd gradeX" align="center">
                                <td>{{$dev->sysDescr}}</td>
                                <td>
                                @foreach($devad as $deva)
                                @if($dev->deviceId == $deva->deviceId)
                                    .{{$deva->adminId}} <br>
                                @endif
                                @endforeach
                                </td>
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