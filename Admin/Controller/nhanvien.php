<?php
$act = "nhanvien";
$mau = new Mau();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'nhanvien':
        include_once "./View/qlynguoi.php";
        break;
    case "nhanvien_update":
        include_once "./View/qlynguoiedit.php";
        break;
    case "nhanvien_update_action":
        $idnv = $_POST['idnv'];
        $tennv = $_POST['tennv'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $sodienthoai = $_POST['sodienthoai'];
        $chucvu = $_POST['chucvu'];
        $ql = new qlynguoi();
        $check1 = $ql->checkNhanVien($username, $email)->rowCount();
        if ($check1 > 1) {
            echo '<script> alert("Tên Đăng Nhập Hoặc Email Tồn Tại");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=nhanvien&act=nhanvien_update&idnv=' . $idnv . '"/>';
            break;
        }
        $check = $ql->updateNhanVien($idnv, $tennv, $username, $email, $diachi, $sodienthoai, $chucvu);
        if ($check !== false) {
            $_SESSION['tennv'] = $username;
            $_SESSION['chucvu'] = $chucvu;
            echo '<script>alert("Update dữ liệu thành công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=nhanvien&act=nhanvien"/>';
            break;
        } else {
            echo '<script>alert("Update dữ liệu ko thành công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=nhanvien&act=nhanvien_update&idnv=' . $idnv . '"/>';
            break;
        }

        include_once "./View/qlynguoi.php";
        break;
    case "themnhanvien":
        include_once "./View/qlynguoiedit.php";
        break;
    case "themnhanvien_action":
        $idnv = $_POST['idnv'];
        $tennv = $_POST['tennv'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $sodienthoai = $_POST['sodienthoai'];
        $matkhau = $_POST['matkhau'];
        $chucvu = $_POST['chucvu'];
        $salfF = "G435#";
        $salfL = "T34a!&";
        $matkhaumoi = md5($salfF . $matkhau . $salfL);
        $ql = new qlynguoi();
        $check = $ql->checkNhanVien($username, $email)->rowCount();
        if ($check >= 1) {
            echo '<script> alert("Tên Đăng Nhập Hoặc Email Tồn Tại");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=nhanvien&act=themnhanvien"/>';
            break;
        } else {
            //insert vào database   
            $check1 = $ql->insertNhanVien($tennv, $username, $matkhaumoi, $email, $diachi, $sodienthoai, $chucvu);
            if ($check1 !== false) {
                echo '<script> alert("Đăng ký thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=nhanvien&act=nhanvien"/>';
                break;
            } else {
                echo '<script> alert("Đăng ký không thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./action=nhanvien&act=themnhanvien"/>';
                break;
            }
        }
        include_once "./View/qlynguoi.php";
        break;


    case "delnhanvien":
        if (isset($_GET['idnv'])) {
            $idnv = $_GET['idnv'];
            $tennv = $_GET['tennv'];
            $chucvu = $_GET['chucvu'];
            $ql = new qlynguoi();
            $check = $ql->deleteNhanVien($idnv);
            if ($check) {
                echo "<script>alert('Đã Xóa Nhân Viên Tên " . $tennv . " Với Chức Vụ " . $chucvu . "')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=nhanvien&act=nhanvien"/>';
                break;
            } else {
                echo "<script>alert('Lỗi')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=nhanvien&act=nhanvien"/>';
                break;
            }
        }
        break;
}
