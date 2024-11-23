<?php
class AdminTaiKhoanController
{
  public $modelTaiKhoan;
  public $modelDonHang;
  public $modelSanPham;

  public function __construct()
  {
    $this->modelTaiKhoan = new AdminTaiKhoan();
    $this->modelDonHang = new AdminDonHang();
    $this->modelSanPham = new AdminSanPham();
  }

  public function danhSachQuanTri()
  {
    $listquantri = $this->modelTaiKhoan->getAllTaiKhoan(1);

    require_once './views/taikhoan/quantri/listQuanTri.php';
  }

  public function formAddQuanTri()
  {
    require_once './views/taikhoan/quantri/addQuanTri.php';
    deleteSessionError();
  }

  public function postAddQuanTri()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ho_ten = $_POST['ho_ten'] ?? '';
      $email = $_POST['email'] ?? '';
      $so_dien_thoai = $_POST['so_dien_thoai']?? '';
      $dia_chi = $_POST['dia_chi']?? '';
      $error = [];
      if (empty($ho_ten)) {
        $error['ho_ten'] = 'Họ tên không được bỏ trống ';
      }
      if (empty($email)) {
        $error['email'] = 'Email không được bỏ trống ';
      }
      if (empty($dia_chi)) {
        $error['dia_chi'] = 'Địa chỉ không được bỏ trống ';
      }
      if (empty($so_dien_thoai)) {
        $error['so_dien_thoai'] = 'Số điện thoại không được bỏ trống ';
      }
      $_SESSION['error'] = $error;

      if (empty($error)) {
        $password = password_hash('shinamahiru', PASSWORD_BCRYPT);
        //  var_dump($error);die;
        $chuc_vu_id = 1;
        $dan = $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $so_dien_thoai,$dia_chi ,$password, $chuc_vu_id);
        // var_dump($dan);die;
        header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri-vien');
        exit();
      } else {
        $_SESSION['flash'] = true;
        header("location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
        exit();
      }
    }
  }

  public function formEditQuanTri()
  {
    $id_quan_tri = $_GET['id_quan_tri'];
    $quantri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
    // var_dump($quantri);die;
    require_once './views/taikhoan/quantri/editQuanTri.php';
    deleteSessionError();
  }

  public function postEditQuanTri()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // lssyd ra dữ liệu
