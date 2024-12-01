<?php require_once './views/layouts/header.php' ?>

<!-- Header Section End -->
<?php require_once './views/layouts/navbar.php' ?>
</div>
<!-- Hero Section Begin -->
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->

<!--  -->

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
        

        <?php if (!empty($donHangs)): ?>
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
            <td><?= htmlspecialchars($donHangs['ma_don_hang']) ?></td>
            <td><?= htmlspecialchars($donHangs['ngay_dat']) ?></td>
            <td><?= htmlspecialchars($donHangs['sdt_nguoi_nhan']) ?></td>
            <td><?= htmlspecialchars($donHangs['dia_chi_nguoi_nhan']) ?></td>
            <td> <?= htmlspecialchars($donHangs['ten_nguoi_nhan']) ?></td>
           <td> <?= htmlspecialchars($donHangs['tong_tien']) ?> VNĐ</td>
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
                    <?php if (!empty($donHangs)): ?>
                        <?php foreach ($donHangs as $item): ?>
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
