<?php
$act = "xacnhandon";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'xacnhandon':
        include_once "./View/xacnhandon.php";
        break;
    case 'trangthai':
        include_once "./View/xacnhandon.php";
        break;
    case 'xemchitiet':
        include_once "./View/xacnhandonchitiet.php";
        break;
    case 'xacnhan':
        if (isset($_GET['masohd'])) {
            $masohd = $_GET['masohd'];
            $tt = $_GET['tt'];
            $xnd = new xacnhandon();
            $ud = $xnd->updateTinhTrang($masohd);
            echo '<script>alert("Xác Nhận Thành Công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=xacnhandon&act=trangthai&tt='.$tt.'"/>';
            break;
        }
    case 'huydon':
        if (isset($_GET['masohd'])) {
            $masohd = $_GET['masohd'];
            $tt = $_GET['tt']+1;
            $xnd = new xacnhandon();
            $ud = $xnd->updateHuyDon($masohd);
            echo '<script>alert("Đã Hủy Đơn Thành Công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=xacnhandon&act=trangthai&tt=3"/>';
            break;
        }
}
