<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';


// Require toàn bộ file Models
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

// if($_GET['act']){
//     $act = $_GET['act'];
// }else{
//     $act = '/';
// }


match ($act) {
    // Route Danh mục
        'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
        'form-add-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
        'add-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
        'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
        'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
        'xoa-danh-muc' => (new AdminDanhMucConTroller())->deleteDanhMuc(),

    // Route sản phẩm
    'san-pham' => (new AdminSanPhamConTroller())->danhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamConTroller())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamConTroller())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamConTroller())->postEditSanPham(),
    'xoa-san-pham' => (new AdminSanPhamConTroller())->deleteSanPham(),
    'chi-tiet-san-pham' => (new AdminSanPhamConTroller())->infoSanPham(),

};