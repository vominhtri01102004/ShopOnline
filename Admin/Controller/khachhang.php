<?php
if (isset($_SESSION['tennv'])) {
    $act = "khachhang";
    $mau = new Mau();
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'khachhang':
            include_once "./View/qlynguoi.php";
            break;

        case "khachhang_update":
            include_once "./View/qlynguoiedit.php";
            break;
        case "khachhang_update_action":
            $checkhinh = true;
            if (!empty($_FILES['imagenew1']['name'])) {
                $checkhinh = uploadImagenew1();
                $hinh = $_FILES['imagenew1']['name'];
            } else if (empty($_FILES['imagenew1']['name']) && !empty($_FILES['imagenew']['name'])) {
                $checkhinh = uploadImagenew();
                $hinh = $_FILES['imagenew']['name'];
            } else {
                $hinh = $_POST['image'];
            }
            if ($checkhinh === false) {
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=khachhang_update&makh= ' . $makh . '"/>';
                break;
            }
            $makh = $_POST['makh'];
            $tenkh = $_POST['tenkh'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            $ql = new qlynguoi();
            $check1 = $ql->checkKhachHang($username, $email)->rowCount();
            if ($check1 > 1) {
                echo '<script> alert("Tên Đăng Nhập Hoặc Email Tồn Tại");</script>';
                break;
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=khachhang_update&makh= ' . $makh . '"/>';
            } else {
                $check = $ql->updateKhachHang($makh, $tenkh, $username, $email, $diachi, $sodienthoai, $hinh);
                if ($check !== false) {
                    echo '<script>alert("Update dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=khachhang&act=khachhang"/>';
                    break;
                } else {
                    echo '<script>alert("Update dữ liệu ko thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=khachhang&act=khachhang_update&makh= ' . $makh . '"/>';
                    break;
                }
            }

            include_once "./View/hanghoa.php";
            break;
        case "themkhachhang":
            include_once "./View/qlynguoiedit.php";
            break;
        case "themkhachhang_action":
            $checkhinh = true;
            if (!empty($_FILES['imagenew1']['name'])) {
                $checkhinh = uploadImagenew1();
                $hinh = $_FILES['imagenew1']['name'];
            } else if (empty($_FILES['imagenew1']['name']) && !empty($_FILES['imagenew']['name'])) {
                $checkhinh = uploadImagenew();
                $hinh = $_FILES['imagenew']['name'];
            } else {
                $hinh = $_POST['image'];
            }
            if ($checkhinh === false) {
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=themkhachhang"/>';
                break;
            }
            $makh = $_POST['makh'];
            $tenkh = $_POST['tenkh'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            $matkhau = $_POST['matkhau'];
            $salfF = "G435#";
            $salfL = "T34a!&";
            $matkhaumoi = md5($salfF . $matkhau . $salfL);
            $ql = new qlynguoi();
            $check = $ql->checkKhachHang($username, $email)->rowCount();
            if ($check >= 1) {
                echo '<script> alert("Tên Đăng Nhập Hoặc Email Tồn Tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=themkhachhang"/>';
                break;
            } else {
                $check1 = $ql->insertKhachHang($tenkh, $username, $matkhaumoi, $email, $diachi, $sodienthoai, $hinh);
                if ($check1 !== false) {
                    echo '<script> alert("Đăng ký thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=khachhang"/>';
                    break;
                } else {
                    echo '<script> alert("Đăng ký không thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./action=khachhang&act=themkhachhang"/>';
                    break;
                }
            }
            include_once "./View/qlynguoi.php";
            break;

        case "delkhachhang":
            if (isset($_GET['makh'])) {
                $makh = $_GET['makh'];
                $ql = new qlynguoi();
                $check = $ql->deleteKhachHang($makh);
                if ($check) {
                    echo "<script>alert('Đã Xóa 1 Khách Hàng')</script>";
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=khachhang&act=khachhang"/>';
                    break;
                } else {
                    echo "<script>alert('Lỗi')</script>";
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=khachhang&act=khachhang"/>';
                    break;
                }
            }
            break;
    }
}