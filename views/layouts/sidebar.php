<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <?php foreach($listDanhMuc as $danhMuc ) {?>
                        <ul>
                            <li><a href="#"><?= $danhMuc['ten_danh_muc'];  ?></a></li>
                            
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Tất cả danh mục
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Bạn muốn tìm kiếm gì?">
                                <button type="submit" class="site-btn">TÌm kiếm</button>
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
                    <div class="hero__item set-bg" data-setbg="./uploads/1731568019anh3.jpg">
                        <div class="hero__text"  >
                            <span style="color:white ; ">FRUIT FRESH</span>
                            <h2 style="color:white ; " >Vegetable <br />100% Organic</h2>
                            <p style="color:white ; " >Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    