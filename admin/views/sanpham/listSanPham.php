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
            <h1>Quản lý sách</h1>
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
              <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-san-pham';?>">
              <button class="btn btn-success">Thêm sách</button>
              </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listsanpham as $key=>$sanpham):?>
                      <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $sanpham['ten_san_pham']?></td>
                      <td>
                        <img src="<?= BASE_URL . $sanpham['hinh_anh']?>" style="width : 100px" alt=""
                        onerror="this.onerror=null;this.src='https://images.fptplay.net/media/OTT/VOD/2023/01/09/thien-su-nha-ben-fpt-play-1673229755340_Landscape.jpg'"
                        >
                      </td>
                      <td><?= $sanpham['gia_san_pham']?></td>
                      <td><?= $sanpham['so_luong']?></td>
                      <td><?= $sanpham['ten_danh_muc']?></td>
                      <td><?= $sanpham['trang_thai'] == 1 ? 'Còn hàng' : 'Sắp dừng bán'; ?></td>
                      <div class="btn-group" >
                      <td>
                        <a href="<?= BASE_URL_ADMIN.'?act=chi-tiet-san-pham&id_san_pham='.$sanpham['id']?>"><button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN.'?act=form-sua-san-pham&id_san_pham='.$sanpham['id']?>"><button class="btn btn-warning"><i class="fas fa-cog"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN.'?act=xoa-san-pham&id_san_pham='.$sanpham['id']?>"><button class="btn btn-danger" onclick="confirm('Bạn có muốn xóa sản phẩm không?')"><i class="fas fa-trash-alt"></i></button></a>
                      </td>
                      </div>
                      
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
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