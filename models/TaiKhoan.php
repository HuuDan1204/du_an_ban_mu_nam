<?php
class TaiKhoan 
{
    public $conn;
    public function __construct(){
       $this->conn = connectDB();
    }
// public function checkLogin($email,$mat_khau){
//     try{
//         $sql = "SELECT * FROM tai_khoans WHERE email = :email";
       
//         $stmt = $this->conn->prepare($sql);
//         $stmt->execute(['email'=>$email]);
//         $user = $stmt->fetch();

//         if($user && password_verify($mat_khau,$user['mat_khau'])){
           
//             if($user['chuc_vu_id'] == 1 ){
//                 if($user['trang_thai'] == 1){
//                     return $user['email'];
//                 }
//                 else{
//                     return "Tài khoản bị cấm";
//                 }
//             }
//             elseif($user['chuc_vu_id'] == 2){
//                 return $user['email'];
//             }
          
//         }
//         else{
//             return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
//         }
//     }
//     catch(Exception $e){
//         echo "Lỗi".$e->getMessage();
//         return false;   
//     }
// }
   
public function getTaiKhoanFormEmail($email)
{
    try {
        
        $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetch();
    } catch (Exception $e) {
        echo "Lỗi" . $e->getMessage();
    }
}

public function insertUser($chuc_vu_id, $ho_ten, $email, $dia_chi, $so_dien_thoai, $mat_khau, $gioi_tinh) {
    try {
        // Mã hóa mật khẩu
        // $hashedPassword = password_hash($mat_khau, PASSWORD_BCRYPT);

        // Lệnh SQL
        $sql = 'INSERT INTO tai_khoans (ho_ten, email, dia_chi, so_dien_thoai, mat_khau, gioi_tinh, chuc_vu_id) 
                VALUES (:ho_ten, :email, :dia_chi, :so_dien_thoai, :mat_khau, :gioi_tinh, :chuc_vu_id)';
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':email' => $email,
            ':dia_chi' => $dia_chi,
            ':so_dien_thoai' => $so_dien_thoai,
            ':mat_khau' => $mat_khau, // Sử dụng mật khẩu đã mã hóa
            ':gioi_tinh' => $gioi_tinh,
            ':chuc_vu_id' => $chuc_vu_id
        ]);
        return true;
    } catch (Exception $e) {
        // Log lỗi thay vì in ra màn hình
        error_log("Lỗi khi thêm tài khoản: " . $e->getMessage());
        return false;
    }
}
public function getTaiKhoan($user_id){
    try{
        $sql = 'SELECT * FROM tai_khoans WHERE id=:id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id'=>$user_id
        ]);
        return $stmt->fetch();
    }
    catch (Exception $e) {
        echo "Lỗi" . $e->getMessage();
    }
}









}