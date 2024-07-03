<?php
$act = "size";
$size = new size();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'size':
        include_once "./View/addsize.php";
        break;

    case "size_action":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $check = $size->checksize($_POST['size'])->rowCount();
            if ($check > 0) {
                echo "<script>alert('Size Này Đã Tồn Tại')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            }
            // insert vào bảng size
            $check = $size->insertSize($_POST['size']);
            echo "<script>alert('Thêm thành công')</script>";
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=size"/>';
            break;
        }
        break;
    case "delsize":
        if (isset($_GET['id'])) {
            $idsize = $_GET['id'];
            $delsize = $size->delSize($idsize);
            if ($delsize) {
                echo "<script>alert('Bạn vừa xóa 1 size')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=size"/>';
                break;
            } else {
                echo "<script>alert('Lỗi')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=size"/>';
                break;
            }
        }
        break;
}
