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
                <h3 class="card-title">Thêm sản phẩm </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN.'/?act=them-san-pham';?>" method="post" enctype="multipart/form-data"  >
                <div class="card-body row">
                  <div class="form-group col-12">
                    <label >Tên sách</label>
                    <input type="text" name="ten_san_pham" class="form-control" placeholder="Nhập tên sách">
                    <?php if(isset($_SESSION['error']['ten_san_pham'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group col-6">
                    <label >Giá sản phẩm</label>
                    <input type="text" name="gia_san_pham" class="form-control" placeholder="Nhập tên sản phẩm">
                    <?php if(isset($_SESSION['error']['gia_san_pham'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group col-6">
                    <label >Giá khuyến mãi</label>
                    <input type="text" name="gia_khuyen_mai" class="form-control" placeholder="Nhập giá khuyễn mãi">
                    <?php if(isset($_SESSION['error']['gia_khuyen_mai'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group col-6">
                    <label >Hình ảnh</label>
                    <input type="file" name="hinh_anh" class="form-control" >
                    <?php if(isset($_SESSION['error']['hinh_anh'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group col-6">
                    <label >Album ảnh</label>
                    <input type="file" class="form-control" name="img_array[]" multiple >
                  </div>
                  <div class="form-group col-6">
                    <label >Số lượng</label>
                    <input type="number" name="so_luong" class="form-control" placeholder="Nhập số lượng">
                    <?php if(isset($_SESSION['error']['so_luong'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group col-6">
                    <label >Ngày nhập</label>
                    <input type="date" name="ngay_nhap" class="form-control" placeholder="Nhập tên sản phẩm">
                    <?php if(isset($_SESSION['error']['ngay_nhap'])) {?>
                      <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                      <?php }?>
                  </div>
                  <div class="form-group col-6">
                    <label >Danh Mục</label>
                    <select name="danh_muc_id" id="" class="form-control" >
                      <?php foreach($listdanhmuc as $list){ ?>
                        <option value="<?= $list['id'] ?>"><?= $list['ten_danh_muc'] ?></option>
                        <?php }?>
                    </select>
                  
                  </div>
                  <div class="form-group col-6">
                    <label >Trạng thái</label>
                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                        <option selected disabled >Chọn trạng thái</option>
                            <option value="1">Còn hàng</option>
                            <option value="2">Sắp dừng bán</option>
                      </select>
                    
                  </div>
                  <div class="form-group col-12" >
                      <label >Mô tả</label>
                      <textarea name="mo_ta" id="" placeholder="Nhập mô tả" class="form-control" ></textarea>
                    </div>
                </div>
             
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center ">
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