<?php include './views/layouts/header.php'; ?>
  <!-- Navbar -->
  <?php include './views/layouts/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './views/layouts/sidebar.php'; ?>
     <!-- Main content -->
      <div class="content-wrapper">
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Danh Mục</h1>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       
            <!-- /.card -->
            <div class="card">
            <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-voucher';?>">
                <button class="btn btn-success">Thêm voucher</button>
            
              </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?php echo BASE_URL_ADMIN . '?act=insert'; ?>" method="post">
                <!-- Mã Voucher -->
                <div class="mb-3">
                    <label for="maVoucher" class="form-label">Mã Voucher</label>
                    <input type="text" class="form-control" id="maVoucher" name="ma_voucher" >
                    <?php if (isset($_SESSION['error']['ma_voucher'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ma_voucher']; ?></p>
                    <?php } ?>
                </div>

                <!-- Giảm Giá -->
                <div class="mb-3">
                    <label for="giamGia" class="form-label">Giảm Giá (%)</label>
                    <input type="number" class="form-control" id="giamGia" name="giam_gia"  step="0.01" >
                    <?php if (isset($_SESSION['error']['giam_gia'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['giam_gia']; ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label for="giamGia" class="form-label">Giảm Tối Thiểu Để Giảm</label>
                    <input type="number" class="form-control"  name="giam_toi_thieu"  >
                    <?php if (isset($_SESSION['error']['giam_toi_thieu'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['giam_toi_thieu']; ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label for="giamGia" class="form-label">Giảm Tối Đa Có thể Giảm</label>
                    <input type="number" class="form-control"  name="giam_toi_da"  >
                    <?php if (isset($_SESSION['error']['giam_toi_da'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['giam_toi_da']; ?></p>
                    <?php } ?>
                </div>

                <!-- Ngày Bắt Đầu -->
                <div class="mb-3">
                    <label for="ngayBatDau" class="form-label">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" id="ngayBatDau" name="day_start" >
                    <?php if (isset($_SESSION['error']['day_start'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['day_start']; ?></p>
                    <?php } ?>
                </div>

                <!-- Ngày Kết Thúc -->
                <div class="mb-3">
                    <label for="ngayKetThuc" class="form-label">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" id="ngayKetThuc" name="day_end" >
                    <?php if (isset($_SESSION['error']['day_end'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['day_end']; ?></p>
                    <?php } ?>
                </div>

                <!-- Số Lượng -->
                <div class="mb-3">
                    <label for="soLuong" class="form-label">Số Lượng</label>
                    <input type="number" class="form-control" id="soLuong" name="so_luong" min="1" >
                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_luong']; ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
    <label for="trangThai" class="form-label">Trạng Thái</label>
    <select class="form-control" id="trangThai" name="trang_thai" required>
        <option value="1" <?php if (isset($_POST['trang_thai']) && $_POST['trang_thai'] == '1') echo 'selected'; ?>>Có Hiệu Lực</option>
        <option value="0" <?php if (isset($_POST['trang_thai']) && $_POST['trang_thai'] == '0') echo 'selected'; ?>>Vô Hiệu Hóa</option>
    </select>
    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
        <p class="text-danger"><?= $_SESSION['error']['trang_thai']; ?></p>
    <?php } ?>
</div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="btn_insert"> Thêm Voucher</button>
                </div>
            </form>

                        </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
      </div>
    
    <!-- /.content -->
 


  <?php include './views/layouts/footer.php';?>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>