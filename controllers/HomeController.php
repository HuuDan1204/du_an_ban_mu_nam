<?php 

class HomeController
{   
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;
    public $modelGioHang ;
    public $modelThanhToan ;
    public function __construct(){
       $this->modelSanPham = new SanPham();
       $this->modelDanhMuc = new AdminDanhMuc();
       $this->modelTaiKhoan = new TaiKhoan();
       $this->modelGioHang = new GioHang();
       $this->modelThanhToan = new ThanhToan();

    }
       
        public function trangChu(){
            // echo "Danh sach san pham";
            $listSanPham = $this ->modelSanPham->getAllSanPham();
            $listDanhMuc = $this ->modelDanhMuc->getAllDanhMuc();
            $listSanPhamFT = $this ->modelSanPham->getSanPhamNew();
            $listSanPhamA = $this->modelSanPham->getSanPhamA();
            $listSanPhamB = $this->modelSanPham->getSanPhamB();
            $listSanPhamC = $this->modelSanPham->getSanPhamC();
            // var_dump($listSanPham);die();
            require_once './views/danhmuc/home.php';
        }

        public function formLogin()
        {
          require_once './views/auth/formLogin.php';
          deleteSessionError();
        }
      
        public function login() {
          $error = "";
      
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $email = $_POST['email'] ?? '';
              $mat_khau = $_POST['mat_khau'] ?? '';
      
              if (empty($email)) {
                  $error = "Email không được để trống!";
                  $this->showError($error);
                  return;
              }
              if (empty($mat_khau)) {
                  $error = "Mật khẩu không được để trống!";
                  $this->showError($error);
                  return;
              }
              
              
              
              $data_user = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
      
              if (!$data_user) {
                  $error = "Email không tồn tại!";
                  $this->showError($error);
                  return;
              }
      
              $mat_khau_database = $data_user['mat_khau'] ?? '';
      
              if (!password_verify($mat_khau, $mat_khau_database)) {
                  $error = "Sai mật khẩu!";
                  $this->showError($error);
                  return;
              }
              $_SESSION['user'] = [
                'id' => $data_user['id'],
                'email' => $data_user['email'],
                'name' => $data_user['ho_ten'],
                'chuc_vu_id' => $data_user['chuc_vu_id'],
                
            ];
      
              switch ($data_user['chuc_vu_id']) {
                  case 1:
                      header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                      exit();
                  case 2:
                      header("Location: " . BASE_URL);
                      exit();
                  default:
                      $error = "Không xác định được quyền của tài khoản!";
                      $this->showError($error);
                      return;
              }
          } else {
              $error = "Phương thức không hợp lệ!";
              $this->showError($error);
          }
          // Kiểm tra đăng nhập thành công


      }
      
      public function showError($error){
          require_once './views/auth/formLogin.php';
      }
        public function formSignUp(){
          require_once './views/auth/formLogin.php';
          deleteSessionError();
        }
        public function signUp()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ho_ten = $_POST['ho_ten'] ?? '';
                $email = $_POST['email'] ?? '';
                $dia_chi = $_POST['dia_chi'] ?? '';
                $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
                $mat_khau = $_POST['mat_khau'] ?? '';
                $re_mat_khau = $_POST['re_mat_khau'] ?? '';
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $chuc_vu_id = 2;
        
                $error = [];
        
                if (empty($ho_ten)) {
                    $error['ho_ten'] = 'Họ tên không được bỏ trống';
                }
                if (empty($email)) {
                    $error['email'] = 'Email không được bỏ trống';
                }
                if (empty($dia_chi)) {
                    $error['dia_chi'] = 'Địa chỉ không được bỏ trống';
                }
                if (empty($so_dien_thoai)) {
                    $error['so_dien_thoai'] = 'Số điện thoại không được bỏ trống';
                }
                if (empty($gioi_tinh)) {
                    $error['gioi_tinh'] = 'Giới tính không được bỏ trống';
                }
                if (empty($mat_khau)) {
                    $error['mat_khau'] = 'Mật khẩu không được bỏ trống';
                }
                if ($mat_khau !== $re_mat_khau) {
                    $error['re_mat_khau'] = 'Mật khẩu nhập lại không khớp với mật khẩu!';
                }
                // var_dump($error);die;
                
                if (!empty($error)) {
                    $_SESSION['error'] = $error;
                    header("Location: " . BASE_URL . '?act=sign-up'); 
                    exit();
                }
                
                $hashedPassword = password_hash($mat_khau, PASSWORD_BCRYPT);
                $result = $this->modelTaiKhoan->insertUser($chuc_vu_id, $ho_ten, $email, $dia_chi, $so_dien_thoai, $hashedPassword, $gioi_tinh);
        
                if ($result) {
                  $_SESSION['success'] = 'Đăng ký thành công! Bạn có thể đăng nhập ngay.';
                  header("Location: " . BASE_URL . '?act=login'); 
                  exit();
              } else {
                  $_SESSION['error'] = ['db_error' => 'Đã xảy ra lỗi trong quá trình xử lý, vui lòng thử lại!'];
                  header("Location: " . BASE_URL . '?act=sign-up');
                  exit();
              }
              
            }
        }
        
      
        public function logout(){
          if(isset($_SESSION['user_admin'])){
             unset($_SESSION['user_admin']);
             header("location ".BASE_URL.'?act=login' );
          }
      }

      public function danhSachSanPham(){
            $listSanPham = $this ->modelSanPham->getAllSanPham();
            $listDanhMuc = $this ->modelDanhMuc->getAllDanhMuc();
            $listSanPhamFT = $this ->modelSanPham->getSanPhamNew();
            $listSanPhamLast = $this ->modelSanPham->getSanPhamLast();
            $listSanPhamSale = $this->modelSanPham->getSanPhamSale();
            $listSanPhamA = $this->modelSanPham->getSanPhamA();
            $listSanPhamB = $this->modelSanPham->getSanPhamB();
            $listSanPhamC = $this->modelSanPham->getSanPhamC();
            

        require_once './views/danhmuc/SanPham.php';
      }

      public function chiTietSanPham(){
        $id_san_pham = $_GET['id_san_pham'];
        $listSanPham = $this->modelSanPham->getDetail($id_san_pham);
        $listAnhSanPham = $this->modelSanPham->getListHinhAnh($id_san_pham);
        $listTop4SanPham = $this->modelSanPham->getTop4SanPham();
        require_once './views/danhmuc/ChiTietSanPham.php';
      }

      public function logoutUser(){
              session_unset();
              session_destroy();
              header("Location: " . BASE_URL);
              exit();
      }
      public function thanhToan() {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $user_id = $_SESSION['user']['id'];
        $taiKhoan = $this->modelTaiKhoan->getTaiKhoan($user_id);
        $gioHang = $this->modelGioHang->getGioHang($user_id);
        // var_dump($gioHang);die;
        $phuongThucThanhToan = $this->modelThanhToan->getAllThanhToan();
        $tong_tien = 0;
            $giam_gia = 0;
            $tien_giam = 0;
            $tong_thanh_toan = 0;
            $ma_voucher_ap_dung = null;
    
            // Tính tổng tiền từ giỏ hàng
            foreach ($gioHang as $item) {
                $gia = $item['gia_khuyen_mai'] != 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                $tong_tien += $gia * $item['so_luong'];
            }
    
            // Kiểm tra nếu người dùng áp dụng voucher
            if (isset($_POST['ma_voucher'])) {
                $ma_voucher = $_POST['ma_voucher'];
    
                // Kiểm tra voucher trong cơ sở dữ liệu
                $voucher = $this->modelGioHang->getVoucher($ma_voucher);
    
                if ($voucher) {
                    // Kiểm tra ngày áp dụng
                    if (strtotime($voucher['day_start']) <= time() && strtotime($voucher['day_end']) >= time()) {
                        // Kiểm tra giá trị đơn hàng tối thiểu
                        if ($tong_tien >= $voucher['giam_toi_thieu']) {
                            $giam_gia = $voucher['giam_gia']; // Lấy % giảm giá
    
                            // Nếu giảm giá là phần trăm (0 - 1), tính lại giá trị giảm
                            if ($giam_gia < 1) {
                                $tien_giam = $tong_tien * $giam_gia; // Tính số tiền giảm
                            } else {
                                $tien_giam = $giam_gia; // Giảm giá cố định
                            }
    
                            // Kiểm tra giá trị giảm tối đa
                            if ($tien_giam > $voucher['giam_toi_da']) {
                                $tien_giam = $voucher['giam_toi_da']; // Giới hạn giảm giá
                            }
    
                            // Lưu mã voucher vào session
                            $_SESSION['voucher'] = $ma_voucher;
    
                            $ma_voucher_ap_dung = $ma_voucher; // Lưu mã voucher đã áp dụng
                        } else {
                            echo "<script>alert('Đơn hàng không đủ điều kiện để áp dụng voucher này.');</script>";
                        }
                    } else {
                        echo "<script>alert('Voucher đã hết hạn hoặc không hợp lệ.');</script>";
                    }
                } else {
                    echo "<script>alert('Mã voucher không hợp lệ.');</script>";
                }
            }
    
            // Tính tổng thanh toán
            $tong_thanh_toan = $tong_tien - $tien_giam;
        if(!empty($gioHang)){
            require_once './views/danhmuc/ThanhToan.php'; 
        }
        else{
            echo "<script>
            alert('Giỏ hàng trống vui lòng thêm sản phẩm để tiếp tục chức năng!');
            window.location.href = '?act=gio-hang';
                     </script>";
        }
    }
    
