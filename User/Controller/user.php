<?php
if (isset($_SESSION['makh'])) {
    $act = "user";
    $makh = $_SESSION['makh'];
    $us = new user();
    $hd = new hoadon();
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case "thongtinkhachhang":
            include_once "./View/thongtinkhachhang.php";
            break;
        case "thongtinkhachhangedit":
            include_once "./View/thongtinkhachhang.php";
            break;
        case "thongtinkhachhangedit_action":
            $check1 = true;
            if (!empty($_FILES['imagenew1']['name'])) {
                $check = uploadImagenew1();
                $hinh = $_FILES['imagenew1']['name'];
            } else if (empty($_FILES['imagenew1']['name']) && !empty($_FILES['imagenew']['name'])) {
                $check = uploadImagenew();
                $hinh = $_FILES['imagenew']['name'];
            } else {
                $hinh = $_POST['image'];
                $check = true;
            }
            if (isset($_SERVER['REQUEST_METHOD']) == "POST" && $check !== false) {
                $makh = $_POST['makh'];
                $tenkh = $_POST['tenkh'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sodienthoai = $_POST['sodienthoai'];
                if (strlen($sodienthoai) != 10) {
                    echo '<script> alert("Số Điện Thoại Phải là 10 Số");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=thongtinkhachhangedit"/>';
                    break;
                }
                // đem dữ liệu này lưu vào database
                $check1 = $us->checkUser($username, $email)->rowCount();
                if ($check1 > 1) {
                    echo '<script> alert("Tên Đăng Nhập Hoặc Email Tồn Tại");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=thongtinkhachhangedit"/>';
                    break;
                } else {
                    $check = $us->updateKH($makh, $tenkh, $username, $email, $diachi, $sodienthoai, $hinh);
                    if ($check !== false) {
                        echo '<script>alert("Update dữ liệu thành công");</script>';
                        echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=thongtinkhachhang"/>';
                        break;
                    } else {
                        echo '<script>alert("Update dữ liệu ko thành công");</script>';
                        echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=thongtinkhachhangedit"/>';
                        break;
                    }
                }
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=thongtinkhachhangedit"/>';
                break;
            }
            break;
        case "lichsumuahang":
            include_once "./View/lichsumuahang.php";
            break;
        case "lichsuchitiet":
            include_once "./View/lichsuchitiet.php";
            break;
        case "trangthai":
            include_once "./View/lichsumuahang.php";
            break;
        case "huydon":
            if (isset($_GET['masohd'])) {
                include_once "./View/datho.php";
                break;
            }
        case "huydon_action":
            $masohd = $_POST['masohd'];
            $ghichu = $_POST['lydo'];
            $hd->updateGhiChu($masohd, $ghichu);
            $hanghoa = $hd->selectHangHoaLai($masohd);
            foreach ($hanghoa as $key => $item) {
                $mahh = $item['mahh'];
                $idmau = $item['idmau'];
                $idsize = $item['idsize'];
                $soluongmua = $item['soluongmua'];
                $hd->updateSoLuongTra($mahh, $idmau, $idsize, $soluongmua);
            }
            $ud = $us->updateHuyDon($masohd);
            echo '<script>alert("Hủy Đơn Thành Công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=lichsumuahang"/>';
            break;
        case "xacnhan":
            if (isset($_GET['masohd'])) {
                $masohd = $_GET['masohd'];
                $ud = $us->updateTinhTrang($masohd);
                echo '<script>alert("Xác Nhận Thành Công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=trangthai&tt=2"/>';
                break;
            }
        case "trahang":
            if (isset($_GET['masohd'])) {
                include_once "./View/datho.php";
                break;
            }
        case "trahang_action":
            $masohd = $_POST['masohd'];
            $ghichu = $_POST['lydo'];
            $hd->updateGhiChu($masohd, $ghichu);
            $hanghoa = $hd->selectHangHoaLai($masohd);
            foreach ($hanghoa as $key => $item) {
                $mahh = $item['mahh'];
                $idmau = $item['idmau'];
                $idsize = $item['idsize'];
                $soluongmua = $item['soluongmua'];
                $hd->updateSoLuongTra($mahh, $idmau, $idsize, $soluongmua);
            }
            $ud = $us->updateTrangHang($masohd);
            echo '<script>alert("Đã Gửi Yêu Cầu Trả Hàng");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=lichsumuahang"/>';
            break;
        case "huytrahang":
            if (isset($_GET['masohd'])) {
                $masohd = $_GET['masohd'];
                $hanghoa = $hd->selectHangHoaLai($masohd);
                foreach ($hanghoa as $key => $item) {
                    $mahh = $item['mahh'];
                    $idmau = $item['idmau'];
                    $idsize = $item['idsize'];
                    $soluongmua = $item['soluongmua'];
                    $hd->updateSoLuongTraUnDo($mahh, $idmau, $idsize, $soluongmua);
                }
                $ud = $us->updateHuyTrangHang($masohd);
                echo '<script>alert("Đã Thêm Hàng Vào Danh Sách Chờ");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=trangthai&tt=0"/>';
                break;
            }
        case "diachimoi":
            include_once "./View/datho.php";
            break;
        case "sudungdiachimoi":
            $makh = $_SESSION['makh'];
            $stt = $_GET['id'];
            $check = $us->updateSuDung($makh, $stt);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thanhtoan&act=thanhtoan1"/>';
            break;
        case "themdiachimoi":
            if (isset($_POST['makh'])) {
                $makh = $_SESSION['makh'];
                $tenkh = $_POST['tenkh'];
                $diachi = $_POST['diachi'];
                $sodienthoai = $_POST['sodienthoai'];
                $check = $us->checkDiaChiMoi($makh, $diachi)->rowCount();
                if ($check > 0) {
                    echo '<script>alert("Địa Chỉ Này Đã Có Rồi");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=diachimoi"/>';
                    break;
                }
                $check = $us->insertDiaChiMoi($makh, $diachi);
                echo '<script>alert("Thêm Địa Chỉ Mới Thành Công");</script>';
                include_once "./View/order.php";
                break;
            }
        case "datho":
            include_once "./View/datho.php";
            break;
        case "sudungdatho":
            $makh = $_SESSION['makh'];
            $stt = $_GET['id'];
            $check = $us->updateSuDung($makh, $stt);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thanhtoan&act=thanhtoan1"/>';
            break;
        case "themdatho":
            if (isset($_POST['makh'])) {
                $makh = $_SESSION['makh'];
                $tenkh = $_POST['tenkh'];
                $diachi = $_POST['diachi'];
                $sodienthoai = $_POST['sodienthoai'];
                $check = $us->checkDatho($makh, $tenkh, $diachi, $sodienthoai)->rowCount();
                if ($check > 0) {
                    echo '<script>alert("Thông Tin Bị Trùng");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=user&act=datho"/>';
                    break;
                }
                $check = $us->insertDatHo($makh, $tenkh, $diachi, $sodienthoai);
                echo '<script>alert("Thêm Đặt Hộ Thành Công");</script>';
                include_once "./View/order.php";
                break;
            }
        case "xoathongtin":
            $stt = $_GET['id'];
            $makh = $_SESSION['makh'];
            $check = $us->delThongTIn($stt, $makh);
            echo '<script>alert("Xóa Thành Công");</script>';
            include_once "./View/order.php";
            break;
    }
} else {
    echo '<script>alert("Hãy Đăng Nhập");</script>';
    echo '<meta http-equiv=refresh content="0;url=./index.php?action=dangnhap"/>';
}
