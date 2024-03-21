<?php
if (isset($_SESSION['makh'])) {
    $makh = $_SESSION['makh'];
    $hd = new hoadon();
    $sohd = $hd->insertHoaDon($makh);
    $_SESSION['masohd'] = $sohd;
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $item) {
        $hd->insertCTHoaDon($sohd, $item['mahh'], $item['soluong'], $item['mausac'], $item['size'], $item['thanhtien']);
        $hd->updateSoLuongTon($item['mahh'], $item['soluong']);
        $total += $item['thanhtien'];
    }
    $hd->updateTongTien($sohd, $makh, $total);
}
include_once "./View/order.php";
?>