<?php

class AdminBinhLuan{

    public $conn;
    public function __construct(){
     $this->conn = connectDB();
    }

    public function getAllBinhLuan() {
        try {
            $results_per_page = 10;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start_from = ($page - 1) * $results_per_page;
            $sql = 'SELECT * FROM `binh_luans` ORDER BY `noi_dung` DESC, `ngay_dang` DESC LIMIT :start_from, :results_per_page';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':start_from', $start_from, PDO::PARAM_INT);
            $stmt->bindParam(':results_per_page', $results_per_page, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
        
            return $result;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
    public function addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai){
        try {
            $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");
    
            if ($conn->connect_error) {
                throw new Exception("Kết nối thất bại: " . $conn->connect_error);
            }
    
            $stmt = $conn->prepare("INSERT INTO `binh_luans`(`san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) 
                VALUES (?, ?, ?, ?, ?)");
    
            $stmt->bind_param("iisss", $san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
    
            if ($stmt->execute()) {
                echo "Thành công";
            } else {
                throw new Exception("Lỗi: " . $stmt->error . "<br>Mã lỗi: " . $stmt->errno);
            }
    
            $stmt->close();
            $conn->close();
            header("location: ". BASE_URL_ADMIN . '?act=binh-luan&page=1');
        } catch (Exception $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }

    public function UpdateBinhLuan( $id ,$san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai){
        try {
            $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");
    
            if ($conn->connect_error) {
                throw new Exception("Kết nối thất bại: " . $conn->connect_error);
            }
    
            $stmt = $conn->prepare("UPDATE `binh_luans` 
            SET `san_pham_id` = ?, `tai_khoan_id` = ?, `noi_dung` = ?, `ngay_dang` = ?, `trang_thai` = ? 
            WHERE `id` = ?");
            $stmt->bind_param("iisssi", $san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai, $id);
    
            if ($stmt->execute()) {
                echo "Thành công";
            } else {
                throw new Exception("Lỗi: " . $stmt->error . "<br>Mã lỗi: " . $stmt->errno);
            }
    
            $stmt->close();
            $conn->close();
            header("location: ". BASE_URL_ADMIN . '?act=binh-luan&page=1');
        } catch (Exception $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }

    public function updateBinhLuanGet($id){
        try{
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, san_phams.ten_san_pham
                FROM binh_luans
                JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                WHERE binh_luans.id = :id' ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id
            ]);
            return $stmt->fetch();
        }
        catch (Exception $e) {
            echo "Loi" .$e->getMessage();
        }
    }



    public function Xoa($id){
        try {
            $conn = new mysqli("localhost", "root", "", "du_an_ban_mu_nam");
    
            if ($conn->connect_error) {
                throw new Exception("Kết nối thất bại: " . $conn->connect_error);
            }
    
            $stmt = $conn->prepare("DELETE FROM `binh_luans` WHERE `id` = ?");
            $stmt->bind_param("i", $id);
    
            if ($stmt->execute()) {
                echo "Thành công";
            } else {
                throw new Exception("Lỗi: " . $stmt->error . "<br>Mã lỗi: " . $stmt->errno);
            }
    
            $stmt->close();
            $conn->close();
            header("location: ". BASE_URL_ADMIN . '?act=binh-luan&page=1');
        } catch (Exception $e) {
            echo "Có lỗi xảy ra: " . $e->getMessage();
        }
    }

    public function XoaGet($id){
        try{
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, san_phams.ten_san_pham
                FROM binh_luans
                JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                WHERE binh_luans.id = :id' ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id
            ]);
            return $stmt->fetch();
        }
        catch (Exception $e) {
            echo "Loi" .$e->getMessage();
        }
    }
    public function getXetBinhLuan(){
        try {
            $sql = 'SELECT * FROM `binh_luans` WHERE `trang_thai` = 0  ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}