<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Silly Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">

    <style>
        /* Cấu hình cơ bản cho menu */
.user-menu {
    position: relative;
    display: inline-block;
}

/* Style cho dropdown menu (ẩn mặc định) */
.user-menu__dropdown {
    display: none;
    position: absolute;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    min-width: 160px;
    z-index: 1000;
}

/* Style cho các item trong dropdown */
.user-menu__dropdown li {
    padding: 10px;
    list-style: none;
}

.user-menu__dropdown li a {
    color: #333;
    text-decoration: none;
    display: block;
}

/* Chỉnh style cho item khi hover */
.user-menu__dropdown li a:hover {
    background-color: #f1f1f1;
}

/* Hiển thị dropdown khi hover vào .user-menu */
.user-menu:hover .user-menu__dropdown {
    display: block;
}

    </style>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> iamvuahaitac1@gmail.com</li>
                                <li>Miễn phí ship trong bán kính 3km </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/profile.php?id=61567181994392"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="./assets/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Tiếng Việt</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
    <?php if (isset($_SESSION['user'])): ?>
        <!-- Nếu người dùng đã đăng nhập, hiển thị "Xin chào" và dropdown menu -->
        <div class="user-menu">
            <a href="<?= BASE_URL . '?act=thong-tin-ca-nhan' ?>"><i class="fa fa-user"></i> Xin chào, <?= $_SESSION['user']['name']  ?></a>
            <ul class="user-menu__dropdown">
                <li><a href="<?= BASE_URL . '?act=thong-tin-ca-nhan' ?>">Xem thông tin cá nhân</a></li>
                <li><a href="<?= BASE_URL .'?act=lich-su-don-hang' ?>">Lịch sử đơn hàng</a></li>
                <li><a href="<?= BASE_URL . '?act=logout-user' ?>">Đăng xuất</a></li>
                
                <?php if (isset($_SESSION['user']['chuc_vu_id']) && $_SESSION['user']['chuc_vu_id'] == 1): ?>
                    <!-- Nếu là quản trị viên (chuc_vu_id = 1), hiển thị thêm nút vào quản trị -->
                    <li><a href="<?= BASE_URL_ADMIN ?>">Vào quản trị</a></li>
                <?php endif; ?>
            </ul>
        </div>
    <?php else: ?>
        <!-- Nếu chưa đăng nhập, hiển thị nút Login -->
        <a href="<?= BASE_URL .'?act=login' ?>"><i class="fa fa-user"></i> Đăng nhập</a>
    <?php endif; ?>
</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href=".<?= BASE_URL ?>"><img src="./uploads/logo.png" width="100px" height="100px" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li ><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                            <li><a href="<?= BASE_URL .'?act=san-pham' ?>">Sản phẩm</a></li>
                            
                            <li><a href="<?= BASE_URL .'?act=bai-viet' ?>">Bài viết</a></li>
                           
                            <li><a href="<?= BASE_URL .'?act=thanh-toan' ?>">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="<?= BASE_URL . '?act=gio-hang'  ?>"><i class="fa fa-shopping-bag"></i> <span></span></a></li>
                        </ul>
                       
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>