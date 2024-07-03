
<?php
$act = 'voucher';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case "voucher":
        include_once "./View/voucher.php";
        break;
    case "luuvoucher":
        $makh = $_SESSION['makh'];
        $mavoucher = $_GET['mavoucher'];
        $vc = new voucher();
        $check = $vc->insertVoucher($makh, $mavoucher);
        echo '<script>alert("Lưu Voucher Thành Công");</script>';
        echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher"/>';
        break;
    case "tatcavoucher":
        $makh = $_SESSION['makh'];
        include_once "./View/voucher.php";
        break;
    case "sudungvoucher":
        $gh = new voucher();
        $makh = $_SESSION['makh'];
        $mavoucher = $_GET['mavoucher'];
        $check = $gh->updateSuDungVoucher($makh, $mavoucher);
        include_once "./View/order.php";
        break;
    case "sudungship":
        if (isset($_SESSION['makh'])) {
            $gh = new voucher();
            $makh = $_SESSION['makh'];
            $idship = $_GET['idship'];
            $check = $gh->updateSuDungShip($makh, $idship);
            include_once "./View/order.php";
        } else {
            echo '<script>alert("Hãy Đăng Nhập");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=dangnhap"/>';
            break;
        }
        break;
}