// lấy ra dữ liệu cũ của sản phẩm
      $quan_tri_id = $_POST['quan_tri_id'] ?? null;
      $old_quan_tri = $this->modelTaiKhoan->getDetailTaiKhoan($quan_tri_id);
      $old_file = $old_quan_tri['anh_dai_dien'];
      $ho_ten = $_POST['ho_ten'] ?? null;
      $email = $_POST['email'] ?? null;
      $so_dien_thoai = $_POST['so_dien_thoai'];
      $ngay_sinh = $_POST['ngay_sinh']??"" ; 
                
      $gioi_tinh = $_POST['gioi_tinh'] ?? "";
      $mat_khau = $_POST['mat_khau']?? "";
      $trang_thai = $_POST['trang_thai']?? "";
      $dia_chi = $_POST['dia_chi']?? "";         
      $hinh_anh= $_FILES['anh_dai_dien'] ?? NULL;


      // var_dump($_POST);die;
      $error = [];
      if (empty($ho_ten)) {
        $error['ho_ten'] = 'Tên người dùng không được bỏ trống ';
      }
      if (empty($email)) {
        $error['email'] = 'Email không được bỏ trống ';
      }
      if (empty($trang_thai)) {
        $error['trang_thai'] = 'Vui lòng chọn trạng thái ';
      }

      $_SESSION['error'] = $error;
      //    var_dump($error);die;
      // không lỗi thì tiền hành sửa
      if (empty($error)) {
        //    var_dump('oke');
        $abc = $this->modelTaiKhoan->updateTaiKhoan(
          $quan_tri_id
          ,
          $ho_ten
          ,
          $email
          ,
          $so_dien_thoai
          ,
          $trang_thai
        );
        //  var_dump($abc);die;

        header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri-vien');
        exit();

      } else {
        //var_dump($error);die();
        $_SESSION['flash'] = true;
        header("location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri' . $quan_tri_id);
        exit();

      }
    }
  }

  public function resetPassword()
  {
    $password = password_hash('shinamahiru', PASSWORD_BCRYPT);

    $tai_khoan_id = $_GET['quan_tri_id'];
    $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
    $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);

    if ($status && $tai_khoan['chuc_vu_id'] == 1) {
      header("location : " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri-vien');
      exit();
    } else if ($status && $tai_khoan['chuc_vu_id'] == 1) {
      header("location : " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
      exit();
    } else {
      var_dump("Lỗi hiển thị");
      die;
    }

  }
  public function danhSachKhachHang()
  {
    $listkhachhang = $this->modelTaiKhoan->getAllTaiKhoan(2);
    require_once './views/taikhoan/khachhang/listKhachHang.php';
  }
  public function formEditKhachHang()
  {
    $id_khach_hang = $_GET['id_khach_hang'];
    $khachhang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
    // var_dump($quantri);die;
    require_once './views/taikhoan/khachhang/editkhachhang.php';
    deleteSessionError();
  }

  public function postEditKhachHang()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // lssyd ra dữ liệu
// lấy ra dữ liệu cũ của sản phẩm
      $khach_hang_id = $_POST['khach_hang_id'] ?? null;
      $ho_ten = $_POST['ho_ten'] ?? null;
      $ngay_sinh = $_POST['ngay_sinh'] ?? null;
      $gioi_tinh = $_POST['gioi_tinh'] ?? null;
      $dia_chi = $_POST['dia_chi'] ?? null;
      $email = $_POST['email'] ?? null;
      $so_dien_thoai = $_POST['so_dien_thoai'];
      $trang_thai = $_POST['trang_thai'] ?? null;

      // var_dump($_POST);die;
      $error = [];
      if (empty($ho_ten)) {
        $error['ho_ten'] = 'Tên người dùng không được bỏ trống ';
      }
      if (empty($email)) {
        $error['email'] = 'Email không được bỏ trống ';
      }
      if (empty($ngay_sinh)) {
        $error['ngay_sinh'] = 'Email không được bỏ trống ';
      }

      if (empty($trang_thai)) {
        $error['trang_thai'] = 'Vui lòng chọn trạng thái ';
      }

      $_SESSION['error'] = $error;
      //  var_dump($error);die;
      if (empty($error)) {
        //  var_dump('oke');
        $abc = $this->modelTaiKhoan->updateKhachHang(
          $khach_hang_id
          ,
          $ho_ten
          ,
          $email
          ,
          $so_dien_thoai
          ,
          $ngay_sinh
          ,
          $gioi_tinh
          ,
          $dia_chi
          ,
          $trang_thai
        );
        //  var_dump($abc);die;

        header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
        exit();
      } else {
        $_SESSION['flash'] = true;
        header("location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang' . $khach_hang_id);
        exit();

      }
    }
  }
  public function infoKhachHang()
  {
    $id_khach_hang = $_GET['id_khach_hang'];
    $khachhang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
    $listdonhang = $this->modelDonHang->getDonHangFromDonHang($id_khach_hang);
    $listbinhluan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
    require_once './views/taikhoan/khachhang/infokhachhang.php';
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

        header("location: " . BASE_URL_ADMIN);
        exit();
      } else {
        $_SESSION['error'] = $user;
        // var_dump($_SESSION['error']);die;

        $_SESSION['flash'] = true;
        header("location: " . BASE_URL_ADMIN . '?act=login-admin');
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

  public function formEditCaNhanQT(){
    $email = $_SESSION['user_admin'];
    $thongtin = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
    // var_dump($email);die;
    require_once './views/taikhoan/canhan/editCaNhan.php';
    deleteSessionError();
  }

  public function postEditMatKhauCaNhan(){
    // var_dump($_POST);die;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $old_pass = $_POST['old_pass'];
      $new_pass = $_POST['new_pass'];
      $confirm_pass = $_POST['confirm_pass'];

    // var_dump($old_pass);die;
    $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_admin']);

    $checkPass = password_verify($old_pass,$user['mat_khau']);

    $error = [];

    if (empty(!$checkPass)) {
      $error['old_pass'] = 'Mật khẩu sai';
    }
    if (empty(!$new_pass !== $confirm_pass )) {
      $error['confirm_pass'] = 'Mật khẩu nhập lại sai';
    }
    if (empty(!$checkPass)) {
      $error['old_pass'] = 'Mật khẩu sai';
    }

    if (empty($old_pass)) {
      $error['old_pass'] = 'Mật khẩu cũ không được bỏ trống ';
    }
    if (empty($new_pass)) {
      $error['new_pass'] = 'Mật khẩu mới không được bỏ trống ';
    }
    if (empty($confirm_pass)) {
      $error['confirm_pass'] = 'Nhập lại mật khẩu không được bỏ trống ';
    }

    $_SESSION['error'] = $error ;
    if(!$error){
      $hashPass = password_hash($new_pass,algo: PASSWORD_BCRYPT);
      $status = $this->modelTaiKhoan->resetPassword($user['id'],$hashPass);
      if($status){
        $_SESSION['success'] = "Đã đổi mật khẩu thành công";
        $_SESSION['flash'] = true;
        header("location:". BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
      }
    }else{
      $_SESSION['flash'] = true;
      header("location:". BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
      exit();
    }

    }
  }

}