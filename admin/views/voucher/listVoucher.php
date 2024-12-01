
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
            <h1>Quản lí Voucher</h1>
            
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
                <a href="<?= BASE_URL_ADMIN . '?act=form-them-voucher' ?>">
                <button class="btn btn-success">Thêm voucher</button>
            
              </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">   
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã Voucher</th>
                    <th>Giảm giá</th>
                    <th>Giá tối thiểu</th>
                    <th>Giá tối đa </th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                 
                   
                  </tr>
                  </thead>    
                  <tbody>

                        <?php  
                         foreach($listVoucher as $key=>$item): ?>

                            <tr>
                            <td><?= $key+1;?></td>
                            <td><?= $item['ma_voucher']?></td>
                            <td><?= $item['giam_gia'] * 100?>%</td>
                            <td><?= $item['giam_toi_thieu'] ?></td>
                            <td><?= $item['giam_toi_da'] ?></td>
                            <td><?= $item['day_start']?></td>
                            <td><?= $item['day_end']?></td>
                            <td><?= $item['so_luong']?></td>
                            <td><?= $item['trang_thai'] == 1 ? 'Có hiệu lực' : 'Vô hiệu hóa' ?></td>
                            
                            <td>   
                                <a href="?act=form-sua-voucher&id=<?php echo $item['id'] ?>"> <button type="submit" class="btn btn-primary" > Sửa</button></a>
                                
                                <a href="?act=update_voucher&id=<?php echo htmlspecialchars($item['id']) ?>">
                                <button class="btn btn-warning" <?php echo $item['trang_thai'] == 0 ? 'disabled' : ''; ?>>
                                <?php echo $item['trang_thai'] ? 'Vô hiệu hóa' : 'Có hiệu lực'; ?>
                                </button>
                                <!-- <button class="btn btn-warning">
                                <?php echo $item['trang_thai'] ? 'Vô hiệu hóa' : 'Có hiệu lực' ?></button> -->


                                </a>    

                              
                            </td>
                          </tr>  
                        <?php endforeach;?>
                  </tbody>
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