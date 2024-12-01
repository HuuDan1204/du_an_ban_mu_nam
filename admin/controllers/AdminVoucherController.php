<?php
  class AdminVoucherController{
    public $modelVoucher ;
    public function __construct(){
        $this->modelVoucher = new Voucher();
    }

    public function danhSachVoucher()
    {
        $currentDate = date('Y-m-d');
        $listVoucher = $this->modelVoucher->getAllVoucher();

        foreach ($listVoucher as $voucher) {
            $id = $voucher['id'];
            $trangThai = $voucher['trang_thai'];
            $startDate = $voucher['day_start'];
            $endDate = $voucher['day_end'];
            if ($currentDate < $startDate || $currentDate > $endDate) {
                $this->modelVoucher->updateTrangThai($id, 0);
            } else {
                $this->modelVoucher->updateTrangThai($id, 1);
            }
        }
        require_once './views/voucher/listVoucher.php';
    }

    public function updateVoucher()
    {
        $id = $_GET['id'];
        $data = $this->modelVoucher->getId($id);
        $trangThai = $data['trang_thai'];
        if ($trangThai == 1) {
            $trangThai = 0;
        } else {
            $trangThai = 1;
        }
        $this->modelVoucher->updateTrangThai($id, $trangThai);
        header('Location: ?act=voucher');
    }

    public function formThemVoucher()
    {
        require_once './views/voucher/addVoucher.php';
        deleteSessionError();
    }
    public function insertVoucher()
    {

        if (isset($_POST['btn_insert'])) {
            $maVoucher = $_POST['ma_voucher'];
            $giamGia = $_POST['giam_gia'];
            $batdau = $_POST['day_start'];
            $ketthuc = $_POST['day_end'];
            $soLuong = $_POST['so_luong'];
            $trangThai = $_POST['trang_thai'];
            $GiaToiThieuDeGiam = $_POST['giam_toi_thieu'];
            $GiaToiDaCoTheGiam = $_POST['giam_toi_da'];

            $error = [];

            if (empty($maVoucher)) {
                $error['ma_voucher'] = "Mã voucher không được để trống.";
            }
            if (empty($giamGia)) {
                $error['giam_gia'] = "Giảm giá không được để trống.";
            }
            if (empty($GiaToiThieuDeGiam)) {
                $error['giam_toi_thieu'] = "Giảm tối thiểu không được để trống.";
            }
            if (empty($GiaToiDaCoTheGiam)) {
                $error['giam_toi_da'] = "Giảm tối đa không được để trống.";
            }
            if (empty($batdau)) {
                $error['day_start'] = "Ngày bắt đầu không được để trống.";
            } else {
                $batdau = date('Y-m-d', strtotime($batdau));
                if (!$batdau) {
                    $error['day_start'] = "Ngày bắt đầu không hợp lệ.";
                }
            }
            if (empty($ketthuc)) {
                $error['day_end'] = "Ngày kết thúc không được để trống.";
            } else {
                $ketthuc = date('Y-m-d', strtotime($ketthuc));
                if (!$ketthuc) {
                    $error['day_end'] = "Ngày kết thúc không hợp lệ.";
                } elseif ($ketthuc < $batdau) {
                    $error['day_end'] = "Ngày kết thúc phải sau ngày bắt đầu.";
                }
            }
            if (!is_numeric($soLuong) || $soLuong <= 0) {
                $error['so_luong'] = "Số lượng phải là một số nguyên lớn hơn 0.";
            }
            if ($trangThai !== '0' && $trangThai !== '1') {
                $error['trang_thai'] = "Trạng thái không hợp lệ. Chỉ chấp nhận 0 hoặc 1.";
            }
            $_SESSION['error'] = $error;
            if (empty($error)) {
                $this->modelVoucher->insert($maVoucher, $giamGia, $batdau, $ketthuc, $soLuong, $trangThai, $GiaToiThieuDeGiam, $GiaToiDaCoTheGiam);
            // var_dump($maVoucher);die;
                header('Location: ?act=voucher');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-voucher');
                exit();
            }
        }
    }
    public function formSuaVoucher()
    {
        $id = $_GET['id'];
        $voucher = $this->modelVoucher->getOneVoucher($id);
        if ($voucher) {
            require_once "./views/voucher/EditVoucher.php";
            deleteSessionError();
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=voucher');
            exit();
        }
    }
    public function editVoucher()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];
            $maVoucher = $_POST['ma_voucher'];
            $giamGia = $_POST['giam_gia'];
            $batdau = $_POST['day_start'];
            $ketthuc = $_POST['day_end'];
            $soLuong = $_POST['so_luong'];
            $trangThai = $_POST['trang_thai'];
            $GiaToiThieuDeGiam = $_POST['giam_toi_thieu'];
            $GiaToiDaCoTheGiam = $_POST['giam_toi_da'];
            $error = [];


            if (empty($maVoucher)) {
                $error['ma_voucher'] = "Mã voucher không được để trống.";
            }
            if (empty($giamGia)) {
                $error['giam_gia'] = "Giảm giá không được để trống.";
            }
            if (empty($GiaToiThieuDeGiam)) {
                $error['giam_toi_thieu'] = "Giảm tối thiểu không được để trống.";
            }
            if (empty($GiaToiDaCoTheGiam)) {
                $error['giam_toi_da'] = "Giảm tối đa không được để trống.";
            }
            if (empty($batdau)) {
                $error['day_start'] = "Ngày bắt đầu không được để trống.";
            } else {
                $batdau = date('Y-m-d', strtotime($batdau));
                if (!$batdau) {
                    $error['day_start'] = "Ngày bắt đầu không hợp lệ.";
                }
            }
            if (empty($ketthuc)) {
                $error['day_end'] = "Ngày kết thúc không được để trống.";
            } else {
                $ketthuc = date('Y-m-d', strtotime($ketthuc));
                if (!$ketthuc) {
                    $error['day_end'] = "Ngày kết thúc không hợp lệ.";
                } elseif ($ketthuc < $batdau) {
                    $error['day_end'] = "Ngày kết thúc phải sau ngày bắt đầu.";
                }
            }
            if (!is_numeric($soLuong) || $soLuong <= 0) {
                $error['so_luong'] = "Số lượng phải là một số nguyên lớn hơn 0.";
            }
            if ($trangThai !== '0' && $trangThai !== '1') {
                $error['trang_thai'] = "Trạng thái không hợp lệ. Chỉ chấp nhận 0 hoặc 1.";
            }
            $_SESSION['error'] = $error;
            // var_dump($error);die;
            if (empty($error)) {
                $this->modelVoucher->update($id, $maVoucher, $giamGia, $batdau, $ketthuc, $soLuong, $trangThai, $GiaToiThieuDeGiam, $GiaToiDaCoTheGiam);
                header('Location: ?act=voucher');
                exit;
            } else {
                $_SESSION['flash'] = true;
                $voucher = ['id' => $id, 'ma_voucher' => $maVoucher, 'giam_gia' => $giamGia, 'day_start' => $batdau, 'day_end' => $ketthuc, 'so_luong' => $soLuong, 'trang_thai' => $trangThai];
                require_once './views/voucher/editVoucher.php';
            }
        }
    }

  }