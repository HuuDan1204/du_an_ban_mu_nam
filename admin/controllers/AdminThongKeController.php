<?php 

class AdminThongKeController{
  public  $modelThongKe ;
    
  public function __construct(){
    $this->modelThongKe = new ThongKe() ;
  }
  
  public function ThongKe(){
    
        require_once './views/thongke/thongKe.php';
    
}
public function tongThongKe(){
    $tu_ngay = $_POST['tu_ngay'] ?? null;
    $den_ngay = $_POST['den_ngay'] ?? null;

    // Thống kê doanh thu theo khoảng thời gian
    $doanhThu = $this->modelThongKe->thongKeDoanhThu($tu_ngay, $den_ngay);

    // Top 5 khách hàng mua nhiều nhất
    $topKhachHang = $this->modelThongKe->thongKeTopKhachHang($tu_ngay, $den_ngay);

    // Top 5 sản phẩm bán chạy nhất
    $topSanPham = $this->modelThongKe->thongKeTopSanPham($tu_ngay, $den_ngay);
     
    require_once './views/thongke/tongThongKe.php';
}
}
