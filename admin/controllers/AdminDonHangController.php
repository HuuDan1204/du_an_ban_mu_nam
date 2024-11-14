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
          deleteSessionError();
            if($donhang){
            require_once './views/donhang/editDonHang.php';
            }
            else{
                header('location:'.BASE_URL_ADMIN .'?act=don-hang');
                exit();
            }
            
        }
        public function postEditDonHang(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
// lssyd ra dữ liệu
// lấy ra dữ liệu cũ của sản phẩm
                $don_hang_id = $_POST['don_hang_id'] ?? null ;
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? null ;
                $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? null ;
                $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? null ;
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? null ;
                $ghi_chu = $_POST['ghi_chu'] ?? null ;
                $trang_thai_id = $_POST['trang_thai_id'] ?? null ;
                // var_dump($_POST);die;
                $error = [];
                if(empty($ten_nguoi_nhan)){
                    $error['ten_nguoi_nhan'] = 'Tên người nhận không được bỏ trống ';
                }
                if(empty($sdt_nguoi_nhan)){
                    $error['sdt_nguoi_nhan'] = 'Số điện thoại người nhận không được bỏ trống ';
                }
                if(empty($email_nguoi_nhan)){
                    $error['email_nguoi_nhan'] = 'Email người nhận không được bỏ trống ';
                }
                if(empty($dia_chi_nguoi_nhan)){
                    $error['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được bỏ trống ';
                }
                if(empty($trang_thai_id)){
                    $error['trang_thai_id'] = 'Trạng thái đơn hàng phải chọn ';
                }
                $_SESSION['error'] = $error ;
        //    var_dump($error);die;
           // không lỗi thì tiền hành sửa
                if(empty($error)){
                //    var_dump('oke');
               $this->modelDonHang->updateDonHang(
                                                $don_hang_id
                                                ,$ten_nguoi_nhan
                                                ,$sdt_nguoi_nhan
                                                ,$email_nguoi_nhan
                                                ,$dia_chi_nguoi_nhan
                                                ,$ghi_chu
                                                ,$trang_thai_id
                                                );
                //    var_dump($abc);die;

                   header("location: ".BASE_URL_ADMIN . '?act=don-hang' );
                   exit();

                }
                else{
                    //var_dump($error);die();
                    $_SESSION['flash'] = true ;
                    header("location: ". BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang' .$don_hang_id );
                    exit();

                }
            }
        }
    
//         public function deleteSanPham(){
//             $id = $_GET['id_san_pham'];
//             $sanpham = $this->modelSanPham->getDetailSanPham($id);
            
//             if($sanpham){
//                 deleteFile($sanpham['hinh_anh']);
//                 $this->modelSanPham->destroySanPham($id);
//                 header('location:'.BASE_URL_ADMIN .'?act=san-pham');
//                 exit();
//             }
//         }
    
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