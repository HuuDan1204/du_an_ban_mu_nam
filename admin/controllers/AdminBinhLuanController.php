<?php
class AdminBinhLuanController {
    private $binhluan;

    public function __construct() {
        $this->binhluan = new AdminBinhLuan();
    }
    public function getTable(){
        $listBinhLuan= $this->binhluan->getAllBinhLuan();
       require_once "./views/binhluan/table.binhluan.php";
    }
    public function addBinhLuan(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $san_pham_id = isset($_POST['ten_san_pham']) ? (int)$_POST['ten_san_pham'] : 0;
            $tai_khoan_id = isset($_POST['tai_khoan_id']) ? (int)$_POST['tai_khoan_id'] : 0;
            $trang_thai = isset($_POST['trang_thai']) ? (int)$_POST['trang_thai'] : 0;
              $noi_dung = $_POST['noi_dung'];
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $ngay_dang = isset($_POST['ngay_dang']) ? $_POST['ngay_dang'] : date('Y-m-d');
             $addBinhLuan = $this->binhluan->addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
        }
        require_once "./views/binhluan/add.binhluan.php";
    }
    public function editBinhLuan(){
        $id = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $san_pham_id = isset($_POST['ten_san_pham']) ? (int)$_POST['ten_san_pham'] : 0;
            $tai_khoan_id = isset($_POST['tai_khoan_id']) ? (int)$_POST['tai_khoan_id'] : 0;
            $trang_thai = isset($_POST['trang_thai']) ? (int)$_POST['trang_thai'] : 0;
            $noi_dung = trim($_POST['noi_dung']);
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $ngay_dang = isset($_POST['ngay_dang']) ? $_POST['ngay_dang'] : date('Y-m-d');
             $Update = $this->binhluan->UpdateBinhLuan( $id ,$san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
        }
        $updateBinhLuanDetail = $this->binhluan->updateBinhLuanGet($id);
    require_once "./views/binhluan/edit.binhluan.php";
    }
    public function deleteBinhLuan(){
        $id = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Update = $this->binhluan->Xoa( $id );
        }
        $XoaBinhLuanDetail = $this->binhluan->xoaGet($id);
    require_once "./views/binhluan/delete.binhluan.php";
    }
    public function xetDuyetBinhLuan(){
        $getXetBinhLuan = $this->binhluan->getXetBinhLuan();
    require_once "./views/binhluan/xet.binhluan.php";
    }

}
?>
