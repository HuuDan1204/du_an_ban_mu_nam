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
            <h1>Danh mục sản phẩm</h1>
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
                <h3 class="card-title">Sửa danh mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN.'/?act=sua-danh-muc';?>" method="post" >
                <input type="text" name="id" value="<?= $danhmuc['id'] ?>" hidden>
                <div class="card-body">
                  <div class="form-group">
                    <label >Thêm Danh Mục</label>
                    <input type="text" name="ten_danh_muc" class="form-control" value="<?= $danhmuc['ten_danh_muc'] ?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($error['ten_danh_muc'])) {?>
                      <p class="text-danger"><?= $error['ten_danh_muc'] ?></p>
                      <?php }?>
                  </div>
                    <div class="form-group" >
                      <label >Mô tả</label>
                      <textarea name="mo_ta" id="" placeholder="Nhập mô tả" class="form-control" ><?= $danhmuc['mo_ta'] ?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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