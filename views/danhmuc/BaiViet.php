
<?php 
require_once './views/layouts/header.php'; 
require_once './views/layouts/navbar.php'; 

// Kết nối cơ sở dữ liệu
$dsn = 'mysql:host=localhost;dbname=du_an_ban_mu_nam;charset=utf8';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    // Truy vấn lấy sản phẩm
    $sql = "SELECT * FROM san_phams LIMIT 3"; // Giới hạn 3 sản phẩm
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>
<style>
    .voucher-container {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 10px;
}

.voucher-container p {
    font-size: 14px;
    color: #333;
    margin: 5px 0;
}

.voucher-code {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
}

.voucher-code input {
    font-size: 14px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 5px 0 0 5px;
    padding: 10px;
    width: 150px;
    background-color: #f8f8f8;
    cursor: not-allowed;
}

.voucher-code button {
    font-size: 14px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 0 5px 5px 0;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.voucher-code button:hover {
    background-color: #0056b3;
}

</style>
<!-- Hero Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="./assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>The Moment You Need To Remove Garlic From The Menu</h2>
                    <ul>
                        <li>By Michael Scofield</li>
                        <li>January 14, 2019</li>
                        <li>8 Comments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
 
<section class="blog-details spad">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <h4>DANH MỤC</h4>
                        <ul>
                            <li><a href="#">All</a></li>
                            <li><a href="#">MŨ THỂ THAO (20)</a></li>
                            <li><a href="#">MŨ THỜI TRANG (5)</a></li>
                            <li><a href="#">MŨ ĐANG GIẢM GIÁ (9)</a></li>
                            <li><a href="#">MŨ ĐI BIỂN (10)</a></li>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Bài viết</h4>
                        <div class="blog__sidebar__recent">
                        <img src="./uploads/banner1.png" 
                        alt="<?= htmlspecialchars($products[0]['ten_san_pham'] ?? 'Default Image'); ?>">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>09 HAT OF KING<br /> Mũ đẹp mỗi ngày</h6>
                                    <span>DECEMEMBER 05, 2024</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                <img src="./uploads/banner.png" 
                                alt="<?= htmlspecialchars($products[0]['ten_san_pham'] ?? 'Default Image'); ?>">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>PHỐI ĐỒ SAO CHO CHUẨN<br />THỜI TRANG MỖI NGÀY</h6>
                                    <span>DECEMEMBER 05, 2024</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>4 LOẠI MŨ KHIẾN CÁC NÀNG ĐỔ GỤC <br />THỜI TRANG MỖI NGÀY</h6>
                                    <span>DECEMEMBER 05, 2024</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
    <h4>Voucher Giảm Giá</h4>
    <div class="voucher-container">
        <p>Giảm 30% cho mọi đơn hàng, tối đa 200.000 VND.</p>
        <p>Áp dụng cho đơn hàng từ 500.000 VND trở lên.</p>
        <p>Thời gian áp dụng: 1/12/2024 - 31/12/2024.</p>
        <div class="voucher-code">
            <input type="text" id="voucherCode" value="BLACKFRIDAY" readonly>
            <button onclick="copyCode()">Sao chép mã</button>
        </div>
    </div>
    <div class="voucher-container">
        <p>Giảm 5% cho mọi đơn hàng, tối đa 100.000 VND.</p>
        <p>Áp dụng cho đơn hàng từ 200.000 VND trở lên.</p>
        <p>Thời gian áp dụng: 1/12/2024 - 31/12/2024.</p>
        <div class="voucher-code">
            <input type="text" id="voucherCode" value="CAMONQUYKHACH" readonly>
            <button onclick="copyCode()">Sao chép mã</button>
        </div>
    </div>
</div>

                </div>
            </div>

            <!-- Nội dung chính -->
            <div class="col-lg-8 col-md-7">
                <div class="blog__details__text">
                    <img src="./uploads/banner3.webp" 
                         alt="<?= htmlspecialchars($products[0]['ten_san_pham'] ?? 'Default Image'); ?>">
                    <p>Hàng xóm kế bên căn hộ của Fujimiya Amane chính là nữ sinh xinh đẹp nhất trường...</p>
                    <h3>MUỐN MUA MŨ Ư????TỚI SILLY SHOP</h3>
                    <p>Hàng xóm kế bên căn hộ của Fujimiya Amane chính là nữ sinh xinh đẹp nhất trường cậu, Shiina Mahiru. Họ vốn chẳng có mối liên hệ nào cho đến một ngày mưa tầm tã, Amane tình nguyện đưa chiếc ô của mình cho cô bạn hàng xóm xinh đẹp tựa thiên thần, cả hai đã bắt đầu tương tác với nhau theo một cách kì quặc. Chẳng thể chịu được lối sinh hoạt cẩu thả khi sống một mình của Amane, Mahiru đã quyết định sẽ chăm sóc cậu từ những điều nhỏ nhất. Một Mahiru thiếu thốn sự gắn kết với gia đình đang dần mở lòng hơn, cùng với một Amane hay tự ti đang ngày một đổi thay theo chiều hướng tích cực. Khoảng cách giữa hai con người không chút thành thật ấy đang từng bước thu hẹp lại...
                    Fairy Tail (フェアリーテイル Fearī Teiru?) là một bộ manga của Nhật Bản do Mashima Hiro sáng tác và minh hoạ. Bộ truyện được đăng nhiều kỳ trên tạp chí Weekly Shōnen Magazine của Kodansha từ tháng 8 năm 2006 đến tháng 7 năm 2017, cùng từng chương được tổng hợp và xuất bản thành 63 tập tankōbon. Bộ truyện kể về cuộc phiêu lưu của Natsu Dragneel (thành viên của hội pháp sư nổi tiếng Fairy Tail), khi anh tìm kiếm con rồng Igneel ở thế giới Earth-land hư cấu. </p>
                </div>
                <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                    <img src="<?= !empty($products[0]['hinh_anh']) ? htmlspecialchars($products[0]['hinh_anh']) : 'img/default-image.jpg'; ?>" 
                                    alt="<?= htmlspecialchars($products[0]['ten_san_pham'] ?? 'Default Image'); ?>">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Michael Scofield</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> Food</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</section>

<!-- Related blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>TOP 3 Khuyến mãi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                               <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='.$product['id'] ?>"> <img src="<?= !empty($product['hinh_anh']) ? htmlspecialchars($product['hinh_anh']) : 'img/default-image.jpg'; ?>" 
                                     alt="<?= htmlspecialchars($product['ten_san_pham']); ?>"></a>
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> <?= date('M d, Y'); ?></li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="#"><?= htmlspecialchars($product['ten_san_pham']); ?></a></h5>
                                     <?= htmlspecialchars($product['ten_san_pham']); ?> 
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có sản phẩm nào để hiển thị.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<script>
    function copyCode() {
    const code = document.getElementById("voucherCode");
    code.select();
    code.setSelectionRange(0, 99999); 
    navigator.clipboard.writeText(code.value);
    alert("Đã sao chép mã: " + code.value);
}

</script>

<?php require_once './views/layouts/footer.php'; ?>
