<?php

class AdminDanhMuc{

    public $conn;
    public function __construct(){
     $this->conn = connectDB();
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
    public function addDanhMuc($ten_danh_muc,$mo_ta){
        try {
            $sql = 'INSERT INTO danh_mucs(ten_danh_muc,mo_ta) 
            VALUES (:ten_danh_muc,:mo_ta)
             ';
             $stmt = $this->conn->prepare($sql);
             $stmt->execute([
                ':ten_danh_muc'=>$ten_danh_muc,
                ':mo_ta' => $mo_ta
             ]);
        } catch (Exception $e) {
            echo "Loi" .$e->getMessage();
        }
    }



}