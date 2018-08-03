@extends('page_admin.layout.index')
@section('content')
<div class="content-wrapper">
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="page-header">Phân quyền thiết bị cho sysAmdin</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                            <div class="col-lg-4" align="center">
                                <form action="manageDevice" method="POST" enctype="multipart/form-data">
                            @csrf
                            <span class="result"></span>
                           <label>Người quản lý</label>
                           <select class="form-control" name="fullname" id="fullname">
                                @for ($i = 0; $i < count($user); $i ++)
                                <option id="fullname1"  value="{{$user[$i]}}">{{$user[$i]}}</option>
                                @endfor
                           </select>
                        </div>

                            <table class="table table-striped table-bordered table-hover" id="                        dataTables-example">
                        <thead>
                            <tr align="center">

                                <th>Tên thiết bị</th>
                                <th>Phiên bản</th>
                                <th>Địa chỉ IP</th>
                                <th>Nơi quản lý</th>
                                <th>Phân quyền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($device as $dev)
                            <tr class="odd gradeX" align="center">
                                <td>{{$dev->sysName}}</td>
                                <td>{{$dev->sysDescr}}</td>
                                <td>{{$dev->IP}}</td>
                                <td>{{$dev->sysContact}}</td>

                                <td><input id= "checkbox" type="checkbox" value="{{$dev->deviceId}}" name="checkbox[]" ></td>
                            </tr>
                            @endforeach

                        </tbody>
                        </table>
                        <div align="center">
                            <button type="submit" id="submit" name="Thêm">Cập nhật</button>
                        </div>
                    </form>
            </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        let sendAjax = function(){
            var fullname = $('select').val();
                $.ajax({
                    type: 'GET',
                    url: `check/${fullname}`,
                    dataType: 'json',
                    success:function(res){
                        res.forEach(function(e){
                            $(`:checkbox[value=${e}]`).prop("checked",true);
                        });
                    }
                });
        }
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $(document).ready(function(){
            sendAjax();
            $(`select`).on('change',function(e){
                $(':checkbox').prop("checked",false);
                sendAjax();
            });
        });
    </script>
@endsection
