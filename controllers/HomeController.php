<?php 

class HomeController
{   
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;
    public $modelGioHang ;
    public function __construct(){
       $this->modelSanPham = new SanPham();
       $this->modelDanhMuc = new AdminDanhMuc();
       $this->modelTaiKhoan = new TaiKhoan();
       $this->modelGioHang = new GioHang();

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

    















}
