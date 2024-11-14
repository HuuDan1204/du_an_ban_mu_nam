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
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <!-- <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-khach-hang';?>">
              <button class="btn btn-success">Thêm khách hàng</button>
              </a>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên </th>
                    <th>Ảnh </th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listkhachhang as $key=>$khachhang):?>
                      <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $khachhang['ho_ten']?></td>
                      <td>
                        <img src="<?= BASE_URL . $khahchang['anh_dai_dien']?>" style="width : 100px" alt=""
                        onerror="this.onerror=null;this.src='https://i.pinimg.com/564x/48/a8/9b/48a89b444464e2487101372728e28740.jpg'"
                        >
                      </td>
                      <td><?= $khachhang['email']?></td>
                      <td><?= $khachhang['so_dien_thoai']?></td>
                      <td><?= $khachhang['trang_thai'] == 1 ? 'Active':'Inactive' ?></td>
                      <div class="btn-group" >
                      <td>
                      <a href="<?= BASE_URL_ADMIN.'?act=chi-tiet-khach-hang&id_khach_hang='.$khachhang['id']?>">
                      <button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN.'?act=form-sua-khach-hang&id_khach_hang='.$khachhang['id']?>">
                            <button class="btn btn-warning"><i class="fas fa-cogs"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN.'?act=reset-password&id_quan_tri='.$khachhang['id']?>">
                            <button class="btn btn-danger" 
                        onclick="return confirm('Bạn có muốn reset password không?')"><i class="fas fa-redo-alt"></i></i></button></a>
                        
                      </td>
                      </div>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>STT</th>
                    <th>Tên </th>
                    <th>Ảnh </th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <?php include './views/layouts/footer.php';?>
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
</body>
</html>