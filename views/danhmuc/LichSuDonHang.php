<?php require_once './views/layouts/header.php' ?>

    <!-- Header Section End -->
    <?php require_once './views/layouts/navbar.php' ?>
</div>
    <!-- Hero Section Begin -->

<!-- Hero Section Begin -->
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
<?php
// Kết nối database
$dsn = 'mysql:host=localhost;dbname=du_an_ban_mu_nam;charset=utf8';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    // Truy vấn lấy dữ liệu đơn hàng
    $sql = "SELECT * FROM don_hangs";
    $stmt = $pdo->query($sql);
    $orders = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Lỗi kết nối database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử Đơn Hàng</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Lịch sử Đơn Hàng</h2>
    <table border= 1>
        <thead>
            <tr>
                <th>ID</th>
                <th>MÃ ĐƠN HÀNG</th>
                <th>Tên Khách Hàng</th>
                <th>Tổng Tiền</th>  
               <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['id'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($order['ma_don_hang'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($order['ten_nguoi_nhan'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($order['tong_tien'] ?? 'N/A') ?></td>
                        <td>
    <a href="<?= BASE_URL . '?act=chi-tiet-don-hang&id=' . $order['id'] ?>" class="btn btn-danger">Xem chi tiết</a>
</td>
    
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
<!-- Footer Section Begin -->
<?php require_once './views/layouts/footer.php' ?>