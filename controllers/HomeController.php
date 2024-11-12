<?php 

class HomeController
{   
    public $modelSanPham;
    public function __construct(){
       $this->modelSanPham = new SanPham();
    }
        public function home(){
            echo "day la home";
        }
        public function danhSachSanPham(){
            // echo "Danh sach san pham";
            $listSanPham = $this ->modelSanPham->getAllSanPham();
            // var_dump($listSanPham);die();
            require_once './views/danhmuc/LienHe.php';
        }
}