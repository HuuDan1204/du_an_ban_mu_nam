
<?php include './views/layouts/header.php'; ?>
  <!-- Navbar -->
  <?php include './views/layouts/navbar.php'; ?>
  <!-- /.navbar -->
<style>
    /* Toàn bộ trang */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 20px;
    color: #333;
}

/* Tiêu đề chính */
h2 {
    color: #4e73df;
    font-size: 30px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: 700;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
}

/* Nút tìm kiếm và chọn ngày */
select, input[type="date"], input[type="text"] {
    border: 2px solid #4e73df;
    padding: 10px;
    border-radius: 5px;
    margin-right: 10px;
    font-size: 16px;
    width: 220px;
    outline: none;
    transition: all 0.3s ease;
}

select:focus, input[type="date"]:focus, input[type="text"]:focus {
    border-color: #2e59d9;
    box-shadow: 0 0 10px rgba(46, 89, 217, 0.4);
}

/* Nút tìm kiếm */
button {
    background-color: #4e73df;
    color: white;
    padding: 12px 20px;
    border-radius: 5px;
    border: none;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background-color: #2e59d9;
    transform: translateY(-2px);
}

/* Bảng dữ liệu thống kê */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
}

.table th {
    background-color: #4e73df;
    color: white;
    font-size: 18px;
}

.table td {
    background-color: #f9f9f9;
    font-size: 16px;
    color: #555;
}

.table tr:nth-child(even) td {
    background-color: #f2f2f2;
}

.table tr:hover {
    background-color: #e2e8f0;
    cursor: pointer;
}

/* Các chỉ số tổng quan */
.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
}

.card-header {
    background-color: #4e73df;
    color: white;
    padding: 12px 20px;
    font-size: 18px;
    border-radius: 8px 8px 0 0;
    font-weight: 600;
}

.card-body {
    font-size: 16px;
    margin-top: 10px;
}

/* Các biểu đồ/hiệu ứng */
.badge {
    background-color: #4e73df;
    color: white;
    padding: 6px 12px;
    border-radius: 25px;
    font-size: 14px;
}

/* Hiệu ứng hover cho các thẻ */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.card .btn {
    padding: 10px 15px;
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.card .btn:hover {
    background-color: #218838;
}

/* Footer */
footer {
    background-color: #4e73df;
    color: white;
    padding: 15px;
    text-align: center;
    margin-top: 40px;
    border-radius: 8px;
}

/* Thêm hiệu ứng cho những yếu tố khi load trang */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.fade-in {
    animation: fadeIn 1s ease-in-out;
}


</style>
  <!-- Main Sidebar Container -->
  <?php include './views/layouts/sidebar.php'; ?>
     <!-- Main content -->
      <div class="content-wrapper">
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tổng thống kê : </h1>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
      <div class="container-fluid">
      <div class="container mt-3">
    <h2>Thống kê doanh thu và dữ liệu</h2>

    <h3>Doanh thu từ ngày <?= $tu_ngay ?> đến ngày <?= $den_ngay ?></h3>
   <h1> <p class="text-danger" >Số đơn hàng: <?= $doanhThu['so_don_hang'] ?></p></h1>
   <h1> <p class="text-danger" >Doanh thu: <?= number_format($doanhThu['doanh_thu'], 0, ',', '.') ?> VND</p></h1>

    <h3>Top 5 khách hàng mua nhiều nhất</h3>
    <table class="table table-strpied table-hover ">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số đơn hàng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topKhachHang as $key => $kh): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $kh['ho_ten'] ?></td>
                    <td><?= $kh['email'] ?></td>
                    <td><?= $kh['so_don_hang'] ?></td>
                    <td><?= number_format($kh['tong_tien'], 0, ',', '.') ?> VND</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Top 5 sản phẩm bán chạy nhất</h3>
    <table class="table table-strpied table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng bán ra</th>
                <th>Doanh thu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topSanPham as $key => $sp): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $sp['ten_san_pham'] ?></td>
                    <td><?= $sp['so_luong_ban_ra'] ?></td>
                    <td><?= number_format($sp['doanh_thu'], 0, ',', '.') ?> VND</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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