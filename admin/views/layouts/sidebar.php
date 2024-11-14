<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Thống kê
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          
          </li>
          <li class="nav-item">
            <a href="<?php echo BASE_URL_ADMIN.'?act=danh-muc' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=BASE_URL_ADMIN ."?act=san-pham" ?>" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
              <p>
                Sản Phẩm
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=BASE_URL_ADMIN ."?act=don-hang" ?>" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Đơn hàng
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
                <p>Quản lý tài khoản</p>
                <i class="fas fa-angle-left right " ></i>
            </a>
            <ul class="nav nav-treeview" >
            <li class="nav-item" >
                <a href="<?=BASE_URL_ADMIN ."?act=list-tai-khoan-quan-tri-vien" ?>" class="nav-link" >
                  <i class="nav-icon fas fa-user" ></i>
                  <p>Tài khoản quản trị viên</p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?=BASE_URL_ADMIN ."?act=list-tai-khoan-khach-hang" ?>" class="nav-link" >
                  <i class="nav-icon fas fa-user" ></i>
                  <p>Tài khoản khách hàng</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>