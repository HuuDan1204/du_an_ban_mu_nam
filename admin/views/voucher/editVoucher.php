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
          <h1>Sửa voucher</h1>

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

              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="<?= BASE_URL_ADMIN . '?act=edit' ?>" method="post">
                <input type="hidden" name="id" value="<?= $voucher['id'] ?>">

                <!-- Mã Voucher -->
                <div class="mb-3">
                  <label for="maVoucher" class="form-label">Mã Voucher</label>
                  <input type="text" class="form-control" id="maVoucher" name="ma_voucher"
                    value="<?= htmlspecialchars($voucher['ma_voucher']) ?>">
                  <?php if (isset($error['ma_voucher'])) { ?>
                    <p class="text-danger"><?= $error['ma_voucher'] ?></p>
                  <?php } ?>
                </div>

                <!-- Giảm Giá -->
                <div class="mb-3">
                  <label for="giamGia" class="form-label">Giảm Giá</label>
                  <input type="number" class="form-control" id="giamGia" name="giam_gia"
                    value="<?= htmlspecialchars($voucher['giam_gia']) ?>" step="0.01" >
                  <?php if (isset($error['giam_gia'])) { ?>
                    <p class="text-danger"><?= $error['giam_gia'] ?></p>
                  <?php } ?>
                </div>

                <div class="mb-3">
                  <label for="giamGia" class="form-label">Giá Tối Thiểu Để Giảm</label>
                  <input type="number" class="form-control" name="giam_toi_thieu" value="<?= $voucher['giam_toi_thieu'] ?>" >
                    <?php if (isset($error['giam_toi_thieu'])) : ?>
                    <p class="text-danger"><?= $error['giam_toi_thieu'] ?></p>
                  <?php endif;   ?>
                </div>
                <div class="mb-3">
                  <label for="giamGia" class="form-label">Giá Tối Đa Có thể Giảm</label>
                  <input type="number" class="form-control" name="giam_toi_da"
                    value="<?= $voucher['giam_toi_da'] ?>">
                    <?php if (isset($error['giam_toi_da'])) { ?>
                    <p class="text-danger"><?= $error['giam_toi_da'] ?></p>
                  <?php } ?>
                </div>

                <!-- Ngày Bắt Đầu -->
                <div class="mb-3">
                  <label for="ngayBatDau" class="form-label">Ngày Bắt Đầu</label>
                  <input type="date" class="form-control" id="day_start" name="day_start"
                    value="<?= htmlspecialchars($voucher['day_start']) ?>">
                  <?php if (isset($error['day_start'])) { ?>
                    <p class="text-danger"><?= $error['day_start'] ?></p>
                  <?php } ?>
                </div>

                <!-- Ngày Kết Thúc -->
                <div class="mb-3">
                  <label for="ngayKetThuc" class="form-label">Ngày Kết Thúc</label>
                  <input type="date" class="form-control" id="ngayKetThuc" name="day_end"
                    value="<?= htmlspecialchars($voucher['day_end']) ?>">
                  <?php if (isset($error['day_end'])) { ?>
                    <p class="text-danger"><?= $error['day_end'] ?></p>
                  <?php } ?>
                </div>

                <!-- Số Lượng -->
                <div class="mb-3">
                  <label for="soLuong" class="form-label">Số Lượng</label>
                  <input type="number" class="form-control" id="soLuong" name="so_luong"
                    value="<?= htmlspecialchars($voucher['so_luong']) ?>" min="1">
                  <?php if (isset($error['so_luong'])) { ?>
                    <p class="text-danger"><?= $error['so_luong'] ?></p>
                  <?php } ?>
                </div>

                <!-- Trạng Thái -->
                <div class="mb-3">
                  <label for="trangThai" class="form-label">Trạng Thái</label>
                  <select class="form-control" id="trangThai" name="trang_thai">
                    <option value="1" <?= $voucher['trang_thai'] == 1 ? 'selected' : '' ?>>Có Hiệu Lực</option>
                    <option value="0" <?= $voucher['trang_thai'] == 0 ? 'selected' : '' ?>>Vô Hiệu Hóa</option>
                  </select>
                  <?php if (isset($error['trang_thai'])) { ?>
                    <p class="text-danger"><?= $error['trang_thai'] ?></p>
                  <?php } ?>
                </div>

                <!-- Nút Submit -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa</button>
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



<?php include './views/layouts/footer.php'; ?>
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