<?php 

class HomeController
{   
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;
    public function __construct(){
       $this->modelSanPham = new SanPham();
       $this->modelDanhMuc = new AdminDanhMuc();
       $this->modelTaiKhoan = new TaiKhoan();

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
        public function login()
        {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($password);die;
      
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
      
            if ($user == $email ) {
              $_SESSION['user_admin'] = $user;
      
              header("location: " . BASE_URL_ADMIN .'?act=danh-muc' );
              exit();
            } else {
              $_SESSION['error'] = $user;
              // var_dump($_SESSION['error']);die;
      
              $_SESSION['flash'] = true;
              header("location: " . BASE_URL . '?act=login');
              exit();
            }
      
          }
        }
      
        public function logout(){
          if(isset($_SESSION['user_admin'])){
             unset($_SESSION['user_admin']);
             header("location ".BASE_URL_ADMIN.'?act=login-admin' );
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

       
















}
