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
                <div class="col-sm-10">
                    <h1>Quản lý danh sách đơn hàng - Đơn hàng : <?= $donhang['ma_don_hang'] ?> </h1>
                </div>
                <div class="col-sm-2">
                    <!-- <form action="" method="post">
                        <select name="" id="" class="form-group">
                            <?php foreach ($listTrangThaiDonHang as $key => $trangthai) { ?>
                                <option 
                                    <?= $trangthai['id'] == $donhang['trang_thai_id'] ? 'selected' : '' ?>
                                    <?= $trangthai['id'] < $donhang['trang_thai_id'] ? 'disabled' : '' ?>
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
                            if ($donhang['trang_thai_id'] == 1) {
                                $colorAlerts = 'primary';
                            } else if ($donhang['trang_thai_id'] >= 2 && $donhang['trang_thai_id'] <= 9) {
                                $colorAlerts = 'warning';
                            } else if ($donhang['trang_thai_id'] == 10) {
                                $colorAlerts = 'success';
                            } else {
                                $colorAlerts = 'danger';
                            }
                            ?>
                            <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
                                Đơn hàng : <?= $donhang['ten_trang_thai']; ?>
                            </div>
                        </div>
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-book-open"></i> Silly Shop
                                        <small class="float-right">Ngày đặt : <?= Fomatdate($donhang['ngay_dat']); ?>
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
                                        <strong><?= $donhang['ho_ten'] ?></strong><br>
                                        Email : <?= $donhang['email'] ?><br>
                                        Phone: <?= $donhang['so_dien_thoai'] ?><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Thông tin người nhận :
                                    <address>
                                        <strong> <?= $donhang['ten_nguoi_nhan']; ?> </strong><br>
                                        Email: <?= $donhang['email_nguoi_nhan']; ?> <br>
                                        Phone: <?= $donhang['sdt_nguoi_nhan']; ?><br>
                                        Địa chỉ : <?= $donhang['dia_chi_nguoi_nhan']; ?>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Thông tin đơn hàng :
                                    <address>
                                        <strong>Mã đơn hàng : <?= $donhang['ma_don_hang']; ?> </strong><br>
                                        Tổng tiền: <?= number_format( $donhang['tong_tien'])  ?>VND <br>
                                        Ghi chú : <?= $donhang['ghi_chu']; ?><br>
                                        Phương thức thanh toán : <?= $donhang['ten_phuong_thuc']; ?>
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
                                            $phiShip = 30000 ?>
                                            <?php foreach ($sanPhamDonHang as $key => $sanpham) { $gia = ($sanpham['gia_khuyen_mai'] != 0 ) ? $sanpham['gia_khuyen_mai'] : $sanpham['gia_san_pham']; ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $sanpham['ten_san_pham'];  ?></td>
                                                    <td><?=  number_format($sanpham['don_gia'])  ?>VND</td>
                                                    <td><?= $sanpham['so_luong'] ?></td>
                                                    <td><?= number_format($sanpham['don_gia']*$sanpham['so_luong']) ?></td>
                                                    <?php number_format($tong_tien += $sanpham['thanh_tien']); ?>
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
                                    <p class="lead">Ngày đặt hàng : <?= $donhang['ngay_dat'] ?></p>

                                    <div class="table-responsive">
                                        <table class="table">
                                          
                                            <?php if (!empty($voucher)){ ?>
                                            <tr>
                                                <th>Giảm giá (Voucher):</th>
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