<<<<<<< HEAD
    // public function postThanhToan()
    // {
    //         $user_id = $_SESSION['user']['id'];
    //         // $ma_don_hang = $this->modelThanhToan->getMaDonHang();

    //         if($ma_don_hang){
    //             $a = $ma_don_hang;
    //             $ma_hang = $a['ten_ma'];
    //         }
    //         else{
    //             die("Không tìm thấy");
    //         }
            

    //         // Nếu giỏ hàng rỗng, chuyển hướng về trang giỏ hàng
    //         if (empty($gioHang)) {
    //             echo "<script> 
    //         alert('Vui lòng thêm sản phẩm vào giỏ hàng!');
    //         window.location.href = '?act=gio-hang';
    //         </script>";
    //         } else {
    //             // Gửi dữ liệu đến view
    //             require_once './views/TrangThanhToan.php';
    //         }

    // }
=======
    public function postThanhToan()
    {
            $user_id = $_SESSION['user']['id'];
            $ma_don_hang = $this->modelThanhToan->getMaDonHang();

            if($ma_don_hang){
                $a = $ma_don_hang;
                $ma_hang = $a['ten_ma'];
            }
            else{
                die("Không tìm thấy");
            }
            

            // Nếu giỏ hàng rỗng, chuyển hướng về trang giỏ hàng
            if (empty($gioHang)) {
                echo "<script> 
            alert('Vui lòng thêm sản phẩm vào giỏ hàng!');
            window.location.href = '?act=gio-hang';
            </script>";
            } else {
                // Gửi dữ liệu đến view
                require_once './views/TrangThanhToan.php';
            }

    }
