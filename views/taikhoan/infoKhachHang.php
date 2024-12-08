<?php require_once './views/layouts/header.php' ?>
<?php require_once './views/layouts/navbar.php' ?>



    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg " data-setbg="./uploads/banner.png"  >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Silly Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= BASE_URL ?>">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <link rel="stylesheet" href="assets/css/table.css">

   <h1 class="text-center" >Thông tin cá nhân</h1>

   <?php if (isset($tai_khoan)): ?>
    <div class="container">
        <form action="?act=cap-nhat-thong-tin-ca-nhan" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ho_ten">Ảnh đại diện</label>
                <!-- Hiển thị ảnh nếu đã có -->
                <img src="<?= BASE_URL . $tai_khoan['anh_dai_dien'] ?>" style="width : 10%" alt=""
                onerror="this.onerror=null;this.src='https://i.pinimg.com/564x/48/a8/9b/48a89b444464e2487101372728e28740.jpg'"  >
                <!-- Form để người dùng chọn ảnh mới -->
                <input type="file" class="form-control" id="anh_dai_dien" name="anh_dai_dien">
            </div>
            <div class="form-group">
                <label for="ho_ten">Họ và tên</label>
                <input type="text" class="form-control" id="name" name="ho_ten" value="<?= htmlspecialchars($tai_khoan['ho_ten']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($tai_khoan['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="so_dien_thoai">Số điện thoại</label>
                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="<?= htmlspecialchars($tai_khoan['so_dien_thoai']); ?>" required>
            </div>
            <div class="form-group">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?= htmlspecialchars($tai_khoan['dia_chi']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="editThongTin">Cập nhật thông tin</button>
        </form>
    </div>

    </div>
<?php else: ?>
    <p>Không tìm thấy thông tin người dùng.</p>
<?php endif; ?>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <?php require_once './views/layouts/footer.php' ?>
</body>

</html>