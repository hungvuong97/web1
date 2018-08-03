<!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('homeindex')}}" class="nav-link">Trang chủ</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Liên hệ</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" onclick="hiddenForm()">
          <i class="fa fa-bell-o"></i>
          <span class="badge navbar-badge"><i class="fa fa-exclamation-circle hidden"" style="color: red;" id="hidden"><h6 hidden="" id="warning">1</h6></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i>
            <span class="text-muted" id="1">loading...</span>
            <span class="float-right text-muted text-sm" id="3">loading...</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i>
            <span class="text-muted" id="4">loading...</span>
            <span class="float-right text-muted text-sm" id="6">loading...</span>
          </a><div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i>
            <span class="text-muted" id="7">loading...</span>
            <span class="float-right text-muted text-sm" id="9">loading...</span>
          </a><div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i>
            <span class="text-muted" id="10">loading...</span>
            <span class="float-right text-muted text-sm" id="12">loading...</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-exclamation-triangle" style="color: #ff0000;"></i>
            <span class="text-muted" id="13">loading...</span>
            <span class="float-right text-muted text-sm" id="15">loading...</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('warninglist')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>

    @include('page_admin.layout.menu')

  </nav>
  <!-- /.navbar -->