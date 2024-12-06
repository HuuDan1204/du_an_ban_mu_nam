<?php 
    class ThongKe{
        public $conn ;
        public function __construct(){
            $this->conn = connectDB();
        }
      
        
            
        public function thongKeDoanhThu($tu_ngay, $den_ngay) {
            $sql = "SELECT COUNT(*) AS so_don_hang, SUM(tong_tien) AS doanh_thu
                    FROM don_hangs
                    WHERE trang_thai_id = 10 AND ngay_dat BETWEEN :tu_ngay AND :den_ngay";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tu_ngay' => $tu_ngay, ':den_ngay' => $den_ngay]);
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Top 5 khách hàng mua nhiều nhất trong khoảng thời gian
        public function thongKeTopKhachHang($tu_ngay, $den_ngay) {
            $sql = "SELECT kh.ho_ten, kh.email, COUNT(dh.id) AS so_don_hang, SUM(dh.tong_tien) AS tong_tien
                    FROM tai_khoans kh
                    JOIN don_hangs dh ON kh.id = dh.tai_khoan_id
                    WHERE dh.trang_thai_id = 10 AND dh.ngay_dat BETWEEN :tu_ngay AND :den_ngay
                    GROUP BY kh.id
                    ORDER BY tong_tien DESC
                    LIMIT 5";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tu_ngay' => $tu_ngay, ':den_ngay' => $den_ngay]);
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        // Top 5 sản phẩm bán chạy nhất trong khoảng thời gian
        public function thongKeTopSanPham($tu_ngay, $den_ngay) {
            $sql = "SELECT sp.ten_san_pham, SUM(ct.so_luong) AS so_luong_ban_ra, SUM(ct.thanh_tien) AS doanh_thu
                    FROM chi_tiet_don_hangs ct
                    JOIN san_phams sp ON ct.san_pham_id = sp.id
                    JOIN don_hangs dh ON ct.don_hang_id = dh.id
                    WHERE dh.trang_thai_id = 10 AND dh.ngay_dat BETWEEN :tu_ngay AND :den_ngay
                    GROUP BY sp.id
                    ORDER BY so_luong_ban_ra DESC
                    LIMIT 5";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tu_ngay' => $tu_ngay, ':den_ngay' => $den_ngay]);
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
        
        
    