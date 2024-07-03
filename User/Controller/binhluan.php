<?php
if (isset($_SESSION['makh'])) {
    $act = "binhluan";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'binhluan_action':
            if (isset($_SESSION['makh'])) {
                $bl = new binhluan();
                $makh = $_SESSION['makh'];
                $cmt = $_POST['comment'];
                $masp = $_POST['txtmahh'];
                if (!isset($_POST['diem'])) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '&actt=danhgia&thieudiem"/>';
                } else {
                    $diem = $_POST['diem'];
                    $bl->insertBinhLuan($makh, $masp, $cmt, $diem);
                    echo '<script> alert("Bình Luận Thành Công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '&actt=3"/>';
                }
                break;
            }
        case 'binhluanthich':
            if (isset($_POST['thich'])) {
                $bl = new binhluan();
                // $masp = $_POST['txtmahh'];
                $thich = $_POST['thich'];
                $idcomment = $_POST['idcomment'];
                $masp = $_POST['masp'];
                $makh = $_SESSION['makh'];
                $bl->updateBinhLuan($idcomment, $thich, $makh);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '&actt=' . $idcomment . '"/>';
                break;
            } else {
                echo '<script> alert("Thích Thất Bại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '&actt=2"/>';
                break;
            }
        case 'binhluanbothich':
                $bl = new binhluan();
                $idcomment = $_GET['idcomment'];
                $masp = $_GET['id'];
                $makh = $_SESSION['makh'];
                $bl->updateBoBinhLuan($idcomment, $makh);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . $masp . '&actt=' . $idcomment . '"/>';
                break;
    }
} else {
    echo '<script> alert("Chưa Đăng Nhập");</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
}
