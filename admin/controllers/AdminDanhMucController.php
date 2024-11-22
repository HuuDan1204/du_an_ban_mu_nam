<?php

class AdminDanhMucController{
    public $modelDanhMuc;

    public function __construct(){
        $listDanhMuc = $this->modelDanhMuc = new AdminDanhMuc();

    }
    public function danhSachDanhMuc(){
       
      $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        // var_dump($listDanhMuc);die();
       require_once './views/danhmuc/DanhMuc.php';
    }

    public function formAddDanhMuc(){
        require_once './views/danhmuc/addDanhMuc.php ';
    }
    public function postAddDanhMuc(){
      if($_SERVER['REQUEST_METHOD'] === 'POST'  ){
        $ten_danh_muc = $_POST['ten_danh_muc'];
        $mo_ta = $_POST['mo_ta'];
        $error = [];
        if(empty($ten_danh_muc)){
          $error['ten_danh_muc'] = 'Tên danh mục không được bỏ trống';
        }
        if(empty($error)){
          // var_dump('oke');die;
          $this->modelDanhMuc->addDanhMuc($ten_danh_muc,$mo_ta);
          // var_dump($ten_danh_muc);die;
           header("location: ".BASE_URL_ADMIN . '?act=danh-muc' );
          exit();
          
        }
        else{
          require_once './views/danhmuc/addDanhMuc.php';
        }
      }
    }

    public function formEditDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
      // var_dump($id);die();
        if($danhmuc){
          require_once './views/danhmuc/editDanhMuc.php';
        }
        else{
          header("location: ". BASE_URL_ADMIN . '/?act=danh-muc');
          exit();
        }
    }
    public function postEditDanhMuc(){
      if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $id = $_POST['id'];
        $ten_danh_muc = $_POST['ten_danh_muc'];
        $mo_ta = $_POST['mo_ta'];
        $error = [];
        if(empty($ten_danh_muc)){
          $error['ten_danh_muc'] = "Tên danh mục không được bỏ trống";

        }
        if(empty($error)) {
          $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
          // var_dump($ten_danh_muc);die;
          header('location:'.BASE_URL_ADMIN .'?act=danh-muc');
          exit ();

        }
        else{
          $danhmuc = ['id' =>$id , 'ten_danh_muc' =>$ten_danh_muc,'mo_ta'=>$mo_ta];
          require_once './views/danhmuc/editDanhMuc.php';
        }
      }
    }
    public function deleteDanhMuc(){
      $id = $_GET['id_danh_muc'];
      $danhmuc = $this->modelDanhMuc->updateDanhMucSanPham($id);
      $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
      if($danhmuc){
          $this->modelDanhMuc->destroyDanhMuc($id);
          header('location:'.BASE_URL_ADMIN .'?act=danh-muc');
          exit();
      }
  }

}