>>>>>>> d5101fd9a9013e615e31ea0ac00701fdea2d479c

    public function xulithanhtoan() {
        require_once './views/danhmuc/xulithanhtoan_momo.php'; 
    }

    public function thanhtoanatm() {
        require_once './views/danhmuc/thanhtoan_atm.php'; 
    }
<<<<<<< HEAD
    
    public function lichsudonhang() {
        require_once './views/danhmuc/LichSuDonHang.php'; 
    }
    
    public function chitietdonhang() {
        require_once './views/danhmuc/ChiTietDonHang.php'; 
    }
    public function timkiemsanpham() {
        require_once './views/layouts/TimKiem.php'; 
    }
    public function baiviet() {
        require_once './views/danhmuc/BaiViet.php'; 
    }
=======
       
>>>>>>> d5101fd9a9013e615e31ea0ac00701fdea2d479c
    public function gioHang(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    
        if (!isset($_SESSION['user'])) {
            echo "<script>
                alert('Vui lòng đăng nhập để sử dụng giỏ hàng!');
                window.location.href = '?act=login';
            </script>";
        } else {
            $user_id = $_SESSION['user']['id'];
            $gioHang = $this->modelGioHang->getGioHang($user_id);
    
            // Khởi tạo các biến
            $tong_tien = 0;
            $giam_gia = 0;
            $tien_giam = 0;
            $tong_thanh_toan = 0;
            $ma_voucher_ap_dung = null;
    
            // Tính tổng tiền từ giỏ hàng
            foreach ($gioHang as $item) {
                $gia = $item['gia_khuyen_mai'] != 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                $tong_tien += $gia * $item['so_luong'];
            }
    
            // Kiểm tra nếu người dùng áp dụng voucher
            if (isset($_POST['ma_voucher'])) {
                $ma_voucher = $_POST['ma_voucher'];
    
                // Kiểm tra voucher trong cơ sở dữ liệu
                $voucher = $this->modelGioHang->getVoucher($ma_voucher);
    
                if ($voucher) {
                    // Kiểm tra ngày áp dụng
                    if (strtotime($voucher['day_start']) <= time() && strtotime($voucher['day_end']) >= time()) {
                        // Kiểm tra giá trị đơn hàng tối thiểu
                        if ($tong_tien >= $voucher['giam_toi_thieu']) {
                            $giam_gia = $voucher['giam_gia']; // Lấy % giảm giá
    
                            // Nếu giảm giá là phần trăm (0 - 1), tính lại giá trị giảm
                            if ($giam_gia < 1) {
                                $tien_giam = $tong_tien * $giam_gia; // Tính số tiền giảm
                            } else {
                                $tien_giam = $giam_gia; // Giảm giá cố định
                            }
    
                            // Kiểm tra giá trị giảm tối đa
                            if ($tien_giam > $voucher['giam_toi_da']) {
                                $tien_giam = $voucher['giam_toi_da']; // Giới hạn giảm giá
                            }
    
                            // Lưu mã voucher vào session
                            $_SESSION['voucher'] = $ma_voucher;
    
                            $ma_voucher_ap_dung = $ma_voucher; // Lưu mã voucher đã áp dụng
                        } else {
                            echo "<script>alert('Đơn hàng không đủ điều kiện để áp dụng voucher này.');</script>";
                        }
                    } else {
                        echo "<script>alert('Voucher đã hết hạn hoặc không hợp lệ.');</script>";
                    }
                } else {
                    echo "<script>alert('Mã voucher không hợp lệ.');</script>";
                }
            }
    
            // Tính tổng thanh toán
            $tong_thanh_toan = $tong_tien - $tien_giam;
    
            // Hiển thị giỏ hàng
            require_once './views/danhmuc/GioHang.php';
        }
    }
    
      public function addGioHang(){
        if (!isset($_SESSION['user'])) {
            echo "<script>
        alert('Vui lòng đăng nhập để sử dụng giỏ hàng!');
        window.location.href = '?act=login';
                 </script>";
        }
        else{
            $user_id = $_SESSION['user']['id'];
            $gioHang = $this->modelGioHang->checkGioHang($user_id);
            // var_dump($gioHang);die;
            if($gioHang){
                $gio_hang_id = $gioHang['id'];
                // var_dump($gioHang);die;
            }
            else{
               $this->modelGioHang->getAddGioHang($user_id);
               $gioHang = $this->modelGioHang->checkGioHang($user_id);
               if(!$gioHang){
                //  echo "<script>  alert('Lỗi!')</script>" ;
                die("Lỗi");
               }
               $gio_hang_id = $gioHang['id'];
            }
            // var_dump($gio_hang_id);die;
            $san_pham_id = $_GET['id_san_pham'];
            $san_pham = $this->modelGioHang->checkSanPham($san_pham_id,$gio_hang_id);
        //    var_dump($san_pham);die;
            if($san_pham == true){
                $test = $this->modelGioHang->themSanPham($san_pham_id);
            }
            else{
                $so_luong = 1 ;
                $test = $this->modelGioHang->ThemChiTietGioHang($gio_hang_id,$san_pham_id,$so_luong);
                // print_r($test);die;
            }
            if ($test) {
                echo "<script> 
                alert('Thêm sản phẩm vào giỏ hàng thành công!');
                window.location.href = '?act=/';
                 </script>";
                // echo "Thành công ";
            } else {
                echo "<script > 
                alert('Không thể thêm sản phẩm vào giỏ hàng!');
                window.location.href = '?act=/';
                 </script>";
            }
        }
    }
