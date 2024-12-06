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
            <h1>Danh mục Bình Luận</h1>
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
            <!-- /.card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Chức Năng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                  <div class="form-group d-flex justify-content-between">
                 <div>
                 <a href="<?= BASE_URL_ADMIN .'?act=add-binh-luan'; ?>" class="btn btn-secondary" >Thêm</a>
                 </div>
                 <div>
                  Bình luận Đang Chờ Xét Duyệt
                  <?php
                      $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");

                    if ($conn->connect_error) {
                        die("Kết nối thất bại: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM `binh_luans` WHERE `trang_thai` = 0  ";

                    $stmt = $conn->prepare($sql);
                
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo("(".$result->num_rows.")");
                    } else {
                        echo("(0)");
                    }
                    $conn->close();
                    ?>
                    <a href="<?= BASE_URL_ADMIN .'?act=xet-binh-luan'; ?>" class="btn btn-secondary" >Xem</a>
                 </div>
                    </div>
                </div>
            </div>

           <table class="comments-table">
           <thead>
            <tr>
              <th>ID</th>
              <th>Sản phẩm ID</th>
              <th>Tài khoản ID</th>
              <th>Nội dung</th>
              <th>Ngày đăng</th>
              <th>Trạng thái</th>
              <th colspan="2">Action</th>
            </tr></thead>
           <tbody>
            <?php
            if (count($listBinhLuan) > 0) {
              foreach ($listBinhLuan as $row) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['san_pham_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['tai_khoan_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['noi_dung']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['ngay_dang']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['trang_thai']) . '</td>';
                    echo '<td><a href="'.BASE_URL_ADMIN.'?act=edit-binh-luan&id='. $row['id'] . '" class="btn-edit">Sửa</a></td>';
                    echo '<td><a href="'.BASE_URL_ADMIN.'?act=delete-binh-luan&id='. $row['id'] . '" class="btn-edit">Xóa</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7">Không có bình luận nào.</td></tr>';
            }
            echo '</tbody>';
            echo '</table>';
            ?>
            <div class="pagination">
    <?php

     $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");

   if ($conn->connect_error) {
       die("Kết nối thất bại: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM `binh_luans` WHERE `trang_thai` = 0  ";

   $stmt = $conn->prepare($sql);

   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
    $tong =ceil($result->num_rows/10 ) + 1;
    echo '<ul class="pagination justify-content-center">';
    for ($i = 1; $i <=  $tong; $i++) {
      echo "<li class='page-item'><a class='page-link' href='" . BASE_URL_ADMIN . "?act=binh-luan&page=" . $i . "'>" . $i . "</a></li>";
    
  }
  echo '</ul>'; 
   } else {
       echo("Rỗng");
   }
   $conn->close();
    ?>
</div>
            <style>
            .comments-table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                font-family: Arial, sans-serif;
            }

            .comments-table th, .comments-table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }

            .comments-table th {
                background-color: #f2f2f2;
                color: #333;
                font-weight: bold;
            }

            .comments-table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .comments-table tr:hover {
                background-color: #f1f1f1;
            }

            .comments-table td[colspan="2"] {
                text-align: center;
                font-style: italic;
                color: #888;
            }

            /* Tạo hiệu ứng khi người dùng di chuột vào bảng */
            .comments-table td, .comments-table th {
                transition: background-color 0.3s ease;
            }
            </style>
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