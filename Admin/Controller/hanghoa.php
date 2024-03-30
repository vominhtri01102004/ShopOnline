<?php
if (isset ($_SESSION['admin'])) {
    $act = "hanghoa";
    if (isset ($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'hanghoa':
            include_once "./View/hanghoa.php";
            break;

        case 'insert_hanghoa':
            include_once "./View/edithanghoa.php";
            break;
        case 'insert_action':
            // nhận thông tin
            if (isset ($_SERVER['REQUEST_METHOD']) == "POST") {
                $flag = false;
                foreach ($_POST as $key => $value) {
                    // Kiểm tra nếu trường đó không có giá trị
                    if ($value=="" || !isset($_POST['size']) || !isset($_POST['soluong']) ) {
                        echo "<script>alert('Nhập và chọn đầy đủ các thông tin bên dưới $value')</script>";
                        $flag = false;
                        echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoa"/>';
                        break;
                    } else {
                        $flag = true;
                    }
                }
                if ($flag) {
                    $tenhh = $_POST['tenhh'];
                        $maloai = $_POST['maloai'];
                        $dongia = $_POST['dongia'];
                        $giamgia = $_POST['giamgia'];
                        // $size = $_POST['size'];
                        // $soluong = $_POST['soluong'];
                        $hinhanh = $_FILES['image']['name'];
                        $mota = $_POST['mota'];
                        // đem dữ liệu này lưu vào database
                        $hh = new hanghoa();
                        uploadImage();
                        $check = $hh->insertHangHoa($tenhh, $maloai, $dongia, $giamgia, $hinhanh, $mota);
                        // thêm sản phẩm vào bảng cthanghoa
                        if(isset($_POST['size']) && isset($_POST['soluong'])) {
                            $sizes = $_POST['size'];
                            $quantities = $_POST['soluong'];
                            $mahh = $hh->getIDNew();
                            // Lặp qua các giá trị đã được gửi đi
                            for($i = 0; $i < count($sizes); $i++) {
                                // Lấy giá trị của size và số lượng tương ứng
                                $size = $sizes[$i];
                                $soluong = $quantities[$i];
                                // thêm vào bảng
                                $ct = new cthanghoa();
                                $ct->insertCTHangHoa($idhanghoa, $size, $soluong);
                                // if ($check === false) {
                                //     break;
                                // }
                                // echo '<script>alert("'.$check.'");</script>';
                            }
                        }
                        if ($check !== false) {
                            echo '<script>alert("Thêm dữ liệu thành công");</script>';
                            echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoa"/>';
                        } else {
                            echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                            include_once "./View/edithanghoa.php";
                        }
                }
                
            }
            break;
        case 'update_hanghoa':
            include_once "./View/edithanghoa.php";
            break;
        case 'update_action':
            if (isset ($_SERVER['REQUEST_METHOD']) == "POST") {
                $mahh = $_POST['mahh'];
                $tenhh = $_POST['tenhh'];
                $maloai = $_POST['maloai'];
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                $mota = $_POST['mota'];
                // đem dữ liệu này lưu vào database
                $hh = new hanghoa();
                // $check=$hh->insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
                $check = $hh->updateHangHoa($mahh, $tenhh, $maloai, $dongia, $giamgia, $mota);
                if ($check !== false) {
                    echo '<script>alert("Update dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
                } else {
                    echo '<script>alert("UPdate dữ liệu ko thành công");</script>';
                    include_once "./View/edithanghoa.php";
                }
            }
            break;
            case 'delete_hanghoa':
                if(isset($_GET['id']))
                {
                    $mahh=$_GET['id'];
                    $hh = new hanghoa();
                    $check=$hh->delHangHoa($mahh);
                    if ($check==true) {
                        echo '<script>alert("Bạn vừa xóa 1 sản phẩm");</script>';
                        echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
                    } else{
                        echo '<script>alert("Lỗi");</script>';
                        echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
                    }
                }
                break;
    }
} else {
    echo "<script>alert('Vui lòng đăng nhập')</script>";
    include_once "./View/dangnhap.php";
}

?>