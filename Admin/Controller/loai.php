<?php
$act = "loai";
$loai = new loai();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'loai':
        include_once "./View/addloaisanpham.php";
        break;
    case 'loai_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $check = $loai->checkloai($_POST['tenloai'])->rowCount();
            if ($check > 0) {
                echo "<script>alert('Loại Này Đã Tồn Tại')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            }
            $loai->insertLoai($_POST['tenloai']);
            echo "<script>alert('Thêm thành công')</script>";
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
            break;
        }
    case "delloai":
        if (isset($_GET['id'])) {
            $maloai = $_GET['id'];
            $delLoai = $loai->delLoai($maloai);
            if ($delLoai) {
                echo "<script>alert('Bạn vừa xóa 1 loại')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            } else {
                echo "<script>alert('Lỗi')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            }
        }
        break;
    case 'update':
        if (isset($_GET['id'])) {
            $tenloai = $loai->getLoaiID($_GET['id']);
            $_SESSION['tenloai'] = $tenloai['tenloai'];
            $_SESSION['maloai'] = $tenloai['maloai'];
            include_once "./View/addloaisanpham.php";
            break;
        } else {
            echo "<script>Lỗi</script>";
            break;
        }
        break;
    case "update_action":
        if (isset($_SESSION['maloai'])) {
            $check = $loai->checkloai($_POST['tenloai'])->rowCount();
            if ($check >= 1) {
                echo "<script>alert('Loại Này Đã Tồn Tại')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            }
            $updateLoai = $loai->updateLoai($_SESSION['maloai'], $_POST['tenloai']);
            if ($updateLoai !== false) {
                echo "<script>alert('Update thành công')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            } else {
                echo "<script>alert('Lỗi')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                break;
            }
        }
        break;
}
