
<?php require_once './views/layouts/header.php' ?>

    <!-- Header Section End -->
    <?php require_once './views/layouts/navbar.php' ?>
</div>
    <!-- Hero Section Begin -->

<!-- Hero Section Begin -->
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="./assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh toán</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= BASE_URL ?>">Trang chủ</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span>Bạn có mã giảm giá ? <a href="#">Nhấn vào đây</a> để nhập mã  
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Chi tiết thanh toán</h4>
                <form action="<?= BASE_URL . '?act=post-thanh-toan' ?>" method="post" >
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Họ tên <span>*</span></p>
                                        <input type="text" value="<?= $taiKhoan['ho_ten'] ?>" name="ten_nguoi_nhan" >
                                    </div>
                                </div>
                               
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" value="<?= $taiKhoan['dia_chi'] ?>"  name="dia_chi_nguoi_nhan" >
                            </div>
                            
                         
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text" value="<?= $taiKhoan['so_dien_thoai'] ?>"  name="sdt_nguoi_nhan">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value="<?= $taiKhoan['email'] ?>"  name="email_nguoi_nhan">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <input type="text"
                                    placeholder="Ghi chú của bạn ."  name="ghi_chu" >
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                                <h4>Hóa đơn của bạn</h4>
                                <?php $tong_tien = 0 ;
                                $phiShip = 30000;
                                
                                ?>

                                <div class="checkout__order__products">Sản phẩm <span>Giá</span></div>
                                <?php foreach($gioHang as $item ) {?>

                                <ul>
                                    <li><?= $item['ten_san_pham'] . ' x ' .$item['so_luong']  ?> <span   <?php $gia = ($item['gia_khuyen_mai'] != 0 ) ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                                       $tong_tien += $gia * $item['so_luong'];
                                       ?> >
                                     <?= number_format($gia * $item['so_luong'], 0, ',', '.') ?> VND
                                      
                                    </span></li>
                                </ul>
                                <?php } ?>
                              
                              

                                <div class="checkout__order__subtotal">
                                            Tiền giảm được 
                                            <span>
                                                <?= isset($tien_giam) ? number_format($tien_giam, 0, ',', '.') : '0';var_dump($tien_giam, $tong_tien);

 ?>VND
                                            </span>
                                        </div>

                                        <div class="checkout__order__subtotal">
                                            Tiền vận chuyển
                                            <span>
                                                <?= number_format($phiShip, 0, ',', '.')   ?>VND
                                            </span>
                                        </div>
                                <input type="hidden" name="tong_tien" value="<?= $tong_tien ?>">
                                <div class="checkout__order__total"  >Thành tiền <span><?php 
                                    $tong_thanh_toan = isset($tien_giam) ? ($tong_tien - $tien_giam + $phiShip ) : $tong_tien + $phiShip ;
                                    echo number_format($tong_thanh_toan, 0, ',', '.');
                                ?> VND</span></div>
                                
                                
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Phương thức thanh toán <hr>
                                        <?php foreach ($phuongThucThanhToan as $item): ?>
                                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="ten_phuong_thuc" id="<?= $item['ten_phuong_thuc'] ?>" value="<?= $item['id'] ?>">
                                    <label class="custom-control-label" for="<?= $item['ten_phuong_thuc'] ?>"><?= $item['ten_phuong_thuc'] ?></label>
                                </div>
                            </div>
                                <?php endforeach; ?>
                                <button type="submit" class="site-btn">Thanh Toán</button>
                            </div>
                        </div>
                    </div>
  </form>

                            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                                                    action="xulithanhtoan_momo.php">
                          <li><a href="<?= BASE_URL .'?act=xu-li-thanh-toan' ?>" class="btn btn-danger">Thanh toán QR MOMO</a></li><br>

                          <li><a href="<?= BASE_URL .'?act=thanh-toan-atm' ?>" class="btn btn-danger">Thanh toán ATM MOMO</a></li>
</form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <?php require_once './views/layouts/footer.php' ?>


</body>

</html>