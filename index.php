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
require_once './models/GioHang.php';
require_once './models/ThanhToan.php';
require_once './models/DonHang.php';
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
     'chi-tiet-san-pham' => (new HomeController ()) ->chiTietSanPham(),
     'tim-kiem-san-pham' => (new HomeController ()) ->timkiemsanpham(),
     'bai-viet'  => (new HomeController ()) ->baiviet(),
     'tim-kiem-danh-muc' =>(new HomeController())->timKiemDanhMuc(),
 
     
     //thanh toán
     'thanh-toan' => (new HomeController())->thanhToan(),
     'post-thanh-toan' => (new HomeController())->postThanhToan(),
      'xu-li-thanh-toan' => (new HomeController())-> xulithanhtoan(),
      'thanh-toan-atm' => (new HomeController())->thanhtoanatm(),

    // đơn hàng
      'lich-su-don-hang' => (new HomeController())->lichsudonhang(),
      'chi-tiet-don-hang' => (new HomeController())-> chitietdonhang(),
      'huy-don-dang' => (new HomeController())-> huyDonHang(),

    // Đăng nhập
      'login' => (new HomeController())->formLogin(),
      'check-login' => (new HomeController())->login(),
      'logout-admin' => (new HomeController())->logout(),
      'logout-user' => (new HomeController())->logoutUser(),

    // thông tin cá nhân
      'thong-tin-ca-nhan' => (new HomeController())->infoUser(),
      'cap-nhat-thong-tin-ca-nhan' => (new HomeController())->capNhatThongTin(),

    // Đăng kí
    'sign-up' => (new HomeController())->formSignUp(),
    'check-sign-up' =>(new HomeController()) ->signUp(),

    // giỏ hàng
    'gio-hang' =>(new HomeController()) ->gioHang(),
    'them-gio-hang' =>(new HomeController())->addGioHang(),
    'tang-san-pham' =>(new HomeController())->tangSanPham(),
    'giam-san-pham' =>(new HomeController())->giamSanPham(),
    'delete-san-pham' =>(new HomeController())->xoaSanPham(),
    'xoa-nhieu-san-pham' =>(new HomeController())->xoaNhieuSanPham(),
        

   
};
