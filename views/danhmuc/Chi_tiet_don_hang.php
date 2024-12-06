<?php include './views/layouts/header.php';  ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<!-- <?php include './views/layouts/sidebar.php'; ?> -->
<!-- Content Wrapper. Contains page content -->
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h2>Lịch sử đơn hàng - Đơn hàng : <?= $donHangs['ma_don_hang'] ?> </h2>
                </div>
                <div class="col-sm-2">
                    <!-- <form action="" method="post">
                        <select name="" id="" class="form-group">
                            <?php foreach ($listTrangThaiDonHang as $key => $trangthai) { ?>
                                <option 
                                    <?= $trangthai['id'] == $donHangs['trang_thai_id'] ? 'selected' : '' ?>
                                    <?= $trangthai['id'] < $donHangs['trang_thai_id'] ? 'disabled' : '' ?>
                                    value="<?= $trangthai['id']; ?>">
                                    <?= $trangthai['ten_trang_thai']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </form> -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <?php
                            if ($donHangs['trang_thai_id'] == 1) {
                                $colorAlerts = 'primary';
                            } else if ($donHangs['trang_thai_id'] >= 2 && $donHangs['trang_thai_id'] <= 9) {
                                $colorAlerts = 'warning';
                            } else if ($donHangs['trang_thai_id'] == 10) {
                                $colorAlerts = 'success';
                            } else {
                                $colorAlerts = 'danger';
                            }
                            ?>
                            <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
                                Đơn hàng : <?= $donHangs['ten_trang_thai']; ?>
                            </div>
                        </div>
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-book-open"></i>    Silly Shop
                                        <small class="float-right">Ngày đặt : <?= Fomatdate($donHangs['ngay_dat']); ?>
                                        </small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Thông tin người đặt :
                                    <address>
                                        <strong><?= $donHangs['ho_ten'] ?></strong><br>
                                        Email : <?= $donHangs['email'] ?><br>
                                        Phone: <?= $donHangs['so_dien_thoai'] ?><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Thông tin người nhận :
                                    <address>
                                        <strong> <?= $donHangs['ten_nguoi_nhan']; ?> </strong><br>
                                        Email: <?= $donHangs['email_nguoi_nhan']; ?> <br>
                                        Phone: <?= $donHangs['sdt_nguoi_nhan']; ?><br>
                                        Địa chỉ : <?= $donHangs['dia_chi_nguoi_nhan']; ?>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Thông tin đơn hàng :
                                    <address>
                                        <strong>Mã đơn hàng : <?= $donHangs['ma_don_hang']; ?> </strong><br>
                                        Tổng tiền  : <?= number_format( $donHangs['tong_tien'],0,',','.')  ?>VND <br>
                                        Ghi chú : <?= $donHangs['ghi_chu']; ?><br>
                                        Phương thức thanh toán : <?= $donHangs['ten_phuong_thuc']; ?>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sản phẩm </th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $tong_tien = 0;
                                            // $tien_giam = $tien_giam; // Đảm bảo biến tồn tại
                                            ?>
                                            <?php foreach ($sanPhamDonHang as $key => $sanpham) {  $gia = ($sanpham['gia_khuyen_mai'] != 0 ) ? $sanpham['gia_khuyen_mai'] : $sanpham['gia_san_pham']; 
                                            
                                                ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $sanpham['ten_san_pham'];  ?></td>
                                                    <td><?=  number_format($sanpham['don_gia'])  ?>VND</td>
                                                    <td><?= $sanpham['so_luong'] ?></td>
                                                    <td><?= number_format($gia*$sanpham['so_luong'])  ?></td>
                                                    <?php number_format($tong_tien += $sanpham['thanh_tien'])  ; ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Ngày đặt hàng : <?= $donHangs['ngay_dat'] ?></p>

                                    <div class="table-responsive">
                                        <table class="table">
                                          
                                            <?php if (!empty($voucher)){ ?>
                                            <tr>
                                                <th>Giảm giá (Voucher:):</th>
                                                <td>- <?= number_format($tien_giam, 0, ',', '.') ?> VND</td>
                                                <?php }else { ?>
                                                <th>Giảm giá (Voucher ):  </th>
                                                <td>0VND</td>
                                            <?php } ?>
                                            </tr>
                                            
                                            <tr>
                                                <th>Phí vận chuyển:</th>
                                                <td><?= number_format($phiShip, 0, ',', '.') ?> VND</td>
                                            </tr>
                                            <tr>
                                                <th>Thành tiền:</th>
                                                <td><?php $tong_thanh_toan = isset($tien_giam) ? ($tong_tien - $tien_giam + $phiShip ) : $tong_tien + $phiShip;
                                                echo  number_format($tong_thanh_toan  , 0, ',', '.') ?> VND</td>
                                            </tr>
                                            <td>
                                                <?php if ($donHangs['trang_thai_id'] == 1): ?>
                                                    <form action="<?= BASE_URL . '?act=huy-don-dang' ?>" method="POST">
                                                        <input type="hidden" name="ma_don_hang" value="<?= $donHangs['ma_don_hang'] ?>">
                                                        <button type="submit" class="btn btn-danger">Hủy</button>
                                                    </form>
                                                <?php else: ?>
                                                    <button class="btn btn-secondary" disabled>Không thể hủy</button>
                                                <?php endif; ?>
                                            </td>

                                        </table>
                                    </div>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<?php include './views/layouts/footer.php'; ?>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
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