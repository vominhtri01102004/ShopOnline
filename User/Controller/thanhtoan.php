<?php
if (isset($_SESSION['makh'])) {
    $act = 'thanhtoan';
    $hd = new hoadon();
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'thanhtoan':
            $us = new user();
            $vc = new voucher();
            $vc->updateLaiVouCherOrder($_SESSION['makh']);
            $us->updateLaiDatHo($_SESSION['makh']);
            include_once "./View/order.php";
            break;
        case 'thanhtoan1':
            include_once "./View/order.php";
            break;
        case 'thanhtoan_action':
            if (isset($_SESSION['makh'])) {
                $makh = $_SESSION['makh'];

                if ($_POST['idship'] == 0) {
                    echo '<script>alert("Hãy Chọn Một Loại Ship");</script>';
                    // echo '<meta http-equiv=refresh content="0;url=./index.php?action=thanhtoan"/>';
                    include_once "./View/order.php";

                    break;
                }
                if (isset($_POST['ghichu'])) {
                    $ghichu = $_POST['ghichu'];
                } else {
                    $ghichu = 0;
                }
                $mavoucher = $_POST['mavoucher'];
                $dungcho = $_POST['dungcho'];
                $tienship = $_POST['tienship'];
                $tongtien = $_POST['tongtien'];
                $tenkh = $_POST['tenkh'];
                $sodt = $_POST['sodt'];
                $dc = $_POST['diachi'];
                if ($dungcho == 'Hàng Hóa') {
                    $voucherhanghoa = $_POST['giatri'];
                    $vouchership = 0;
                }
                if ($dungcho == 'Ship Hàng') {
                    $vouchership = $_POST['giatri'];
                    $voucherhanghoa = 0;
                }
                if ($mavoucher == 0) {
                    $vouchership = 0;
                    $voucherhanghoa = 0;
                }
                $sohd = $hd->insertHoaDon($makh, $tongtien, $tienship, $vouchership, $voucherhanghoa, $ghichu, $tenkh, $dc, $sodt);
                $total = 0;
                $gh = new giohang();
                $hh = new hanghoa();
                $giohang = $gh->getGioHang($_SESSION['makh']);
                foreach ($giohang as $key => $item) {
                    $hinh = $hh->getHangHoaHinhMauSize($item['mahh'], $item['idmau'], $item['idsize']);
                    $hinh = $hinh['hinh'];
                    $loai = $hh->selectHangHoa($item['mahh'], $item['idmau'], $item['idsize']);
                    $tenloai = $loai['tenloai'];
                    $dongia = $loai['dongia'];
                    $giamgia = $loai['giamgia'];
                    $tenhh = $loai['tenhh'];

                    if ($item['giamgia'] != 0) {
                        $thanhtien = ($item['soluongmua'] * $item['giamgia']);
                    } else {
                        $thanhtien = ($item['soluongmua'] * $item['dongia']);
                    }
                    $hd->insertCTHoadon($sohd, $item['mahh'], $item['soluongmua'], $item['mausac'], $item['size'], $dongia, $giamgia, $tenloai, $thanhtien, $hinh, $tenhh);
                    $hd->updateSoLuongTon($item['mahh'], $item['soluongmua'], $item['mausac'], $item['size']);
                    $soluongton = $hd->CheckSLT($item['mahh'], $item['mausac'], $item['size']);
                    $soluong = $soluongton['soluongton'];
                    if ($soluong < 0) {
                        $hd->updateSoLuongTon0($item['mahh'], $item['mausac'], $item['size']);
                    }
                    $gh->delGiohang($makh, $item['mahh'], $item['idmau'], $item['idsize']);
                }

                $vc = new voucher();
                $vc->deleteVoucherDaSuDung($makh, $mavoucher);
                $_SESSION['masohd'] =  $sohd;
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=thankyou&act=thankyou"/>';
            }
    }
} else {
    echo '<script>alert("Hãy Đăng Nhập");</script>';
    echo '<meta http-equiv=refresh content="0;url=./index.php?action=dangnhap"/>';
}
