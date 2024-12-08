<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <?php foreach($listDanhMuc as $item ) {?>
                        <ul>
                        <a href="<?= BASE_URL.'?act=tim-kiem-danh-muc&danh_muc_id='.$item['id'] ?>" class="nav-item nav-link"><?= $item['ten_danh_muc'] ?></a>
                            
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="<?= BASE_URL . '?act=tim-kiem-san-pham' ?>" method="post" >
                                <input type="text" placeholder="Bạn muốn tìm kiếm gì?" name="search" >
                                <button type="submit" class="site-btn"  >TÌm kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 395 069 694</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="./uploads/banner.png">
                        <div class="hero__text"  >
                          <br>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

?>
    