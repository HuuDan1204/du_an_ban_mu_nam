<?php require_once './views/layouts/header.php'; ?>

    <!-- Header Section End -->
   

    <!-- Hero Section Begin -->
 <?php require_once './views/layouts/sidebar.php' ;?>
    
 <?php require_once './views/layouts/navbar.php'; ?>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                        <?php foreach($listSanPham as $key=>$item ) {?>
                    <div class="col-lg-3">
                            <img src=" <?=BASE_URL. $item['hinh_anh'];?>" alt=""  >
                            <h5><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='.$item['id'] ?>"><span class="text-danger d-flex justify-content-center " ><?= $item['ten_san_pham']; ?></span></a></h5>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm phổ biến</h2>
                    </div>
                    <div class="featured__controls">
                       
                        <ul>
                            <?php foreach($listDanhMuc as $danhMuc ){ ?>
                               <li ><?= $danhMuc['ten_danh_muc']  ?></li>
                    <?php }?>
                        </ul>
                      
                    </div>
                </div>
            </div>
            
            <div class="row featured__filter">
            <?php foreach($listSanPhamFT as $sanPham ) {?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg">
                            <img src="<?= $sanPham['hinh_anh'] ?>" alt="" >
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?= $sanPham['ten_san_pham'] ?></a></h6>
                            <h5><?= $sanPham['gia_san_pham'] ?>đ</h5>
                        </div>
                    </div>
                </div>
                <?php }?>
               
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="./uploads/banner.png" height="300px" width="500px" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="./uploads/banner1.png" height="300px" width="500px" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm cũ</h4>
                        <div class="latest-product__slider owl-carousel">
                        <?php foreach($listSanPhamA as $sanPham ) {?>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= $sanPham['hinh_anh'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $sanPham['ten_san_pham'] ?></h6>
                                        <span><?= $sanPham['gia_san_pham'] ?>đ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            <?php foreach($listSanPhamA as $sanPham ) {?>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                    <img src="<?= $sanPham['hinh_anh'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                    <h6><?= $sanPham['ten_san_pham'] ?></h6>
                                    <span><?= $sanPham['gia_san_pham'] ?>đ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm ưa thích</h4>
                        <div class="latest-product__slider owl-carousel">
                        <?php foreach($listSanPhamB as $sanPham ) {?>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= $sanPham['hinh_anh'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $sanPham['ten_san_pham'] ?></h6>
                                        <span><?= $sanPham['gia_san_pham'] ?>đ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            <?php foreach($listSanPhamB as $sanPham ) {?>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                    <img src="<?= $sanPham['hinh_anh'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                    <h6><?= $sanPham['ten_san_pham'] ?></h6>
                                    <span><?= $sanPham['gia_san_pham'] ?>đ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                        <?php foreach($listSanPhamC as $sanPham ) {?>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= $sanPham['hinh_anh'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $sanPham['ten_san_pham'] ?></h6>
                                        <span><?= $sanPham['gia_san_pham'] ?>đ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                            <?php foreach($listSanPhamC as $sanPham ) {?>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                    <img src="<?= $sanPham['hinh_anh'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                    <h6><?= $sanPham['ten_san_pham'] ?></h6>
                                    <span><?= $sanPham['gia_san_pham'] ?>đ</span>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
  
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php require_once './views/layouts/footer.php' ?>


</body>

</html>