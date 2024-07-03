<!doctype html>
<html lang="en">

</head>
<?php
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'thongtinkhachhang') {
        $ac = 1;
    }
    if (isset($_GET['act']) && $_GET['act'] == 'thongtinkhachhangedit') {
        $ac = 2;
    }
}
?>

<body>
    <!-- Start Contact Form -->
    <div class="untree_co-section">
        <?php
        if ($ac == 1) {
            echo '<h3 class="text-center mb-5">Thông Tin Khách Hàng</h3>';
        }
        if ($ac == 2) {
            echo '<h3 class="text-center mb-5">Chỉnh Sửa Thông Tin Khách Hàng</h3>';
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
                                <form class="col-md-12" method="post" action="index.php?action=user&act=thongtinkhachhangedit" onsubmit="return KiemTra();" enctype="multipart/form-data">
                                <?php } else { ?>
                                    <form class="col-md-12" method="post" action="index.php?action=user&act=thongtinkhachhangedit_action" onsubmit="return KiemTra();" enctype="multipart/form-data">
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-1">
                                                <label class="text-black  fw-normal offset-4" for="name">Tên Khách Hàng</label>
                                                <input type="text" class="form-control" required autocomplete="off" name="tenkh" id="name" value="<?php echo $tenkh; ?>" <?php if ($ac == 1) {
                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                            } ?>>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-1">
                                                <label class="text-black  fw-normal offset-4" for="username">Tên Đăng Nhập</label>
                                                <input type="text" class="form-control" required autocomplete="off" name="username" id="username" value="<?php echo $username ?>" <?php if ($ac == 1) {
                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                    } ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-1">
                                                <label class="text-black  fw-normal offset-4" for="">Email</label>
                                                <input type="email" class="form-control" required autocomplete="off" id="email" name="email" value="<?php echo $email ?>" <?php if ($ac == 1) {
                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                            } ?>>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-1">
                                                <label class="text-black  fw-normal offset-4" for="sodienthoai">Số Điện Thoại</label>
                                                <input type="text" class="form-control" required autocomplete="off" id="sodienthoai" name="sodienthoai" value="<?php echo $sodt ?>" <?php if ($ac == 1) {
                                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                                    } ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label class="text-black  fw-normal margin-left390" for="diachi">Địa Chỉ</label>
                                        <input type="text" class="form-control" required autocomplete="off" id="diachi" name="diachi" value="<?php echo $dc ?>" <?php if ($ac == 1) {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>>
                                    </div>
                                    <div class="col-12 mt-5 text-center d-flex">
                                        <div class="col-3 offset-025">
                                            <h5><?php echo $ac == 1 ? 'Hình Đại Điện' : 'Hình Đại Điện Cũ' ?></h5>
                                        </div>
                                        <div class="col-6">
                                            <h5><?php echo $ac == 2 ? 'Hình Mới' : '' ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <div class="form-group col-9">
                                            <?php if ($ac == 1) { ?>
                                                <img src="Content/imagetourdien/<?php echo $hinh ?>" name="hinh" class="w-250px rounded-20px" alt="">
                                            <?php } else { ?>
                                                <div class="d-flex">
                                                    <img src="Content/imagetourdien/<?php echo $hinh ?>" name="hinh" class="w-50 h-50 rounded-20px" alt="">
                                                    <img src="" name="hinh" id="hinhmoi" class="w-50 h-50 rounded-20px offset-025" alt="">
                                                    <input class="align-content-center col-6" id="fileInput" type="file" value="<?php if (isset($hinh)) echo $hinh; ?>" name="imagenew">
                                                    <input type="hidden" value="<?php if (isset($hinh)) echo $hinh; ?>" name="image">
                                                </div>

                                            <?php } ?>
                                        </div>
                                        <input type="hidden" class="form-control" id="makh" name="makh" value="<?php echo $makh ?>">
                                        <div class="col-3 d-flex justify-content-center align-items-center offset-025">
                                            <?php
                                            if ($ac == 1) { ?>
                                                <button type="submit" class="btn vmt col-md-12 my-sm-0 bg-rbg3 bordernone">Chỉnh Sửa</button>
                                            <?php }
                                            if ($ac == 2) { ?>
                                                <div class="col-12">
                                                    <div class="d-noneimpt" id="hienthi">
                                                        <input class="align-content-center" id="fileInput1" type="file" value="<?php if (isset($hinh)) echo $hinh; ?>" name="imagenew1">
                                                    </div>
                                                    <div class="mt-5">
                                                        <button type="submit" class="btn vmt col-md-12 my-sm-0 bg-rbg3 bordernone">Lưu</button>
                                                    </div>
                                                </div>
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
            var email = document.getElementById("email").value;
            var emailPattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var sodt = document.getElementById("sodienthoai").value;
            if (!emailPattern.test(email)) {
                alert("Email không hợp lệ.");
                return false;
            }
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
    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            var file = this.files[0]; // Lấy tệp đã chọn
            var reader = new FileReader(); // Tạo một đối tượng FileReader

            // Đặt hàm xử lý sự kiện khi tệp được đọc
            reader.onload = function(e) {
                var imgElement = document.getElementById('hinhmoi'); // Lấy phần tử img có id="hinhmoi"
                imgElement.src = e.target.result; // Đặt nguồn hình ảnh là dữ liệu của tệp đã chọn
                document.getElementById('fileInput').style.display = 'none';
                document.getElementById('hienthi').style.display = 'block';
            };

            // Đọc tệp đã chọn dưới dạng URL dữ liệu
            reader.readAsDataURL(file);
        });
        document.getElementById('fileInput1').addEventListener('change', function() {
            var file = this.files[0]; // Lấy tệp đã chọn
            var reader = new FileReader(); // Tạo một đối tượng FileReader

            // Đặt hàm xử lý sự kiện khi tệp được đọc
            reader.onload = function(e) {
                var imgElement = document.getElementById('hinhmoi'); // Lấy phần tử img có id="hinhmoi"
                imgElement.src = e.target.result; // Đặt nguồn hình ảnh là dữ liệu của tệp đã chọn
            };

            // Đọc tệp đã chọn dưới dạng URL dữ liệu
            reader.readAsDataURL(file);
        });
    </script>
</body>

</html>