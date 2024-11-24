<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';


// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/DanhMucClient.php';
require_once './models/TaiKhoan.php';
require_once './admin/models/AdminSanPham.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

// if($_GET['act']){
//     $act = $_GET['act'];
// }else{
//     $act = '/';
// }


match ($act) {
    // Trang chủ
    '/' => (new HomeController ()) ->trangChu(), 
    'san-pham' => (new HomeController ()) ->danhSachSanPham(), 



    // Đăng nhập
    'login' => (new HomeController())->formLogin(),
    'check-login-admin' => (new HomeController())->login(),
    'logout-admin' => (new HomeController())->logout(),

    
    

};
