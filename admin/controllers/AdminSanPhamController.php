<?php 
    class AdminSanPhamController {
        public $modelSanPham ;
        public $modelDanhMuc ;
        public function __construct(){
            $this->modelSanPham = new AdminSanPham();
            $this->modelDanhMuc = new AdminDanhMuc();
        }
        public function danhSachSanPham(){
            $listsanpham = $this->modelSanPham->getAllSanPham();
            
            require_once './views/sanpham/listSanPham.php';
            //var_dump($listsanpham);die();
        }

        public function formAddSanPham(){
            $listdanhmuc = $this->modelDanhMuc->getAllDanhMuc();
            require_once './views/sanpham/addSanPham.php';
            deleteSessionError(); 
        }
        public function postAddSanPham(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $ten_san_pham = $_POST['ten_san_pham']?? null;
                $gia_san_pham = $_POST['gia_san_pham']?? null;
                $gia_khuyen_mai = $_POST['gia_khuyen_mai']?? null;
                $so_luong = $_POST['so_luong']?? null;
                $ngay_nhap = $_POST['ngay_nhap']?? null;
                $danh_muc_id = $_POST['danh_muc_id'] ?? null ;
                $trang_thai = $_POST['trang_thai'] ?? null ;
                $mo_ta = $_POST['mo_ta'];
                
                $hinh_anh = $_FILES['hinh_anh'] ?? null ;
                //lưu hình ảnh vào
                $file_anh = upLoadFile($hinh_anh,'./uploads/');

                // $img_array = $_FILES['img_array'];


                $error = [];
                if(empty($ten_san_pham)){
                    $error['ten_san_pham'] = 'Tên sản phẩm không được bỏ trống ';
                }
                if(empty($gia_san_pham)){
                    $error['gia_san_pham'] = 'Giá sản phẩm không được bỏ trống ';
                }
                if(empty($gia_khuyen_mai)){
                    $error['gia_khuyen_mai'] = 'Giá khuyễn mãi sản phẩm không được bỏ trống ';
                }
                if(empty($so_luong)){
                    $error['so_luong'] = 'Số lượng không được bỏ trống ';
                }
                if(empty($ngay_nhap)){
                    $error['ngay_nhap'] = 'Ngày nhập không được bỏ trống ';
                }
                if(empty($danh_muc_id)){
                    $error['danh_muc_id'] = 'Danh mục phải chọn ';
                }
                if(empty($trang_thai)){
                    $error['trang_thai'] = 'Trạng thái phải chọn ';
                }
                if($hinh_anh['error']){
                    $error['hinh_anh'] = 'Không được bỏ trống hình ảnh ';
                }
                $_SESSION['error'] = $error ;
                if(empty($error)){
                 $san_pham_id =  $this->modelSanPham->addSanPham($ten_san_pham
                                                ,$gia_san_pham
                                                ,$gia_khuyen_mai
                                                ,$so_luong
                                                ,$ngay_nhap
                                                ,$danh_muc_id
                                                ,$trang_thai
                                                ,$mo_ta
                                                ,$file_anh
                                                );
                                                // var_dump($san_pham_id);die();
                    // xử lý thêm album ảnh sản phẩm img_array
                    // if(!empty($img_array['name'])){
                    //     foreach($img_array['name'] as $key=>$value ){
                    //         $file = [
                    //             'name' => $img_array['name'][$key],
                    //             'type' => $img_array['type'][$key],
                    //             'tmp_name' => $img_array['tmp_name'][$key],
                    //             'error' => $img_array['error'][$key],
                    //             'size' => $img_array['size'][$key],
                    //         ];
                    //         $link_hinh_anh = upLoadFile($file,'./uploads/');
                    //         $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$link_hinh_anh);
                    //     }
                    // }
                   header("location: ".BASE_URL_ADMIN . '?act=san-pham' );
                   exit();
                }
                else{
                    // var_dump($error);die();
                    $_SESSION['flash'] = false ;
                //    var_dump($_SESSION);die;

                    header("location: ". BASE_URL_ADMIN . '?act=form-them-san-pham');

                }
            }
        }

    
        public function formEditSanPham(){
            
            // lấy ra thông tin để sửa
            $id = $_GET['id_san_pham'];
            $sanpham = $this->modelSanPham->getDetailSanPham($id);
            // var_dump($sanpham);
            // $listsanpham = $this->modelSanPham->getListAnhSanPham($id);
            $listdanhmuc = $this->modelDanhMuc->getAllDanhMuc();
          //  var_dump($danhmuc);die();
          deleteSessionError();
          
            if($sanpham){
            require_once './views/sanpham/editSanPham.php';
            
            }
            else{
                header('location:'.BASE_URL_ADMIN .'?act=san-pham');
                exit();
            }
            
        }
        public function postEditSanPham(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
// lssyd ra dữ liệu
// lấy ra dữ liệu cũ của sản phẩm
                $san_pham_id = $_POST['san_pham_id'] ?? null ;
                $san_pham_old = $this->modelSanPham->getDetailSanPham($san_pham_id);
                $old_file = $san_pham_old['hinh_anh']; // lấy ảnh cũ để pvu sửa ảnh
                $ten_san_pham = $_POST['ten_san_pham']?? null ;
                $gia_san_pham = $_POST['gia_san_pham']?? null;
                $gia_khuyen_mai = $_POST['gia_khuyen_mai']?? 0;
                $so_luong = $_POST['so_luong']?? null;
                $ngay_nhap = $_POST['ngay_nhap']?? null;
                $danh_muc_id = $_POST['danh_muc_id'] ?? null ;
                $trang_thai = $_POST['trang_thai'] ?? null ;
                $mo_ta = $_POST['mo_ta'] ?? null  ;
                $hinh_anh = $_FILES['hinh_anh'] ;
                if(isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK ){
                    // upload file ảnh mới lên 
                    $new_file = upLoadFile($hinh_anh, './uploads/');
                    if(!empty($old_file)){
                        deleteFile($old_file);
                    }
                    else{
                        $new_file = $old_file;
                    }
                }
                
                $error = [];
                if(empty($ten_san_pham)){
                    $error['ten_san_pham'] = 'Tên sản phẩm không được bỏ trống ';
                }
                if(empty($gia_san_pham)){
                    $error['gia_san_pham'] = 'Giá sản phẩm không được bỏ trống ';
                }
                if(empty($gia_khuyen_mai)){
                    $error['gia_khuyen_mai'] = 'Giá khuyễn mãi sản phẩm không được bỏ trống ';
                }
                if(empty($so_luong)){
                    $error['so_luong'] = 'Số lượng không được bỏ trống ';
                }
                if(empty($ngay_nhap)){
                    $error['ngay_nhap'] = 'Ngày nhập không được bỏ trống ';
                }
                if(empty($danh_muc_id)){
                    $error['danh_muc_id'] = 'Danh mục phải chọn ';
                }
                if(empty($trang_thai)){
                    $error['trang_thai'] = 'Trạng thái phải chọn ';
                }
                if($hinh_anh['error']){
                    $error['hinh_anh'] = 'Không được bỏ trống hình ảnh ';
                }
                $_SESSION['error'] = $error ;
           // var_dump($error);die;
                if(empty($error)){
                //    var_dump('oke');
                $status = $this->modelSanPham->updateSanPham(
                                                $san_pham_id
                                                ,$ten_san_pham
                                                ,$gia_san_pham
                                                ,$gia_khuyen_mai
                                                ,$so_luong
                                                ,$ngay_nhap
                                                ,$danh_muc_id
                                                ,$trang_thai
                                                ,$mo_ta
                                                ,$new_file
                                                );
                                            //   var_dump($ten_san_pham);die;
                   header("location: ".BASE_URL_ADMIN . '?act=san-pham' );
                   exit();
                }
                else{
                    //var_dump($error);die();
                    $_SESSION['flash'] = true ;
                    header("location: ". BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham' .$san_pham_id );
                    exit();

                }
            }
        }
        public function deleteSanPham(){
            $id = $_GET['id_san_pham'];
            $sanpham = $this->modelSanPham->getDetailSanPham($id);
            
            if($sanpham){
                deleteFile($sanpham['hinh_anh']);
                $this->modelSanPham->destroySanPham($id);
                header('location:'.BASE_URL_ADMIN .'?act=san-pham');
                exit();
            }
        }
    
    // public function infoSanPham(){
            
    //     // lấy ra thông tin để sửa
    //     $id = $_GET['id_san_pham'];
    //     $sanpham = $this->modelSanPham->getDetailSanPham($id);
    //   $listbinhluan = $this->modelSanPham->getBinhLuanFromKhachHang($id);
    //     if($sanpham){
    //     require_once './views/detailSanPham.php';
        
    //     }
    //     else{
    //         header('location:'.BASE_URL);
    //         exit();
    //     }
        
    // }

    }