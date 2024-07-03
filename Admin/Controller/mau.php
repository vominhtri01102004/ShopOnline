<?php
$act = "mau";
$mau = new Mau();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'mau':
        include_once "./View/addmau.php";
        break;

    case "mau_action":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $check = $mau->checkmau($_POST['mau'])->rowCount();
            if ($check > 0) {
                echo "<script>alert('Màu Này Đã Tồn Tại')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            }
            // insert vào bảng mau
            $check = $mau->insertMau($_POST['mau']);
            echo "<script>alert('Thêm thành công')</script>";
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=mau"/>';
            break;
        }

    case "delmau":
        if (isset($_GET['id'])) {
            $idmau = $_GET['id'];
            $delmau = $mau->delMau($idmau);
            if ($delmau) {
                echo "<script>alert('Bạn vừa xóa 1 Màu')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=mau"/>';
                break;
            } else {
                echo "<script>alert('Lỗi')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=mau"/>';
                break;
            }
        }
        break;
}
