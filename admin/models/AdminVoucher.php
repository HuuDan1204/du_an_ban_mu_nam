<?php 
    
    class Voucher{
        public $conn ;

        public function __construct(){
            $this->conn = connectDB();
        }

        public function getAllVoucher(){  
            try{
            $sql = "SELECT * FROM vouchers";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
            }
            catch (PDOException $e){
                echo "Lỗi" . $e->getMessage();
            }
    }

    public function getId($id){
        try{
            $sql = "SELECT * FROM vouchers where id=$id";
            return $this->conn->query($sql)->fetch();
            }
            catch (PDOException $e){
                echo "Lỗi" . $e->getMessage();
            }
    }

    public function updateTrangThai($id, $trangThai) {
        try{
        $sql = "UPDATE vouchers SET trang_thai = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$trangThai, $id]);
        return $stmt->rowCount() > 0;
        }
        catch (PDOException $e){
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function insert($maVoucher, $giamGia, $batdau, $ketthuc, $soLuong, $trangThai, $GiaToiThieuDeGiam, $GiaToiDaCoTheGiam)
    {
        $sql = "INSERT INTO vouchers (ma_voucher, giam_gia, day_start, day_end, so_luong, trang_thai, giam_toi_thieu, giam_toi_da) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->conn->prepare($sql)->execute([$maVoucher, $giamGia, $batdau, $ketthuc, $soLuong, $trangThai, $GiaToiThieuDeGiam, $GiaToiDaCoTheGiam]);
    }
    
    function update($id,$ma_voucher,$giam_gia,$day_start,$day_end,$so_luong,$trang_thai,$GiaToiThieuDeGiam,$GiaToiDaCoTheGiam){
        try{
        $sql="UPDATE vouchers SET ma_voucher='$ma_voucher',
        giam_gia=$giam_gia, 
        day_start='$day_start',
        day_end = '$day_end',
        so_luong=$so_luong ,
        trang_thai=$trang_thai,
        giam_toi_thieu=$GiaToiThieuDeGiam,
        giam_toi_da=$GiaToiDaCoTheGiam  where id=$id";
        return $this->conn->prepare($sql)->execute();
        }
        catch (PDOException $e){
            echo "Lỗi" . $e->getMessage();
        }
    }
    function getOneVoucher($id){
        try{
            $sql = "SELECT * FROM vouchers WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        }catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }



    }