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
            <h1>Delete Bình Luận</h1>
          </div>
          <div class="col-sm-3 text-end" >
            <a href="<?= BASE_URL_ADMIN .'/?act=danh-muc'; ?>" class="btn btn-secondary" >Quay lại</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <form action="" method="post">

<div class="mb-3">
<label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
<select class="form-control" id="ten_san_pham" name="ten_san_pham" required>
<option value="<?php echo $XoaBinhLuanDetail['san_pham_id']  ?>" selected><?php echo $XoaBinhLuanDetail['ten_san_pham']  ?></option> 
<?php
$conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");

if ($conn->connect_error) {
   die("Kết nối thất bại: " . $conn->connect_error);
}
$sql = "SELECT * FROM `san_phams`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $san_phams = [];
  while($row = $result->fetch_assoc()) {
      $san_phams[] = $row;
  }
} else {
  $san_phams = [];
}
foreach ($san_phams as $san_pham) {
  echo "<option value='" . $san_pham['id'] . "'>" . $san_pham['ten_san_pham']. "</option>";
}
?>
</select>
</div>

  <div class="mb-3">
      <label for="tai_khoan_id" class="form-label">Tên Tài Khoản</label>
      <select class="form-control" id="tai_khoan_id" name="tai_khoan_id" required>
      <option   value="<?php echo $XoaBinhLuanDetail['tai_khoan_id']  ?>" selected><?php echo $XoaBinhLuanDetail['ho_ten']  ?></option> 
        <?php
        $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM `tai_khoans`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $tai_khoans = [];
            while($row = $result->fetch_assoc()) {
                $tai_khoans[] = $row;
            }
        } else {
            $tai_khoans = [];
        }
        foreach ($tai_khoans as $tai_khoans) {
            echo "<option value='" . $tai_khoans['id'] . "'>" . $tai_khoans['ho_ten']. "</option>";
        }
        ?>
    </select>
  </div>  

  <div class="mb-3">
      <label for="noi_dung" class="form-label">Nội Dung</label>
      <textarea class="form-control" id="noi_dung" name="noi_dung" rows="4" placeholder="Nhập nội dung tại đây..." required>
      <?php echo trim($XoaBinhLuanDetail['noi_dung']); ?>
      </textarea>
  </div>

  <div class="mb-3">
      <label for="ngay_dang" class="form-label">Ngày Đăng</label>
      <?php
        $current_date = date('Y-m-d');
        ?>
      <input type="date" class="form-control" value="<?php echo $XoaBinhLuanDetail['ngay_dang']; ?>" id="ngay_dang" name="ngay_dang" required>
  </div>

  <div class="mb-3">
      <label for="trang_thai" class="form-label">Trạng Thái</label>
      <select class="form-control" id="trang_thai" name="trang_thai" required>
    <option value="0" <?php echo ($XoaBinhLuanDetail['trang_thai'] == 0) ? 'selected' : ''; ?>>Chưa duyệt</option>
    <option value="1" <?php echo ($XoaBinhLuanDetail['trang_thai'] == 1) ? 'selected' : ''; ?>>Đã duyệt</option>
</select>
  </div>
  <button type="submit" class="btn btn-primary">Xóa</button>
  </form>
        
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