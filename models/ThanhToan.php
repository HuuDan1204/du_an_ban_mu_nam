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



    }