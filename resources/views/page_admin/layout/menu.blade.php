<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('homeindex')}}" class="brand-link">
      <img src="admin_asset_web/dist/img/logo_soict.png"
           alt="BKCS"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Network</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/logo_soict.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">NTN</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{route('warninglist')}}" class="nav-link">
              <i class="nav-icon fa fa-circle-o text-warning"></i>
              <p>
                Cảnh báo
                <span class="badge right"><i class="fa fa-bell-o"></i><i class="fa fa-exclamation-circle" style="color: red;"></i></span>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('devicelist')}}" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Danh Sách thiết bị
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('deviceadd')}}" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Thêm thiết bị
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link"><i class="nav-icon fa fa-book"></i>
                  <p>Quản lý tài khoản<i class="fa fa-angle-left right"></i></p>
              </a>

              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="page_admin/users/user_list" class="nav-link">
                          <i class="fa fa-table nav-icon"></i><p>Danh sách người dùng</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="page_admin/users/user_add" class="nav-link">
                          <i class="fa fa-edit nav-icon"></i><p>Thêm người dùng</p>
                      </a>
                  </li>
              </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  