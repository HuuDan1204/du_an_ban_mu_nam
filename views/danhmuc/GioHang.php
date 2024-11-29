<?php require_once './views/layouts/header.php' ?>

    <!-- Header Section End -->
    <?php require_once './views/layouts/navbar.php' ?>

<!-- Hero Section Begin -->
<?php require_once './views/layouts/navbar.php' ?>
    <!-- Hero Section Begin -->
   
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="./assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= BASE_URL   ?>">Trang chủ</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                    
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $tong_tien = 0 ; ?>
                                <?php foreach($gioHang as $item) {?>
                                <tr>
                                <td>
                               <input type="checkbox" class="chon-san-pham" name="chon_san_pham[]" value="<?= $item['id'] ?>">
                </td>
                                    <td class="shoping__cart__item">
                                        <img src="<?= $item['hinh_anh']  ?>" width="100px" alt="">
                                        <h5><?= $item['ten_san_pham'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price" <?php if($item['gia_khuyen_mai']) {?> >
                                        <?= number_format($item['gia_khuyen_mai'],0,',' , '.'); }
                                        else{
                                            number_format($item['gia_san_pham'],0,',' , '.');
                                        }
                                        ?>VND
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                            <a href="<?= BASE_URL . '?act=giam-san-pham&id_gio_hang=' .$item['san_pham_id'] ;  ?>"> <button <?php if($item['so_luong'] === 1 ){ echo 'disabled';  }  ?> > <span class="dec qtybtn">-</span></button>   </a>
                                                <input type="text"   value="<?= $item['so_luong']  ?> " name="so_luong" readonly>
                                            <a href="<?= BASE_URL . '?act=tang-san-pham&id_gio_hang=' .$item['san_pham_id'] ;  ?>"> <button> <span class="dec qtybtn">+</span> </button>  </a>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total" <?php if($item['gia_khuyen_mai']){ ?> >
                                       <?=  $item['so_luong'] * number_format($item['gia_khuyen_mai'] ,0,',','.' );  }
                                       else{
                                        $item['so_luong'] * number_format($item['gia_sam_pham'] ,0,',','.' );
                                       }
                                       ?>
                                       VND
                                    </td>
                                    <td class="shoping__cart__item__close">
                                       <a href="<?= BASE_URL . '?act=delete-san-pham&id_gio_hang='.$item['id'] ?>"> <button onclick="confirm('Ban co muon xoa san pham nay ?')" > <span class="icon_close"></span></button></a>
                                    </td>
                                </tr>
                                <?php if($item['gia_khuyen_mai']) {
                                    $tong_tien += $item['so_luong'] * $item['gia_khuyen_mai'];
                                }
                                else{
                                    $tong_tien += $item['so_luong'] * $item['gia_san_pham'];
                                } ?>
                             <?php } ?>
                            </tbody>
                        </table>
                       <a href="<?= BASE_URL . '?act=xoa-nhieu-san-pham&id_gio_hang='.$item['id'] ?>"> <button type="submit" class="primary-btn cart-btn-right">Xóa sản phẩm đã chọn</button></a>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?= BASE_URL . '?act=san-pham'   ?>" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form action="/">
                                <input type="text" placeholder="Nhập mã giảm giá của bạn">
                                <button type="submit" class="site-btn">Áp dụng mã</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền giỏ hàng</h5>
                        <ul>
                            <!-- <li>Subtotal <span>$454.98</span></li> -->
                            <li>Tổng tiền <span><?= number_format($tong_tien ,0, ',', '.' ) ?>VND</span></li>
                        </ul>
                        <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="primary-btn">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php require_once './views/layouts/footer.php' ?>

</body>

</html>