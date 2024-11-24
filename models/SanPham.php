<?php 

class SanPham 
{
    public $conn ;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham(){
        try {
            $sql = 'SELECT * FROM san_phams ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
     }
    }

    public function getAllDanhMuc(){
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (Exception $e) {
            //throw $th;
            echo "Loi" . $e->getMessage();
        }
    }
    public function getSanPhamNew()
    {
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY ngay_nhap DESC LIMIT 8 
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getSanPhamLast()
    {
        try {
            $sql = 'SELECT * FROM san_phams ORDER BY ngay_nhap DESC LIMIT 3
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getSanPhamSale()
    {
        try{
        $sql = 'SELECT * FROM san_phams WHERE gia_khuyen_mai != 0  ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
        }
        catch(Exception $e){
            echo "Loi".$e->getMessage();
        }
    }
    public function getSanPhamA(){
        try {
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = 43 ORDER BY id DESC LIMIT 3';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getSanPhamB(){
        try {
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = 39 ORDER BY id DESC LIMIT 3';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getSanPhamC(){
        try {
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = 48 ORDER BY id DESC LIMIT 3';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    

}