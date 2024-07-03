<?php
$act = "dangnhap";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        if (isset($_SESSION['idnv'])) {
            echo '<script> alert("Đã Đăng Nhập");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa"/>';
            break;
        }
        include_once "./View/dangnhap.php";
        break;

    case 'dangnhap_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpassword'];
            $salfF = "G435#";
            $salfL = "T34a!&";
            $passnew = md5($salfF . $pass . $salfL);
            $nv = new qlynguoi();
            $check = $nv->selectAdmin($user, $passnew);
            if ($check !== false) {
                $_SESSION['tennv'] = $check['username'];
                $_SESSION['chucvu'] = $check['chucvu'];
                $_SESSION['idnv'] = $check['idnv'];
                echo '<script>alert("Đăng nhập thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
                break;
            } else {
                echo '<script>alert("Đăng nhập ko thành công");</script>';
                include_once "./View/dangnhap.php";
                break;
            }
        }
        break;
    case "dangxuat":
        unset($_SESSION['tennv']);
        unset($_SESSION['chucvu']);
        unset($_SESSION['idnv']);
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
        break;
}
