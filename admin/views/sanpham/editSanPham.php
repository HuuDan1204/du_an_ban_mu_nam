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
            <h1>Sửa thông tin sản phẩm : <?= $sanpham['ten_san_pham']; ?> </h1>
          </div>
          <div class="col-sm-3 " >
            <a href="<?= BASE_URL_ADMIN .'/?act=form-sua-san-pham'; ?>" class="btn btn-primary " >Quay lại</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin sản phẩm</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="<?= BASE_URL_ADMIN . './?act=sua-san-pham' ?>" method="post" enctype="multipart/form-data" >
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanpham['id'] ?>"  >
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" class="form-control" name="ten_san_pham" value="<?= $sanpham['ten_san_pham'] ?>">
                <?php if(isset($_SESSION['error']['ten_san_pham'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                      <?php }?>  
              </div>
                  
              <div class="form-group">
                <label >Giá sản phẩm</label>
                <input type="number"  class="form-control" name="gia_san_pham" value="<?= $sanpham['gia_san_pham'] ?>">
                <?php if(isset($_SESSION['error']['gia_san_pham'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                      <?php }?>  
              </div> 
              <div class="form-group">
                <label >Giá khuyến mãi </label>
                <input type="number"  class="form-control" name="gia_khuyen_mai" value="<?= $sanpham['gia_khuyen_mai'] ?>">
               
              </div>
              <div class="form-group">
                <label for="hinh_anh">Hình ảnh</label>
                <input type="file" id="inputName" class="form-control" name="hinh_anh" value="<?= $sanpham['hinh_anh'] ?>">
               
              </div>
              <div class="form-group">
                <label for="so_luong">Số lượng</label>
                <input type="number" id="" class="form-control" name="so_luong" value="<?= $sanpham['so_luong'] ?>">
                <?php if(isset($_SESSION['error']['so_luong'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                      <?php }?> 
              </div>
              <div class="form-group">
                <label for="ngay_nhap">Tên sản phẩm</label>
                <input type="date" id="inputName" class="form-control" name="ngay_nhap" value="<?= $sanpham['ngay_nhap'] ?>">
                <?php if(isset($_SESSION['error']['ngay_nhap'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                      <?php }?> 
              </div>
              <div class="form-group">
                <label >Danh mục sản phẩm</label>
                <select name="danh_muc_id" class="form-control custom-select">
                  <?php  foreach($listdanhmuc as $danhmuc){ ?>
                      <option <?= $danhmuc['id'] == $sanpham['danh_muc_id'] ? 'selected' :'' ?> value="<?= $danhmuc['id']; ?>"><?= $danhmuc['ten_danh_muc']; ?></option>
                    <?php }?>
                    
                </select>
            </div>
            <div class="form-group">
                <label >Trạng thái sản phẩm </label>
                <select name="trang_thai" class="form-control custom-select">
                  
                      <option <?= $sanpham['trang_thai'] == 1 ? 'selected' :'' ?> value="1">Còn hàng</option>
                      <option <?= $sanpham['trang_thai'] == 2 ? 'selected' :'' ?> value="2">Dừng bán</option>
                      <?php if(isset($_SESSION['error']['trang_thai'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                      <?php }?> 
                </select>
            </div>
            <div class="form-group">
                <label for="mo_ta">Mô tả</label>
                <textarea name="mo_ta" class="form-control" rows="4"><?= $sanpham['mo_ta'] ?></textarea>
              </div>
            <!-- /.card-body -->
             <div class="card-footer text-center"  >
              <button type="submit" class="btn btn-primary" >Sửa thông tin</button>
             </div>
          </div>
          </form>
          <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <?php include './views/layouts/footer.php';?>
</body>
</html>