<?php include './views/layouts/header.php'; ?>
  <!-- Navbar -->
  <?php include './views/layouts/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './views/layouts/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý tài khoản quản trị viên</h1>
          </div>
          <div class="col-sm-3 text-end" >
            <a href="<?= BASE_URL_ADMIN .'/?act=list-tai-khoan-quan-tri-vien'; ?>" class="btn btn-secondary" >Quay lại</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa thông tin quản trị <?= $quantri['ho_ten']; ?> </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN.'/?act=sua-quan-tri';?>" method="post" >
                <input type="hidden" name="quan_tri_id" value="<?= $quantri['id'] ?>"  >
                <div class="card-body" >
              <div class="form-group ">
                    <label >Họ tên</label>
                    <input type="text" name="ho_ten" class="form-control" value="<?= $quantri['ho_ten'] ?>" placeholder="Nhập họ tên ">
                    <?php if(isset($_SESSION['error']['ho_ten'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group ">
                    <label >Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $quantri['email'] ?>" placeholder="Nhập email">
                    <?php if(isset($_SESSION['error']['email'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group ">
                    <label >Số điện thoại</label>
                    <input type="text" name="so_dien_thoai" class="form-control" value="<?= $quantri['so_dien_thoai'] ?>" placeholder="Nhập số điện thoại">
                    <?php if(isset($_SESSION['error']['so_dien_thoai'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group">
                <label >Trạng thái tài khoản</label>
                <select name="trang_thai" class="form-control custom-select">
                 <option <?= $quantri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                 <option <?= $quantri['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
                    
                </select>
            </div>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer  ">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <?php include './views/layouts/footer.php';?>
</body>
</html>