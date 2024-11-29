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
    public function getTop4SanPham()
    {
        try{
        $sql = 'SELECT * FROM san_phams ORDER BY luot_xem DESC LIMIT 4  ';
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
    public function getDetail($id_san_pham){
        try {
            $sql = 'SELECT san_phams.*,danh_mucs.ten_danh_muc FROM san_phams INNER JOIN danh_mucs ON san_phams.danh_muc_id=danh_mucs.id WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id_san_pham]);
            return $stmt->fetch();
        } catch(Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getListHinhAnh($id_san_pham){
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id_san_pham]);
            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    

}