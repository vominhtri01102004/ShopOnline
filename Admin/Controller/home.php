<?php

    if (isset($_SESSION['admin'])) {
        # code...
        include_once "./View/hanghoa.php";
    } else {
        echo '<script>alert("Bạn chưa đăng nhập")</script>';
        include_once "./View/dangnhap.php";
    }

?>