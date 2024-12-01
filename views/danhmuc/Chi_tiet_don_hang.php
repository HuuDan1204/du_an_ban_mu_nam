<?php require_once './views/layouts/header.php' ?>

<!-- Header Section End -->
<?php require_once './views/layouts/navbar.php' ?>
</div>
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

    // Nhận ID từ URL
    $order_id = $_GET['id'] ?? null;

    if ($order_id) {
        // Truy vấn chi tiết đơn hàng
        $sql_order = "SELECT * FROM don_hangs WHERE id = :id";
        $stmt_order = $pdo->prepare($sql_order);
        $stmt_order->execute(['id' => $order_id]);
        $order = $stmt_order->fetch();

        // Truy vấn các sản phẩm trong đơn hàng
        $sql_items = "SELECT * FROM chi_tiet_don_hangs WHERE don_hang_id = :id";
        $stmt_items = $pdo->prepare($sql_items);
        $stmt_items->execute(['id' => $order_id]);
        $order_items = $stmt_items->fetchAll();
    } else {
        die("Không tìm thấy ID đơn hàng.");
    }
} catch (PDOException $e) {
    die("Lỗi kết nối database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h2, h3 {
            text-align: center;
            margin-top: 20px;
        }

        p {
            text-align: center;
            font-size: 16px;
            margin-bottom: 15px;
        }

     
        .container {
           
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #fff;
        }

        td[colspan="5"] {
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        

        <?php if (!empty($order)): ?>
            <h3 style="color:coral">THÔNG TIN ĐƠN HÀNG</h3>
            <table>
                <thead>
                    <tr>
                     <th>MÃ ĐƠN HÀNG</th>
                     <th>NGÀY ĐẶT</th>
                     <th>SDT</th>
                     <th>ĐỊA CHỈ</th>
                     <th>TÊN NGƯỜI NHẬN</th>
                     <th>TỔNG TIỀN</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
            <td><?= htmlspecialchars($order['ma_don_hang']) ?></td>
            <td><?= htmlspecialchars($order['ngay_dat']) ?></td>
            <td><?= htmlspecialchars($order['sdt_nguoi_nhan']) ?></td>
            <td><?= htmlspecialchars($order['dia_chi_nguoi_nhan']) ?></td>
            <td> <?= htmlspecialchars($order['ten_nguoi_nhan']) ?></td>
           <td> <?= htmlspecialchars($order['tong_tien']) ?> VNĐ</td>
                </tr>
        </tbody>
        </table>
            <h3 style="color:coral">THÔNG TIN SẢN PHẨM TRONG ĐƠN HÀNG</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID đơn hàng</th>
                        <th>ID Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($order_items)): ?>
                        <?php foreach ($order_items as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['id']) ?></td>
                                <td><?= htmlspecialchars($item['san_pham_id']) ?></td>
                                <td><?= htmlspecialchars($item['so_luong']) ?></td>
                                <td><?= htmlspecialchars($item['don_gia']) ?> VNĐ</td>
                                <td><?= htmlspecialchars($item['thanh_tien']) ?> VNĐ</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Không có sản phẩm nào trong đơn hàng này.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Không tìm thấy thông tin đơn hàng.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<!-- Footer Section Begin -->
<?php require_once './views/layouts/footer.php' ?>
