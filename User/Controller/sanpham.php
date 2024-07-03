<?php
//controler gọi view sản phẩm
// include_once "./View/sanpham.php";
$act = "sanpham";
// // controller điều phối đến những view khác thông qua 1 biến
// // biến đó tên là act
if (isset($_GET['act'])) {
    $act = $_GET['act']; //sanphamkhuyenmai
}
switch ($act) {
    case 'sanpham':
        include_once "./View/sanpham.php";
        break;
    case 'sanphamkhuyenmai':
        include_once "./View/sanpham.php";
        break;
    case 'sanphamchitiet':
        include_once "./View/sanphamchitiet.php";
        break;
    case 'sanphamchitietupdate':
        include_once "./View/sanphamchitiet.php";
        break;
    case 'loai':
        include_once "./View/sanpham.php";
        break;
    case 'timkiem':
        // nhaanhj giá trị người dùng gõ tìm kiếm và tìm kiếm trên sản phẩm
        include_once "./View/sanpham.php";
        break;
        // case 'comment':
        // //gửi qua đây nội dung comment và id mã hh
        // if (isset($_GET['id'])) {
        //     $mahh = $_GET['id'];
        //     $makh = $_GET['makh'];
        //     $noidung = $_GET['comment'];
        //     // cần đưa thông tin vào database. model làm
        //     $usr = new user();
        //     $usr->insertComment($mahh, $makh, $noidung);
        // }
        // include_once "./View/sanphamchitiet.php";
        // break;
}
