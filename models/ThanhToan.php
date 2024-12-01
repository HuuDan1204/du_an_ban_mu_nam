<?php 

    class ThanhToan {
        public $conn ;

        public function __construct(){
            $this->conn = connectDB();
        }

        public function getAllThanhToan(){
            try{
                $sql = 'SELECT * FROM phuong_thuc_thanh_toans ';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }   
            catch (Exception $e) {
                echo "Lỗi" . $e->getMessage();
            }
        }

        public function getMaDonHang()
        {
            try {
                $sql = 'SELECT ten_ma FROM ma_don_hangs LIMIT 1';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch();
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
        public function getLastMaDonHang($prefix)
        {
            try {
                $sql = "SELECT ma_don_hang FROM don_hangs WHERE ma_don_hang LIKE '$prefix%' ORDER BY id DESC LIMIT 1";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch();
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
        public function InsertDonHang(
            $newOrderCode,
            $id_tai_khoan,
            $ten_nguoi_nhan,
            $email_nguoi_nhan,
            $sdt_nguoi_nhan,
            $dia_chi_nguoi_nhan,
            $ghi_chu,
            $ngay_dat,
            $tong_tien,
            $phuong_thuc_thanh_toan,
            $trang_thai_id,
            $voucher_id
        ) {
            try {
                $sql = "INSERT INTO don_hangs(ma_don_hang,tai_khoan_id,ten_nguoi_nhan,email_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan,ghi_chu,
                    ngay_dat,tong_tien,phuong_thuc_thanh_toan_id,trang_thai_id,voucher_id) VALUE (:ma_don_hang,:tai_khoan_id,:ten_nguoi_nhan,:email_nguoi_nhan,:sdt_nguoi_nhan,:dia_chi_nguoi_nhan,:ghi_chu,
                    :ngay_dat,:tong_tien,:phuong_thuc_thanh_toan,:trang_thai_id,:voucher_id)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':ma_don_hang' => $newOrderCode,
                    ':tai_khoan_id' => $id_tai_khoan,
                    ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                    ':email_nguoi_nhan' => $email_nguoi_nhan,
                    ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                    ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                    'ghi_chu' => $ghi_chu,
                    ':ngay_dat' => $ngay_dat,
                    ':tong_tien' => $tong_tien,
                    ':phuong_thuc_thanh_toan' => $phuong_thuc_thanh_toan,
                    ':trang_thai_id' => $trang_thai_id,
                    ':voucher_id' => $voucher_id
    
                ]);
                return $this->conn->lastInsertId();
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
        public function InsertChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien)
        {
            try {
                $sql = "INSERT INTO chi_tiet_don_hangs(don_hang_id,san_pham_id,don_gia,so_luong,thanh_tien) VALUES (:don_hang_id,:san_pham_id,:don_gia,:so_luong,:thanh_tien)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':don_hang_id' => $don_hang_id,
                    ':san_pham_id' => $san_pham_id,
                    ':don_gia' => $don_gia,
                    ':so_luong' => $so_luong,
                    ':thanh_tien' => $thanh_tien
                ]);
                return true;
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
        public function UpdateSanPhamSoLuong($san_pham_id, $so_luong)
        {
            // Cập nhật số lượng sản phẩm trong bảng san_phams
            $sql = "UPDATE san_phams 
                SET so_luong = so_luong - :so_luong,
                    so_luong_mua = so_luong_mua + :so_luong
                WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':so_luong', $so_luong, PDO::PARAM_INT);
            $stmt->bindParam(':id', $san_pham_id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        public function UpdateVoucherSoLuong($voucher_id){
            try{
                $sql = "UPDATE vouchers SET so_luong = so_luong - 1 WHERE id=:id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id'=>$voucher_id]);
                return true;
            }catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
    
    }

    