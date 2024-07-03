    <?php
    $act = "voucher";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'ship':
            include_once "./View/voucher.php";
            break;
        case 'ship_insert':
            include_once "./View/voucheredit.php";
            break;
        case 'ship_update':
            include_once "./View/voucheredit.php";
            break;
        case "ship_update_action":
            $idship = $_POST['idship'];
            $tenship = $_POST['tenship'];
            $gia = $_POST['gia'];
            $gia = str_replace(',', '', $gia);
            if ($gia <= 0) {
                echo '<script> alert("Giá Phải Lớn Hơn 0");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=ship_update&idship=' . $idship . '"/>';
                break;
            }
            if (!is_numeric($gia)) {
                echo '<script> alert("Giá Phải Là Số");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=ship_update&idship=' . $idship . '"/>';
                break;
            }
            $ql = new voucher();
            $check1 = $ql->checkShip($tenship)->rowCount();
            if ($check1 > 1) {
                echo '<script> alert("Loại Ship Này Đã Tồn Tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=ship_update&idship=' . $idship . '"/>';
                break;
            } else {
                $check = $ql->updateShip($idship, $tenship, $gia);
                if ($check !== false) {
                    echo '<script>alert("Update dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=ship"/>';
                    break;
                } else {
                    echo '<script>alert("Update dữ liệu ko thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=ship_update&idship=' . $idship . '"/>';
                    break;
                }
            }
            break;
        case 'ship_insert_action':
            $tenship = $_POST['tenship'];
            $gia = $_POST['gia'];
            $gia = str_replace(',', '', $gia);
            if ($gia <= 0) {
                echo '<script> alert("Giá Phải Lớn Hơn 0");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=ship_insert"/>';
                break;
            }
            if (!is_numeric($gia)) {
                echo '<script> alert("Giá Phải Là Số");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=ship_insert"/>';
                break;
            }
            $ql = new voucher();
            $check1 = $ql->checkShip($tenship)->rowCount();
            if ($check1 >= 1) {
                echo '<script> alert("Loại Ship Này Đã Tồn Tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=ship_insert"/>';
                break;
            } else {
                $check = $ql->insertShip($tenship, $gia);
                if ($check !== false) {
                    echo '<script>alert("Thêm Loại Ship Mới Thành Công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=ship"/>';
                    break;
                } else {
                    echo '<script>alert("Thêm Loại Ship Mới Không Thành Công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=ship_insert"/>';
                    break;
                }
            }
            break;
        case 'delship':
            $ql = new voucher();
            $idship = $_GET['idship'];
            $check1 = $ql->delShip($idship);
            echo '<script>alert("Xóa Ship Thành Công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=ship"/>';
            break;
        case 'voucher':
            include_once "./View/voucher.php";
            break;
        case 'voucher_insert':
            include_once "./View/voucheredit.php";
            break;
        case 'voucher_update':
            include_once "./View/voucheredit.php";
            break;
        case "voucher_update_action":
            $mavoucher = $_POST['mavoucher'];
            // $loai = $_POST['loaivoucher'];
            $loai = trim($_POST['loaivoucher']);
            $dungcho = trim($_POST['dungcho']);
            $soluong = $_POST['soluong'];
            $batdau = $_POST['batdau'];
            $ketthuc = $_POST['ketthuc'];
            $toithieu = $_POST['toithieu'];
            if ($loai == 'VND') {
                $toida = $_POST['giatri'];
            }
            if ($loai == 'Phần Trăm') {
                $toida = $_POST['toida'];
            }
            $gia = $_POST['giatri'];
            $gia = str_replace(',', '', $gia);
            $toida = str_replace(',', '', $toida);
            $toithieu = str_replace(',', '', $toithieu);
            if (!is_numeric($gia) || !is_numeric($toida) || !is_numeric($toithieu)) {
                echo '<script> alert("Giá Trị Số Không Hợp Lệ");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_update&mavoucher=' . $mavoucher . '&gia= ' . $gia . '"/>';
                break;
            }
            if ($loai == 'VND') {
                if ($toida < $gia) {
                    echo '<script> alert("Giá Trị Voucher Không Thể Lớn Hơn Giảm Tối Đa");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_update&mavoucher=' . $mavoucher . '"/>';
                    break;
                }
            }
            if ($loai == 'Phần Trăm') {
                if ($gia > 100) {
                    echo '<script> alert("Phần Trăm Không Thể Lớn Hơn 100");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_update&mavoucher=' . $mavoucher . '"/>';
                    break;
                }
            }
            if ($batdau > $ketthuc) {
                echo '<script> alert("Ngày Bắt Đầu Phải Nhỏ Hơn Ngày Kết Thúc");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_update&mavoucher=' . $mavoucher . '"/>';
                break;
            }
            if ($gia > $toithieu) {
                echo '<script> alert("Giá Trị Voucher Không Thể Lớn Hơn Mức Tối Thiểu");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_update&mavoucher=' . $mavoucher . '"/>';
                break;
            }
            $ql = new voucher();
            $check1 = $ql->checkVoucher($loai, $toithieu, $toida, $gia)->rowCount();
            if ($check1 > 1) {
                echo '<script> alert("Loại Voucher Này Đã Tồn Tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_update&mavoucher=' . $mavoucher . '"/>';
                break;
            } else {
                $check = $ql->updateVoucher($mavoucher, $loai, $dungcho, $soluong, $toithieu, $toida, $batdau, $ketthuc, $gia);
                if ($check !== false) {
                    echo '<script>alert("Update dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=voucher"/>';
                    break;
                } else {
                    echo '<script>alert("Update dữ liệu ko thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=voucher_update&mavoucher=' . $mavoucher . '"/>';
                    break;
                }
            }
            break;
        case 'voucher_insert_action':
            $loai = trim($_POST['loaivoucher']);
            $dungcho = trim($_POST['dungcho']);
            $soluong = $_POST['soluong'];
            $batdau = $_POST['batdau'];
            $ketthuc = $_POST['ketthuc'];
            $toithieu = $_POST['toithieu'];
            if ($loai == 'VND') {
                $toida = $_POST['giatri'];
            }
            if ($loai == 'Phần Trăm') {
                $toida = $_POST['toida'];
            }
            $gia = $_POST['giatri'];
            $gia = str_replace(',', '', $gia);
            $toida = str_replace(',', '', $toida);
            $toithieu = str_replace(',', '', $toithieu);
            if (!is_numeric($gia) || !is_numeric($toida) || !is_numeric($toithieu)) {
                echo '<script> alert("Giá Trị Số Không Hợp Lệ");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_insert"/>';
                break;
            }
            if ($loai == 'VND') {
                if ($toida < $gia) {
                    echo '<script> alert("Giá Trị Voucher Không Thể Lớn Hơn Giảm Tối Đa");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_insert"/>';
                    break;
                }
            }
            if ($loai == 'Phần Trăm') {
                if ($gia > 100) {
                    echo '<script> alert("Phần Trăm Không Thể Lớn Hơn 100");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_insert"/>';
                    break;
                }
            }
            if ($batdau > $ketthuc) {
                echo '<script> alert("Ngày Bắt Đầu Phải Nhỏ Hơn Ngày Kết Thúc");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_insert"/>';
                break;
            }
            if ($toida > $toithieu) {
                echo '<script> alert("Mức Tối Đa Phải Nhỏ Hơn Giá Trị Tối Thiểu");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_insert"/>';
                break;
            }
            $ql = new voucher();
            $check1 = $ql->checkVoucher($loai, $toithieu, $toida, $gia)->rowCount();
            if ($check1 >= 1) {
                echo '<script> alert("Loại Voucher Này Đã Tồn Tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=voucher_insert"/>';
            } else {
                $check = $ql->insertVoucher($loai, $dungcho, $soluong, $toithieu, $toida, $batdau, $ketthuc, $gia);
                if ($check !== false) {
                    echo '<script>alert("Thêm Voucher Mới Thành Công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=voucher"/>';
                    break;
                } else {
                    echo '<script>alert("Thêm Voucher Mới Không Thành Công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=voucher_insert"/>';
                    break;
                }
            }
            break;
        case 'delvoucher':
            $ql = new voucher();
            $mavoucher = $_GET['mavoucher'];
            $check1 = $ql->delVoucher($mavoucher);
            echo '<script>alert("Xóa Voucher Thành Công");</script>';
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=voucher&act=voucher"/>';
            break;
    }
