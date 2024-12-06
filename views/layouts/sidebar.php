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
                                <input type="text" placeholder="Bạn muốn tìm kiếm gì?" name="noidung1" >
                                <button type="submit" class="site-btn" name="btn" >TÌm kiếm</button>
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

    // Kiểm tra nếu người dùng đã gửi dữ liệu tìm kiếm
    if (isset($_POST['btn'])) {
        // Lấy dữ liệu tìm kiếm từ form
        $noidung = $_POST['noidung1'] ?? ''; 
        if (!empty($noidung)) {
            $noidung = "%" . $noidung . "%";
            
            // Truy vấn tìm kiếm
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :noidung1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':noidung1', $noidung, PDO::PARAM_STR);
            $stmt->execute();

            // Hiển thị kết quả tìm kiếm
            if ($stmt->rowCount() > 0) {
                echo "<div class='product-list'>";
                while ($row = $stmt->fetch()) {
                    echo "<div class='product-item'>";
                    echo "<div class='product-image'>";
                    echo "<img src='" . htmlspecialchars($row['hinh_anh']) . "' alt='" . htmlspecialchars($row['ten_san_pham']) . "'>";
                    echo "<div class='product-name'>" . htmlspecialchars($row['ten_san_pham']) . "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>Không tìm thấy sản phẩm nào.</p>";
            }
        } else {
            echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
        }
    }
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>
    