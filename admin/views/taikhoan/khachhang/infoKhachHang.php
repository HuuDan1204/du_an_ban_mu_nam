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
          <h1>Quản lý tài khoản khách hàng</h1>
        </div>
        <div class="col-sm-3 text-end">
          <a href="<?= BASE_URL_ADMIN . '/?act=list-tai-khoan-khach-hang'; ?>" class="btn btn-secondary">Quay lại</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <img src="<?= BASE_URL . $khahchang['anh_dai_dien'] ?>" style="width : 70%" alt=""
            onerror="this.onerror=null;this.src='https://i.pinimg.com/564x/48/a8/9b/48a89b444464e2487101372728e28740.jpg'">

        </div>
        <div class="col-6">
          <div class="container">
            <table class="table table-borderless">
              <tbody style="font-size: x-large ">
                <tr>
                  <th>Họ tên</th>
                  <td><?= $khachhang['ho_ten'] ?></td>
                </tr>
                <tr>
                  <th>Ngày sinh : </th>
                  <td><?= $khachhang['ngay_sinh'] ?></td>
                </tr>
                <tr>
                  <th>Email : </th>
                  <td><?= $khachhang['email'] ?></td>
                </tr>
                <tr>
                  <th>Số điện thoại : </th>
                  <td><?= $khachhang['so_dien_thoai'] ?></td>
                </tr>
                <tr>
                  <th>Giới tính : </th>
                  <td><?= $khachhang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?></td>
                </tr>
                <tr>
                  <th>Địa chỉ : </th>
                  <td><?= $khachhang['dia_chi'] ?></td>
                </tr>
                <tr>
                  <th>Ngày sinh : </th>
                  <td><?= $khachhang['ngay_sinh'] ?></td>
                </tr>
                <tr>
                  <th>Trạng thái</th>
                  <td><?= $khachhang['trang_thai'] == 1 ? 'Active' : 'Inactive'; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="col 12  ">
          <h2>Thông tin mua hàng</h2>
          <div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Tên người nhận</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đặt</th>
                  <th>Tồng tiền</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listdonhang as $key => $donhang): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $donhang['ma_don_hang'] ?></td>
                    <td><?= $donhang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donhang['sdt_nguoi_nhan'] ?></td>
                    <td><?= $donhang['ngay_dat'] ?></td>
                    <td><?= $donhang['tong_tien'] ?></td>
                    <td><span class="badge badge-primary"><?= $donhang['ten_trang_thai']; ?></span></td>
                    <div class="btn-group">
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donhang['id'] ?>"><button
                            class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donhang['id'] ?>"><button
                            class="btn btn-warning"><i class="fas fa-cog"></i></button></a>
                      </td>
                    </div>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col 12  ">
          
          <div>
          <h2>Lịch sử bình luận khách hàng</h2>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Sản phẩm</th>
                  <th>Nội dung</th>
                  <th>Ngày bình luận</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listbinhluan as $key => $binhluan): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                  <a target="_blank" href="<?= BASE_URL_ADMIN.'?act=chi-tiet-san-pham&id_san_pham='.$binhluan['san_pham_id'];  ?>">
                  <?= $binhluan['ten_san_pham'] ?>
                  </a>
                  </td>
                    <td><?= $binhluan['noi_dung'] ?></td>
                    <td><?= $binhluan['ngay_dang'] ?></td>
                    <td><?= $binhluan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                   
                      <td>
                        <!-- <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $binhluan['id'] ?>"><button
                            class="btn btn-primary"><i class="far fa-eye"></i></button></a> -->
                        <!-- <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donhang['id'] ?>"><button
                            class="btn btn-warning"><i class="fas fa-cog"></i></button></a>
                      </td> -->
                    </div>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
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
<?php include './views/layouts/footer.php'; ?>
</body>
<script>
  $(function () {
    $("#example1").DataTable({"responsive": true, "lengthChange": false, "autoWidth": false,
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
</html>