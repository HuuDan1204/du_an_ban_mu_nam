<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- Sidebar -->
<?php include './views/layouts/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Thống kê đơn hàng</h1>
        </div>
    </section>

    <section class="content">
    <div class="container mt-3">
    <h2>Thống kê doanh thu và dữ liệu</h2>
    <form action="<?= BASE_URL_ADMIN . '?act=tong-thong-ke' ?>" method="post">
        <div class="form-group">
            <label for="tu_ngay">Chọn khoảng thời gian (Từ ngày - Đến ngày):</label>
            <div class="row">
                <div class="col-md-6">
                    <label for="tu_ngay">Từ ngày:</label>
                    <input type="date" id="tu_ngay" name="tu_ngay" class="form-control" value="<?= date('Y-m-d') ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="den_ngay">Đến ngày:</label>
                    <input type="date" id="den_ngay" name="den_ngay" class="form-control" value="<?= date('Y-m-d') ?>" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Xem thống kê</button>
    </form>
</div>

    </section>
</div>

<?php include './views/layouts/footer.php'; ?>
