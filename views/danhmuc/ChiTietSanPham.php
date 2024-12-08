<?php require_once './views/layouts/header.php' ?>

    <!-- Header Section End -->

    <!-- Hero Section Begin -->
  
    <!-- Hero Section End -->
    <?php require_once './views/layouts/navbar.php' ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="./assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?= $listSanPham['hinh_anh'] ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php foreach($listAnhSanPham as $key=>$item) {?>
                          <div class="<?= $item[$key] == 0 ? 'active' : '' ?>" ><img data-imgbigurl="<?= $item['link_hinh_anh'] ?>" src="<?= $item['link_hinh_anh'] ?>" alt=""></div>
                                <?php } ?>
                        </div>
                    </div>      
                </div>
                <div class="col-lg-6 col-md-6">
               
                    <div class="product__details__text">
                       <h3><?= $listSanPham['ten_san_pham'] ?></h3>
                        <div class="product__details__price"><?=  number_format($listSanPham['gia_san_pham'],0,',','.')  ?>VND</div>
                        <p><?= $listSanPham['mo_ta'] ?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="<?= BASE_URL . '?act=them-gio-hang&id_san_pham='.$listSanPham['id'] ?>" class="primary-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Số lượng</b><span><?= $listSanPham['so_luong'] ?></span></li>
                            <li><b>Trạng thái</b> <span><?= ($listSanPham['so_luong'] > 0) ? 'Còn Hàng' : 'Hết hàng' ?></span></li>

                            <!-- <li><b>Weight</b> <span>0.5 kg</span></li> -->
                            <li><b>Chia sẻ với</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                      
                    </div>
                   
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Bình Luận ( <span id="resetReviews">
                                    <?php
                                     $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");

                                    if ($conn->connect_error) {
                                        die("Kết nối thất bại: " . $conn->connect_error);
                                    }

                                    $id_san_pham = isset($_GET['id_san_pham']) ? (int)$_GET['id_san_pham'] : 0;
                                    $sql = "SELECT * FROM `binh_luans` WHERE `san_pham_id` = ? AND `trang_thai` = 1  ORDER BY `noi_dung` DESC, `ngay_dang` DESC";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $id_san_pham);
                                
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        echo($result->num_rows);
                                    } else {
                                        echo("0");
                                    }
                                    $conn->close();
                                    ?>
                                    </span> )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Đánh Giá</h6>
                                    
                                    <form id="commentForm" method="post">
                                    <div class="card">
                                    <div class="card-header">
                                    <h6>Đánh Giá</h6>
                                    </div>
                                     <div class="card-body">
                                        <div class="comment-item boder-top py-3">
                                        <form id="commentForm" method="post">
                                    <label>Nội Dung</label>
                                    <input type="text" name="ghichu" id="ghichu"  required>
                                    <button type="submit" class="btn btn-Success">Nhập</button>
                                        </div>
                                     </div>
                                   </div>
                                </form>
                                <div id="response"></div> 
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                
                                    <script>
                                    $(document).ready(function(){
                                        $('#commentForm').submit(function(event){
                                            event.preventDefault();

                                            var ghichu = $('#ghichu').val();
                                            if (ghichu === undefined || ghichu.trim() === "") {
                                                alert("Vui lòng nhập ghi chú.");
                                                return;
                                            }

                                            $.ajax({
                                                url: '',
                                                method: 'POST', 
                                                data: {ghichu: ghichu}, 
                                                success: function(response){
                                                    var today = new Date();
                                                    var formattedDate = today.getFullYear() + "-" + 
                                                    (today.getMonth() + 1).toString().padStart(2, '0') + 
                                                    "-" + today.getDate().toString().padStart(2, '0');
                                                    // $('#response').html(response); 
                                                    $('#ghichu').val('');  
                                                    var noiDung = ghichu;
                                                    var ngayDang = formattedDate;
                                                    var pElement = document.createElement('p');
                                                    pElement.innerHTML = '<strong>Nội dung:</strong> ' + noiDung + '<br><strong>Ngày đăng:</strong> ' + ngayDang;
                                                    document.getElementById('response').appendChild(pElement);

                                                    var resetReviews = document.getElementById('resetReviews').innerText;
                                                    resetReviews = parseInt(resetReviews)+1;
                                                    document.getElementById('resetReviews').innerText = resetReviews;
                                                    document.getElementById('NoBinhLuan').innerText = "";
                                                },
                                                error: function(xhr, status, error){
                                                    $('#response').html('Có lỗi xảy ra: ' + error);
                                                }
                                            });
                                        });
                                    });
                                    </script>
                                <?php
                                    $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");

                                    if ($conn->connect_error) {
                                        die("Kết nối thất bại: " . $conn->connect_error);
                                    }

                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        if (isset($_POST['ghichu']) && !empty(trim($_POST['ghichu']))) {
                                            $ghichu = trim($_POST['ghichu']);
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $currentDate = date("Y-m-d");
                                            $san_pham_id = isset($_GET['id_san_pham']) ? (int)$_GET['id_san_pham'] : 0;
                                            $tai_khoan_id = 1;
                                            $trang_thai = 1;

                                            $stmt = $conn->prepare("INSERT INTO `binh_luans`(`san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) 
                                                                VALUES (?, ?, ?, ?, ?)");
                                            $stmt->bind_param("iisss", $san_pham_id, $tai_khoan_id, $ghichu, $currentDate, $trang_thai);

                                            if ($stmt->execute()) {
                                            } else {
                                                echo "Lỗi: " . $stmt->error . "<br>";
                                                echo "Mã lỗi: " . $stmt->errno . "<br>";
                                            }
                                            $stmt->close();
                                        } else {
                                            echo "Vui lòng nhập ghi chú.";
                                        }
                                        $conn->close();
                                    }
                                    ?>
                                </div>

                                <div class="ghichu">
                                <?php
                                     $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");

                                    if ($conn->connect_error) {
                                        die("Kết nối thất bại: " . $conn->connect_error);
                                    }

                                    $id_san_pham = isset($_GET['id_san_pham']) ? (int)$_GET['id_san_pham'] : 0;
                                    $sql = "SELECT * FROM `binh_luans` WHERE `san_pham_id` = ? AND `trang_thai` = 1  ORDER BY `noi_dung` DESC, `ngay_dang` DESC";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $id_san_pham);
                                
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<p  ><strong>Nội dung:</strong> " . $row['noi_dung'] . "<br><strong>Ngày đăng:</strong> " . $row['ngay_dang'] . "</p>";
                                        }
                                    } else {
                                        echo "<div id='NoBinhLuan'>Không có bình luận nào.</div>";
                                    }
                                    $conn->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($listTop4SanPham as $sanpham) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='.$sanpham['id'] ?>"><img src="<?= $sanpham['hinh_anh'] ?>" alt=""></a>
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?= $sanpham['ten_san_pham'] ?></a></h6>
                            <h5><?= number_format($sanpham['gia_san_pham'], 0 , ',' , '.'  ) ?>VND</h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <?php require_once './views/layouts/footer.php' ?>
    </div>

</body>

</html>