<?php
$act = "size";
$size = new size();
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'size':
        include_once "./View/addsize.php";
        break;
    
    case "size_action":
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $flag = false;
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    # code...
                    echo "<script>alert('Nhập đầy đủ thông tin')</script>";
                    $flag = false;
                } else {
                    $flag = true;
                }
            }
            if ($flag) {
                // insert vào bảng size
                $check = $size->insertSize($_POST['size']);
                echo "<script>alert('Thêm thành công')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=size"/>';
            }
        }
        break;
    case "delsize":
        if (isset($_GET['id'])) {
            $idsize = $_GET['id'];
            $delsize = $size->delSize($idsize);
            if ($delsize) {
                echo "<script>alert('Bạn vừa xóa 1 size')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=size"/>';
            } else {
                echo "<script>alert('Lỗi')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=size"/>';
            }
        }
        break;
}
?>