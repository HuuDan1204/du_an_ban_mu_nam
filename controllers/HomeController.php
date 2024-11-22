<?php 

class HomeController
{   
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct(){
       $this->modelSanPham = new SanPham();
       $listDanhMuc = $this->modelDanhMuc = new AdminDanhMuc();

    }
        // public function home(){
        //     echo "day la home";
        // }
        public function danhSachSanPham(){
            // echo "Danh sach san pham";
            $listSanPham = $this ->modelSanPham->getAllSanPham();
            $listDanhMuc = $this ->modelDanhMuc->getAllDanhMuc();
            $listSanPhamFT = $this ->modelSanPham->getSanPhamFT();
            // var_dump($listSanPham);die();
            require_once './views/danhmuc/home.php';
        }
}
