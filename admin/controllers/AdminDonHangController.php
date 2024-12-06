<?php 
    class AdminDonHangController {
        public $modelDonHang ;
        public function __construct(){
            $this->modelDonHang = new AdminDonHang();
        }
        public function danhSachDonHang(){

            $listdonhang = $this->modelDonHang->getAllDonHang();
            
            require_once './views/donhang/listDonHang.php';
            
        }

        public function infoDonHang(){
            $don_hang_id = $_GET['id_don_hang'];

            $donhang = $this->modelDonHang->getInfoDonHang($don_hang_id);

            $sanPhamDonHang = $this->modelDonHang->getListDonHang($don_hang_id);

            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

            

            require_once './views/donhang/infoDonHang.php';
        }
   
        public function formEditDonHang(){
            // lấy ra thông tin để sửa
            $id = $_GET['id_don_hang'];
            $donhang = $this->modelDonHang->getInfoDonHang($id);
            // var_dump($DonHang);
            // $listDonHang = $this->modelDonHang->getListAnhDonHang($id);
            $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
          //  var_dump($danhmuc);die();
          
            if($donhang){
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
            }
            else{
                header('location:'.BASE_URL_ADMIN .'?act=don-hang');
                exit();
            }
            
        }
        public function postEditDonHang() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $don_hang_id = $_POST['don_hang_id'] ?? '';
                $trang_thai_id = $_POST['trang_thai_id'] ?? '';
                // var_dump($don_hang_id);die;
                $error = [];    
                if (empty($trang_thai_id)) {
                    $error['trang_thai_id'] = 'Trạng thái đơn hàng phải chọn';
                }
        
                $_SESSION['error'] = $error;
                // var_dump($don_hang_id);die;
        
                if (empty($error)) {
                    $status = $this->modelDonHang->updateDonHang($trang_thai_id, $don_hang_id);
                    
                    if ($status) {
                        header("location: " . BASE_URL_ADMIN . '?act=don-hang');
                        die();
                    } else {
                        echo "Cập nhật thất bại!";
                        die();
                    }
                } else {
                    $_SESSION['flash'] = true;
                    header("location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                    die();
                }
            }
        }
        
 
//     public function infoSanPham(){
            
//         // lấy ra thông tin để sửa
//         $id = $_GET['id_san_pham'];
//         $sanpham = $this->modelSanPham->getDetailSanPham($id);
      
//         if($sanpham){
//         require_once './views/sanpham/infoSanPham.php';
        
//         }
//         else{
//             header('location:'.BASE_URL_ADMIN .'?act=san-pham');
//             exit();
//         }
        
//     }

    }