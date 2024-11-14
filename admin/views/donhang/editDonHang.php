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
            <h1>Quản lý thông tin đơn hàng : <?= $donhang['ma_don_hang'] ?></h1>
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
                <h3 class="card-title">Sửa thông tin đơn hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN.'/?act=sua-don-hang';?>" method="post" >
                <input type="text" name="id" value="<?= $donhang['id'] ?>" hidden>
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên người nhận</label>
                    <input type="text" name="ten_nguoi_nhan" class="form-control" value="<?= $donhang['ten_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($error['ten_nguoi_nhan'])) {?>
                      <p class="text-danger"><?= $error['ten_nguoi_nhan'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group">
                    <label >Số điện thoại</label>
                    <input type="number" name="sdt_nguoi_nhan" class="form-control" value="<?= $donhang['sdt_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($error['sdt_nguoi_nhan'])) {?>
                      <p class="text-danger"><?= $error['sdt_nguoi_nhan'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" name="email_nguoi_nhan" class="form-control" value="<?= $donhang['email_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($error['email_nguoi_nhan'])) {?>
                      <p class="text-danger"><?= $error['email_nguoi_nhan'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group">
                    <label >Địa chỉ</label>
                    <input type="text" name="dia_chi_nguoi_nhan" class="form-control" value="<?= $donhang['dia_chi_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                    <?php if(isset($error['dia_chi_nguoi_nhan'])) {?>
                      <p class="text-danger"><?= $error['dia_chi_nguoi_nhan'] ?></p>
                      <?php }?>
                  </div>
                    <div class="form-group" >
                      <label >Ghi chú</label>
                      <textarea name="ghi_chu" id="" placeholder="Nhập mô tả" class="form-control" ><?= $donhang['ghi_chu'] ?></textarea>
                    </div>
                         <hr>

                <div class="form-group">
                <label >Trạng thái đơn hàng</label>
                <select name="trang_thai_id" class="form-control custom-select">
                  <?php  foreach($listTrangThaiDonHang as $trangthai){ ?>
                      <option 

                      <?= 
                         $trangthai['id'] == $donhang['trang_thai_id'] ? 'selected' :'' 
                       ?>
                      <?php
                      
                      if( $donhang['trang_thai_id'] > $trangthai['id'] 
                           || $donhang['trang_thai_id'] == 9
                           || $donhang['trang_thai_id'] == 10
                           || $donhang['trang_thai_id'] == 11
                           ){
                            echo 'disabled' ;
                        } 
                        
                       ?>
                         value="<?= $trangthai['id']; ?>">
                      <?= 
                         $trangthai['ten_trang_thai']; ?></option>
                    <?php }?>
                    
                </select>
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