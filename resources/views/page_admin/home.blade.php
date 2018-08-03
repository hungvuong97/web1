@extends('page_admin.layout.index')
@section('content')
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="table-responsive mailbox-messages">
	                	<table class="table table-hover table-striped">
		                  	<tbody ng-app="test">
			                    <tr>
                          <td><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i></td>
			                    <td class="mailbox-name" id="a1"><a href="read-mail.html"></a></td>
			                    <td class="mailbox-subject" id="a2"></td>
			                    <td class="mailbox-date" id="a3"></td>
			                  	</tr>
			                  	<tr>
			                    <td><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i></td>
			                    <td class="mailbox-name" id="a4"><a href="read-mail.html"></a></td>
			                    <td class="mailbox-subject" id="a5"></td>
			                    <td class="mailbox-date" id="a6"></td>
			                  	</tr>
			                  	<tr>
			                    <td><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i></td>
			                    <td class="mailbox-name" id="a7"><a href="read-mail.html"></a></td>
			                    <td class="mailbox-subject" id="a8"></td>
			                    <td class="mailbox-date" id="a9"></td>
			                  	</tr>
			                  	<tr>
			                    <td><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i></td>
			                    <td class="mailbox-name" id="a10"><a href="read-mail.html"></a></td>
			                    <td class="mailbox-subject" id="a11"></td>
			                    <td class="mailbox-date" id="a12"></td>
			                  	</tr>
			                  	<tr>
			                    <td><i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i></td>
			                    <td class="mailbox-name" id="a13"><a href="read-mail.html"></a></td>
			                    <td class="mailbox-subject" id="a14"></td>
			                    <td class="mailbox-date" id="a15"></td>
			                  	</tr>
		                  	</tbody>
	                	</table>
	                <!-- /.table -->
              		</div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection