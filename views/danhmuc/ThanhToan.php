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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
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
                <form>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Họ tên <span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="checkout__input">
                                <p>Thành phố<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" placeholder="xóm , thôn" class="checkout__input__add">
                                <!-- <input type="text" placeholder="Tên đường , số nhà "> -->
                            </div>
                            <!-- <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text">
                            </div> -->
                            <!-- <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div> -->
                            <!-- <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div> -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Ghi nhớ tài khoản
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <input type="text"
                                    placeholder="Ghi chú của bạn .">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                                <ul>
                                    
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span></span></div>
                                <div class="checkout__order__total">Total <span></span></div>

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