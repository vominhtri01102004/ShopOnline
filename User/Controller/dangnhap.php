<?php
$act = "dangnhap";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

$hd = new hoadon();
$gh = new giohang();
$kh = new user();

switch ($act) {
    case 'dangnhap':
        if (isset($_SESSION['makh'])) {
            echo '<script> alert("Quý Khách Đã Đăng Nhập");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            break;
        }
        include_once "./View/login.php";
        break;

    case 'dangnhap_action':
        //gửi thông tin đăng nhập qua đây
        $user = '';
        $pass = '';
        if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpassword'];
            $salfF = "G435#";
            $salfL = "T34a!&";
            $passnew = md5($salfF . $pass . $salfL);
            $logkh = $kh->logKhachHang($user, $passnew);
            if ($logkh) {
                $kh->updateOnline($logkh['makh']);
                // nếu đăng nhập thành công thì lưu thông tin vào trong section
                $_SESSION['makh'] = $logkh['makh'];
                $_SESSION['tenkh'] = $logkh['tenkh'];
                echo '<script> alert("Đăng nhập thành công");</script>';
                $makh = $logkh['makh'];
                $giohang = $gh->getGioHang($_SESSION['makh'])->rowcount();
                $sohd = $hd->selectSHDlogin($makh);
                if ($sohd) {
                    $_SESSION['masohd'] =  $sohd;
                } else {
                    $_SESSION['masohd'] =  0;
                }
                if ($giohang > 0) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
                    break;
                }
                if ($giohang <= 0) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                    break;
                }
            } else {
                echo '<script> alert("Đăng nhập không thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
                break;
            }
        }
        break;
    case 'dangxuat':
        $kh->updateOffline($_SESSION['makh']);
        unset($_SESSION['makh']);
        unset($_SESSION['tenkh']);
        unset($_SESSION['masohd']);
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
        break;
}
