<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BkCS | Network Equipment</title>
  <base href="{{asset('')}}" >
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="admin_asset_web/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_asset_web/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Passtrength CSS - Dong-->
  <link rel="stylesheet" type="text/css" href="admin_asset_web/dist/css/passtrength.css">
  <!-- Vuong -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('page_admin.layout.header')
    @yield('content')
  <!-- Content Wrapper. Contains page content -->
 
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin_asset_web/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin_asset_web/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="admin_asset_web/plugins/datatables/jquery.dataTables.js"></script>
<script src="admin_asset_web/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="admin_asset_web/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin_asset_web/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin_asset_web/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_asset_web/dist/js/demo.js"></script>
<!-- page script -->
<script src="admin_asset_web/dist/js/Form.js"></script>
<!-- Check password -->
<script type="text/javascript" src="admin_asset_web/dist/js/jquery.passtrength.min.js"></script>
<!-- Vuong -->
<script src="js/jquery.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- warning list -->
@yield('script')

<script>
         $(document).ready(function(){
             setInterval(_initTimer1, 5000);
         });
         function _initTimer1(){
             $.ajax({
                 url: 'test.php',
                 success: function(data) {
                    //console.log(data);
                     data = data.split('|');
                     $('#1').html(data[0]);
                     $('#2').html(data[1]);
                     $('#3').html(data[2]);
                     $('#4').html(data[3]);
                     $('#5').html(data[4]);
                     $('#6').html(data[5]);
                     $('#7').html(data[6]);
                     $('#8').html(data[7]);
                     $('#9').html(data[8]);
                     $('#10').html(data[9]);
                     $('#11').html(data[10]);
                     $('#12').html(data[11]);
                     $('#13').html(data[12]);
                     $('#14').html(data[13]);
                     $('#15').html(data[14]);
                 }
             });
         }
</script>

<script>
         $(document).ready(function(){
             setInterval(_initTimer2, 5000);
         });
         function _initTimer2(){
             $.ajax({
                 url: 'test.php',
                 success: function(data) {
                    console.log(data);
                     data = data.split('|');
                     $('#a1').html(data[0]);
                     $('#a2').html(data[1]);
                     $('#a3').html(data[2]);
                     $('#a4').html(data[3]);
                     $('#a5').html(data[4]);
                     $('#a6').html(data[5]);
                     $('#a7').html(data[6]);
                     $('#a8').html(data[7]);
                     $('#a9').html(data[8]);
                     $('#a10').html(data[9]);
                     $('#a11').html(data[10]);
                     $('#a12').html(data[11]);
                     $('#a13').html(data[12]);
                     $('#a14').html(data[13]);
                     $('#a15').html(data[14]);
                 }
             });
         }
</script>

<!-- AdminLTE for demo purposes -->
<script src="admin_asset_web/dist/js/demo.js"></script>
</body>
</html>
