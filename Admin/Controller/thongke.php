<?php
$act = "thongke";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'thongkesanpham':
        include_once "./View/thongke.php";
        break;
    case 'thongkedonhang':
        include_once "./View/thongke.php";
        break;
    case 'thongkedoanhthu':
        include_once "./View/thongke.php";
        break;
    case 'thongkesanpham_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_SESSION['nam'] = $_POST['nam'];
            $_SESSION['thang'] = $_POST['thang'];
            $hh = new hanghoa();
            $thongKeResult = $hh->getThongKeSanPham($nam, $thang);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thongke&act=thongkesanpham"/>';
            break;
        }
    case 'thongkedonhang_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_SESSION['nam'] = $_POST['nam'];
            $_SESSION['thang'] = $_POST['thang'];
            $hh = new hanghoa();
            $thongKeResult = $hh->getThongKeDonHang($nam, $thang);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thongke&act=thongkedonhang"/>';
            break;
        }
    case 'thongkedoanhthu_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_SESSION['nam'] = $_POST['nam'];
            $_SESSION['thang'] = $_POST['thang'];
            $hh = new hanghoa();
            $thongKeResult = $hh->getThongKeDonHang($nam, $thang);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thongke&act=thongkedoanhthu"/>';
            break;
        }
}
