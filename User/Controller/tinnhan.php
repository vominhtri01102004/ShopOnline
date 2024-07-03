<?php
if (isset($_SESSION['makh'])) {
     $act = "tinhan";
     $makh = $_SESSION['makh'];
     $us = new user();
     if (isset($_GET['act'])) {
          $act = $_GET['act'];
     }
     switch ($act) {
          case "tinnhan":
               include_once "./View/lienhe.php";
               break;
          case "nhantin":
               $makh = $_GET['makh'];
               if (isset($_POST['submit'])) {
                    $noidung = $_POST['tinnhan'];
                    $ngay = $us->selectTinNhanCuoi($makh);
                    if (!empty($ngay)) {
                         $thoigian1 = $ngay['thoigian2'];
                    } else {
                         $thoigian1 = 0;
                    }
                    $hinh = '';
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = new DateTime('now');
                    $thoigian2 = $date->format('Y-m-d H:i:s');
                    $ud = $us->insertTinNhan($makh, $thoigian1, $thoigian2, $noidung, $hinh);
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=tinnhan&act=tinnhan&makh=' . $makh . '"/>';
                    break;
               } else {
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=tinnhan&act=tinnhan&makh=' . $makh . '"/>';
                    break;
               }
          case "nhantinhinh":
               if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
                    $makh = $_GET['makh'];
                    if (uploadImage() !== false) {
                         $noidung = '/////';
                         $ngay = $us->selectTinNhanCuoi($makh);
                         if (!empty($ngay)) {
                              $thoigian1 = $ngay['thoigian2'];
                         } else {
                              $thoigian1 = 0;
                         }
                         date_default_timezone_set('Asia/Ho_Chi_Minh');
                         $date = new DateTime('now');
                         $thoigian2 = $date->format('Y-m-d H:i:s');
                         $hinh = $_FILES['image']['name'];
                         $ud = $us->insertTinNhan($makh, $thoigian1, $thoigian2, $noidung, $hinh);
                         echo '<meta http-equiv=refresh content="0;url=./index.php?action=tinnhan&act=tinnhan&makh=' . $makh . '"/>';
                         break;
                    } else {
                         echo '<script>alert("Hình Lỗi");</script>';
                         echo '<meta http-equiv=refresh content="0;url=./index.php?action=tinnhan&act=tinnhan&makh=' . $makh . '"/>';
                         break;
                    }
               } else {
                    echo '<script>alert("Lỗi");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=tinnhan&act=tinnhan&makh=' . $makh . '"/>';
                    break;
               }
          case "timkiem":
               include_once "./View/lienhe.php";
               break;
          case "tinnhantimkiem":
               include_once "./View/lienhe.php";
               break;
     }
} else {
     echo '<script>alert("Hãy Đăng Nhập");</script>';
     echo '<meta http-equiv=refresh content="0;url=./index.php?action=dangnhap"/>';
}
