<?php
// unset($_SESSION['cart']);
// trước khi điều hướng qua View ,
// thì kiểm tra người dùng có giỏ hàng chưa
$gh = new giohang();
$act = "giohang";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        include_once "./View/cart.php";
        break;

    case 'giohang_action':
        // những cái thông tin cần mua
        // nhận được mahh,mausac,size,soluong
        $mahh = 0;
        $mausac = '';
        $size = '';
        $soluong = 0;
        if (isset($_POST['mahh'])) {
            $mahh = $_POST['mahh'];
            $mausac = $_POST['mymausac'];
            $size = $_POST['size'];
            $soluong = $_POST['soluong'];
            //controller yêu cầu modl add thông tin vào trong giở hàng
            $gh = new giohang();
            $gh->addHangHoa($mahh, $mausac, $size, $soluong);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            break;
        }
    case 'mualai':
        if (isset($_GET['masohd'])) {
            $masohd = $_GET['masohd'];
            $hd = new hoadon();
            $hanghoa = $hd->selectHangHoaLai($masohd);
            foreach ($hanghoa as $key => $item) {
                $mahh = $item['mahh'];
                $mausac = $item['idmau'];
                $size = $item['idsize'];
                $soluong = 1;
                $gh = new giohang();
                $gh->addHangHoa($mahh, $mausac, $size, $soluong);
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            break;
        }
    case 'delete_cart':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $idmau = $_GET['idmau'];
            $idsize = $_GET['idsize'];
            $del = $gh->delGiohang($_SESSION['makh'], $id, $idmau, $idsize);
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        break;
    case 'update_cart':
        if (isset($_POST['newqty'])) {
            $newqty = $_POST['newqty'];
            $giohang = $gh->getGioHang($_SESSION['makh'])->fetchAll(PDO::FETCH_ASSOC);
            foreach ($newqty as $key => $value) {

                if ($giohang[$key]['soluongmua'] != $value) {
                    $gh = new giohang();
                    $gh->updateHH($key, $value);
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        break;
}
