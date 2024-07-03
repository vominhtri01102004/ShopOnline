<?php
$act = "hanghoa";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;
    case 'tc':
        include_once "./View/testcode.php";
        break;
    case 'insert_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'insert_hanghoachitiet':
        include_once "./View/edithanghoachitiet.php";
        break;
    case 'chitiet':
        include_once "./View/hanghoa.php";
        break;
    case 'hienhanghoaall':
        $id = $_GET['id'];
        $page = $_GET['page'];
        $ct = new cthanghoa();
        $kt = $ct->updateHienHangHoaAll($id);
        echo '<script>alert("Đã Hiển Thị Tất Cả Hàng Hóa Có Id ' . $id . '");</script>';
        echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&page=' . $page . '"/>';
        break;
    case 'anhanghoaall':
        $id = $_GET['id'];
        $page = $_GET['page'];
        $ct = new cthanghoa();
        $kt = $ct->updateAnHangHoaAll($id);
        echo '<script>alert("Đã ẩn Tất Cả Hàng Hóa Có Id ' . $id . '");</script>';
        echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&page=' . $page . '"/>';
        break;
    case 'hienhanghoa':
        $id = $_GET['id'];
        $idmau = $_GET['idmau'];
        $idsize = $_GET['idsize'];
        $ct = new cthanghoa();
        $kt = $ct->updateHienHangHoa($id, $idmau, $idsize);
        echo '<script>alert("Hiển Trị Hàng Hóa Thành Công");</script>';
        echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=chitiet&id=' . $id . '"/>';
        break;
    case 'anhanghoa':
        $id = $_GET['id'];
        $idmau = $_GET['idmau'];
        $idsize = $_GET['idsize'];

        $ct = new cthanghoa();
        $kt = $ct->updateAnHangHoa($id, $idmau, $idsize);
        echo '<script>alert("Ẩn Hàng Hóa Thành Công");</script>';
        echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=chitiet&id=' . $id . '"/>';
        break;
    case 'insert_action':
        // nhận thông tin
        if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
            if ($_POST['maloai']) {
                $tenhh = $_POST['tenhh'];
                $maloai = $_POST['maloai'];
                $mota = $_POST['mota'];
                // đem dữ liệu này lưu vào database
                $hh = new hanghoa();
                $check = $hh->insertHangHoa($tenhh, $maloai, $mota);
                // thêm sản phẩm vào bảng cthanghoa
                if ($check !== false) {
                    $mahh = $hh->getIDNew();
                    $ct = new cthanghoa();
                    echo '<script>alert("Thêm dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoachitiet&id=' . $mahh . '"/>';
                    break;
                } else {
                    echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoa"/>';
                    break;
                }
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoa"/>';
                break;
            }
        }
        break;
    case 'insertchitiet_action':
        // nhận thông tin
        $mahh = $_POST['mahh'];
        if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
            $flag = false;
            foreach ($_POST as $key => $value) {
                // Kiểm tra nếu trường đó không có giá trị
                if ($value == "" || !isset($_POST['size']) || !isset($_POST['mau']) || !isset($_POST['soluong'])) {
                    echo "<script>alert('Nhập và chọn đầy đủ các thông tin bên dưới')</script>";
                    $flag = false;
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoachitiet&id=' . $mahh . '"/>';
                    break;
                } else {
                    $flag = true;
                }
            }
            if ($flag) {
                $dongia = $_POST['dongia'];
                $giamgia = $_POST['giamgia'];
                if ($dongia <= $giamgia) {
                    echo "<script>alert('Đơn Giá Phải Lớn Hơn Giảm Giá')</script>";
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoachitiet&id=' . $mahh . '"/>';
                    break;
                }
                $hh = new hanghoa();
                if (uploadImage() !== false) {
                    if (isset($_POST['size']) && isset($_POST['mau']) && isset($_POST['soluong'])) {
                        $idmau = $_POST['mau'];
                        $idsize = $_POST['size'];
                        $soluong = $_POST['soluong'];
                        $hinhanh = $_FILES['image']['name'];
                        // for ($i = 0; $i < count($sizes); $i++) {
                        //     // Lấy giá trị của size và số lượng tương ứng
                        //     $size = $sizes[$i];
                        //     $mau = $maus[$i];
                        //     $soluong = $quantities[$i];
                        //     $ct = new cthanghoa();
                        //     $kt = $ct->KiemTrahangHoa($mahh, $mau, $size);
                        $ct = new cthanghoa();
                        $kt = $ct->KiemTrahangHoa($mahh, $idmau, $idsize);
                        if ($kt < 1) {
                            $check = $ct->insertCTHangHoa($mahh, $idmau, $idsize, $dongia, $soluong, $hinhanh, $giamgia);
                            if ($check !== false) {
                                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=chitiet&id=' . $mahh . '"/>';
                                break;
                            } else {
                                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoachitiet&id=' . $mahh . '"/>';
                                break;
                            }
                        } else {
                            echo '<script>alert("Sản Phẩm Với Màu Này Đã Có Rồi");</script>';
                            echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoachitiet&id=' . $mahh . '"/>';
                            break;
                        }
                        // }else{   
                        //     echo '<script>alert("Thêm dữ liệu thành công");</script>';
                        //     echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=chitiet&id=' . $mahh . '"/>';
                        //     break;
                        // }
                    }
                } else {
                    echo '<script>alert("Thiếu Hoặc Hình Bị Sai");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=insert_hanghoachitiet&id=' . $mahh . '"/>';
                    break;
                }
            }
        }
        break;
    case 'update_hanghoachitiet':
        include_once "./View/edithanghoachitiet.php";
        break;
    case 'update_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'update_action':
        if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $mota = $_POST['mota'];
            // đem dữ liệu này lưu vào database
            $hh = new hanghoa();
            $check1 = $hh->KiemTrahangHoa($tenhh)->rowCount();
            if ($check1 > 1) {
                echo '<script>alert("Hàng Hóa Này Đã Có Rồi");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=update_hanghoa&id=' . $mahh . '"/>';
                break;
            }
            $check = $hh->updateHangHoa($mahh, $tenhh, $maloai, $mota);
            if ($check !== false) {
                echo '<script>alert("Update dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=home"/>';
                break;
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/home.php";
                break;
            }
        } else {
            include_once "./View/home.php";
            break;
        }
        break;
    case 'updatechitiet_action':
        if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
            $mahh = $_POST['mahh'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $idmau = $_POST['mau'];
            $idsize = $_POST['size'];
            $soluong = $_POST['soluong'];
            if ($dongia <= $giamgia) {
                echo "<script>alert('Đơn Giá Phải Lớn Hơn Giảm Giá')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=update_hanghoachitiet&id=' . $mahh . '&idmau=' . $idmau . '&idsize=' . $idsize . '"/>';
                break;
            }
            $check1 = true;
            if (!empty($_FILES['imagenew']['name'])) {
                $check1 = uploadImagenew();
                $hinh = $_FILES['imagenew']['name'];
            } else {
                $hinh = $_POST['image'];
            }
            if ($check1 == false) {
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=update_hanghoachitiet&id=' . $mahh . '&idmau=' . $idmau . '&idsize=' . $idsize . '&h=' . $hinh . '"/>';
                break;
            }
            // $quantities = $_POST['soluong'];
            // đem dữ liệu này lưu vào database
            $hh = new hanghoa();
            $check = $hh->updateHangHoaChiTIet($mahh, $dongia, $giamgia, $hinh, $idmau, $idsize, $soluong);
            // $check=$hh->insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
            // for ($i = 0; $i < count($sizes); $i++) {
            //     // Lấy giá trị của size và số lượng tương ứng
            //     $idsize = $sizes[$i];
            //     $idmau = $maus[$i];
            //     $soluong = $quantities[$i];
            //     $check = $hh->updateHangHoaChiTIet($mahh, $dongia, $giamgia, $hinh, $idmau, $idsize, $soluong);
            // }
            if ($check !== false) {
                echo '<script>alert("Update dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=chitiet&id=' . $mahh . '"/>';
                break;
            } else {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoachitiet.php";
                break;
            }
        } else {
            include_once "./View/edithanghoachitiet.php";
            break;
        }
        break;
    case 'delete_hanghoa':
        if (isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $page = $_GET['page'];
            $hh = new hanghoa();
            $check = $hh->delHangHoa($mahh);
            $hh->delAllHangHoaChiTiet($mahh);
            if ($check !== false) {
                echo '<script>alert("Bạn vừa xóa 1 sản phẩm");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&page=' . $page . '"/>';
                break;
            } else {
                echo '<script>alert("Lỗi");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&page=' . $page . '"/>';
                break;
            }
        }
        break;
    case 'delete_hanghoachitiet':
        if (isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $idmau = $_GET['idmau'];
            $idsize = $_GET['idsize'];
            $hh = new hanghoa();
            $check = $hh->delHangHoaChiTiet($mahh, $idmau, $idsize);
            if ($check == true) {
                echo '<script>alert("Xóa Thành Công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa&act=chitiet&id=' . $mahh . '"/>';
                break;
            } else {
                echo '<script>alert("Lỗi");</script>';
                break;
            }
        }
        break;
    case 'timkiem':
        include_once "./View/hanghoa.php";
        break;
}