<<<<<<< HEAD

    public function tangSanPham(){
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->themSanPham($id_gio_hang);
        header("location:".BASE_URL. '?act=gio-hang' );

    }

    public function giamSanPham(){
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->botSanPham($id_gio_hang);
        header("location:".BASE_URL. '?act=gio-hang'  );
    }

    public function xoaSanPham(){
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->deleteSanPham($id_gio_hang);
        header("location: ".BASE_URL. '?act=gio-hang' );


        
    }

    public function xoaNhieuSanPham()
{
    $selectedProducts = $_POST['chon_san_pham'] ?? [];
    if (!empty($selectedProducts)) {
        foreach ($selectedProducts as $productId) {
            $this->modelGioHang->xoaSanPham($productId);
        }
        $_SESSION['success'] = "Xóa sản phẩm thành công!";
    } else {
        $_SESSION['error'] = "Vui lòng chọn sản phẩm để xóa.";
    }

    // Chuyển hướng về trang giỏ hàng
    header('Location: ' . BASE_URL . '?act=gio-hang');
    exit;
}
=======
>>>>>>> d5101fd9a9013e615e31ea0ac00701fdea2d479c

    public function tangSanPham(){
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->themSanPham($id_gio_hang);
        header("location:".BASE_URL. '?act=gio-hang' );

    }

    public function giamSanPham(){
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->botSanPham($id_gio_hang);
        header("location:".BASE_URL. '?act=gio-hang'  );
    }

    public function xoaSanPham(){
        $id_gio_hang = $_GET['id_gio_hang'];
        $this->modelGioHang->deleteSanPham($id_gio_hang);
        header("location: ".BASE_URL. '?act=gio-hang' );


        
    }

    public function xoaNhieuSanPham()
{
    $selectedProducts = $_POST['chon_san_pham'] ?? [];
    if (!empty($selectedProducts)) {
        foreach ($selectedProducts as $productId) {
            $this->modelGioHang->xoaSanPham($productId);
        }
        $_SESSION['success'] = "Xóa sản phẩm thành công!";
    } else {
        $_SESSION['error'] = "Vui lòng chọn sản phẩm để xóa.";
    }

    // Chuyển hướng về trang giỏ hàng
    header('Location: ' . BASE_URL . '?act=gio-hang');
    exit;
}















}
