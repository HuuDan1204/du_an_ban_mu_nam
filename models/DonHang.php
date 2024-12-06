<?php
class DonHang {
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllDonHang($tai_khoan_id) {
        try {
            $sql = 'SELECT don_hangs .*, don_hangs.id as don_hang_id , trang_thai_don_hangs.ten_trang_thai FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    WHERE tai_khoan_id=:tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id'=>$tai_khoan_id]);
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    
    public function getDetailDonHang($id) {
        try {
            $sql = 'SELECT don_hangs.*,don_hangs.id as don_hang_id, trang_thai_don_hangs.ten_trang_thai,tai_khoans.*,phuong_thuc_thanh_toans.ten_phuong_thuc 
            FROM don_hangs INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id= trang_thai_don_hangs.id
            INNER JOIN tai_khoans ON don_hangs.tai_khoan_id= tai_khoans.id
           
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id= phuong_thuc_thanh_toans.id
            WHERE don_hangs.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id,
            ]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getListDonHang($id){
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham , san_phams.hinh_anh,san_phams.gia_san_pham,san_phams.gia_khuyen_mai
            FROM chi_tiet_don_hangs 
            INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
            WHERE don_hang_id = :id 
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id'=>$id]);

            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDonHangByMa($maDonHang, $userId)
{
    try {
        $sql = "SELECT * FROM don_hangs WHERE ma_don_hang = :ma_don_hang AND tai_khoan_id = :tai_khoan_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':ma_don_hang' => $maDonHang, ':tai_khoan_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

public function updateTrangThaiDonHang($maDonHang, $trangThai)
{
    try {
        $sql = "UPDATE don_hangs SET trang_thai_id = :trang_thai WHERE ma_don_hang = :ma_don_hang";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':trang_thai' => $trangThai, ':ma_don_hang' => $maDonHang]);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}




}
