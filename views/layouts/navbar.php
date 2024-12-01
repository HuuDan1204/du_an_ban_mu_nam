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
        $noidung = $_POST['noidung'] ?? ''; 
        if (!empty($noidung)) {
            
            $noidung = "%" . $noidung . "%";
            
            // Truy vấn tìm kiếm
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :noidung";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':noidung', $noidung, PDO::PARAM_STR);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm sản phẩm</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Thêm đường dẫn đến file CSS của bạn -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* CSS cho phần hiển thị kết quả tìm kiếm */
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .product-item {
            border: 1px solid #ddd;
            width: 200px;
            text-align: center;
            position: relative;
            background-color: #fff;
        }

        .product-image {
            position: relative;
            width: 100%;
            height: 250px; 
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }

        .product-name {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.6); 
            color: white;
            font-size: 14px;
            text-align: center;
        }

        .product-item p {
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Phần tìm kiếm -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span> Danh mục </span>
                    </div>
                    <ul>
                    <?php foreach($listDanhMuc as $danhmuc ) { ?>
                        <li><a href="#"><?= $danhmuc['ten_danh_muc']; ?></a></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form method="post">
                            <div class="hero__search__categories">
                                Danh mục
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="Bạn muốn tìm kiếm gì?" name="noidung">
                            <button type="submit" class="site-btn" name="btn">Tìm kiếm</button>
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
            </div>
        </div>
    </div>
</section>

<!-- Hiển thị kết quả tìm kiếm chỉ khi người dùng đã tìm kiếm -->
<?php
// Kiểm tra nếu có kết quả tìm kiếm và nút tìm kiếm đã được nhấn
if (isset($_POST['btn']) && isset($stmt) && $stmt->rowCount() > 0) {
    echo "<div class='product-list'>";
    while ($row = $stmt->fetch()) {
        $product_id = $row['id']; // Lấy ID sản phẩm
        echo "<div class='product-item'>";
        // Thêm liên kết đến trang chi tiết sản phẩm
        echo "<a href='" . BASE_URL . "?act=chi-tiet-san-pham&id=$product_id'>"; // Thay 'product_details.php' bằng tên trang chi tiết của bạn
        echo "<div class='product-image'>";
        echo "<img src='" . htmlspecialchars($row['hinh_anh']) . "' alt='" . htmlspecialchars($row['ten_san_pham']) . "'>";
        echo "<div class='product-name'>" . htmlspecialchars($row['ten_san_pham']) . "</div>";
        echo "</div>";
        echo "</a>"; // Đóng liên kết
        echo "</div>";
    }
    echo "</div>";
} elseif (isset($_POST['btn']) && empty($noidung)) {
    echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
} elseif (isset($_POST['btn']) && $stmt->rowCount() == 0) {
    echo "<p>Không tìm thấy sản phẩm nào.</p>";
}
?>

</body>
</html>
