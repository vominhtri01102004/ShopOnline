<!doctype html>
<html lang="en">
</head>
<?php
if (!isset($_SESSION['makh'])) {
    echo '<script> alert("Bạn Phải Đăng Nhập");</script>';
    echo '<meta  http-equiv="refresh" content="0;url=./inFdex.php?action=dangnhap"/>';
}
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'diachimoi') {
        $ac = 1;
    }
    if (isset($_GET['act']) && $_GET['act'] == 'datho') {
        $ac = 2;
    }
    if (isset($_GET['act']) && $_GET['act'] == 'huydon') {
        $ac = 3;
    }
    if (isset($_GET['act']) && $_GET['act'] == 'trahang') {
        $ac = 4;
    }
}
?>

<body>
    <!-- Start Contact Form -->
    <div class="untree_co-section">
        <?php
        if ($ac == 1) {
            echo '<h3 class="text-center mb-5">Thêm Địa Chỉ Mới</h3>';
        }
        if ($ac == 2) {
            echo '<h3 class="text-center mb-5">Đặt Hộ</h3>';
        }
        if ($ac == 3) {
            echo '<h3 class="text-center mb-5">Lý Do Hủy Đơn</h3>';
        }
        if ($ac == 4) {
            echo '<h3 class="text-center mb-5">Lý Do Trả Hàng</h3>';
        }
        ?>

        <div class="container">
            <div class="block">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 pb-4">
                        <?php
                        if (isset($_SESSION['makh'])) {
                            $makh = $_SESSION['makh'];
                            $us = new user();
                            $kh = $us->getUser($makh);
                            $tenkh = $kh['tenkh'];
                            $username = $kh['username'];
                            $email = $kh['email'];
                            $dc = $kh['diachi'];
                            $sodt = $kh['sodienthoai'];
                            $hinh = $kh['avatar'];
                        ?>
                            <?php if ($ac == 1) { ?>
                                <form class="col-md-12" method="post" action="index.php?action=user&act=themdiachimoi" onsubmit="return KiemTra();" enctype="multipart/form-data">
                                <?php } else if ($ac == 2) { ?>
                                    <form class="col-md-12" method="post" action="index.php?action=user&act=themdatho" onsubmit="return KiemTra();" enctype="multipart/form-data">
                                    <?php } else if ($ac == 3) { ?>
                                        <form class="col-md-12" method="post" action="index.php?action=user&act=huydon_action" onsubmit="return KiemTra();" enctype="multipart/form-data">
                                        <?php } else if ($ac == 4) { ?>
                                            <form class="col-md-12" method="post" action="index.php?action=user&act=trahang_action" onsubmit="return KiemTra();" enctype="multipart/form-data">
                                            <?php }
                                        if ($ac == 1 || $ac == 2) { ?>
                                                <div class="row" <?php if ($ac == 1) echo 'hidden' ?>>
                                                    <div class="col-6">
                                                        <div class="form-group mb-1">
                                                            <label class="text-black  fw-normal offset-4" for="name">Tên Khách Hàng</label>
                                                            <input type="text" class="form-control" required autocomplete="off" name="tenkh" id="name" value="<?php if ($ac == 1) echo $tenkh; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group mb-1">
                                                            <label class="text-black  fw-normal offset-4" for="sodienthoai">Số Điện Thoại</label>
                                                            <input type="text" class="form-control" required autocomplete="off" id="sodienthoai" name="sodienthoai" value="<?php if ($ac == 1) echo $sodt ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group mb-1">
                                                <?php if ($ac == 1 || $ac == 2) { ?>
                                                    <input type="hidden" class="form-control" id="makh" name="makh" value="<?php echo $makh ?>">
                                                    <label class="text-black  fw-normal margin-left390" for="diachi">Địa Chỉ Mới</label>
                                                    <input type="text" class="form-control" required autocomplete="off" id="diachi" name="diachi">
                                                <?php }
                                                if ($ac == 3 || $ac == 4) { ?>
                                                    <input type="hidden" value="<?php echo $_GET['masohd']; ?>" name="masohd">
                                                    <label class="text-black fw-normal offset-025" for="lydo">Hãy Cho Biết Lý Do Bạn Hủy Đơn/Trả Hàng</label>
                                                    <input type="text" class="form-control" required autocomplete="off" id="lydo" name="lydo">
                                                <?php } ?>
                                            </div>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                <?php
                                                if ($ac == 1) { ?>
                                                    <button type="submit" class="btn vmt col-md-12 bg-rbg3 bordernone mt-3">Lưu</button>
                                                <?php }
                                                if ($ac == 2) { ?>
                                                    <button type="submit" class="btn vmt col-md-12 bg-rbg3 bordernone mt-3">Lưu</button>
                                                <?php } 
                                                if ($ac == 3 || $ac==4) { ?>
                                                    <button type="submit" class="btn vmt col-md-12 bg-rbg3 bordernone mt-3">Gửi</button>
                                                <?php } ?>
                                            </div>
                    </div>
                    </form>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        function KiemTra() {
            var sodt = document.getElementById("sodienthoai").value;
            if (isNaN(sodt)) {
                alert("Số Điện Thoại phải là số");
                return false;
            }
            if (sodt.length != 10) {
                alert("Số Điện Thoại phải là 10 số");
                return false;
            }
            if (parseInt(sodt[0]) !== 0) {
                alert("Số Đầu Tiên Phải Là 0");
                return false;
            }
        }
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>