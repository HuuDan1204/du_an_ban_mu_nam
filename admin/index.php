<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminTaiKhoanController.php';




// Require toàn bộ file Models
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminTaiKhoan.php';


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

    // Route đơn hàng
    'don-hang' => (new AdminDonHangConTroller())->danhSachDonHang(),
    'form-sua-don-hang' => (new AdminDonHangConTroller())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangConTroller())->postEditDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangConTroller())->infoDonHang(),


    // route tài khoản
      'list-tai-khoan-quan-tri-vien' => (new AdminTaiKhoanController())->danhSachQuanTri(),
      'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
      'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
      'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
      'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),

      'reset-password' => (new AdminTaiKhoanController())->resetPassword(),

      'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
      'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
      'sua-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
      'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->infoKhachHang(),
      
      'form-sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->formEditCaNhanQT(),
        // 'sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditCaNhanQT(),
        'sua-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditMatKhauCaNhan(),


        // route đăng nhập
        'login-admin' => (new AdminTaiKhoanController())->formLogin(),
        'check-login-admin' => (new AdminTaiKhoanController())->login(),
        'logout-admin' => (new AdminTaiKhoanController())->logout(),

};