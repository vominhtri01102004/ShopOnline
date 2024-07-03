<div class="col-12 mt-5">
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'khachhang_update') {
            $ac = 1;
            echo '<div class="d-flex">
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <a href="index.php?action=khachhang&act=khachhang">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Chỉnh Sửa Khách Hàng</h1>
                </div>
            </div>';
        }
        if (isset($_GET['act']) && $_GET['act'] == 'nhanvien_update') {
            echo '<div class="d-flex">
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <a href="index.php?action=nhanvien&act=nhanvien">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Chỉnh Sửa Nhân Viên</h1>
                </div>
            </div>';
            $ac = 2;
        }
        if (isset($_GET['act']) && $_GET['act'] == 'themkhachhang') {
            $ac = 3;
            echo '<div class="d-flex">
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <a href="index.php?action=khachhang&act=khachhang">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Thêm Khách Hàng Mới</h1>
                </div>
            </div>';
        }
        if (isset($_GET['act']) && $_GET['act'] == 'themnhanvien') {
            $ac = 4;
            echo '<div class="d-flex">
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <a href="index.php?action=nhanvien&act=nhanvien">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Thêm Nhân Viên Mới</h1>
                </div>
            </div>';
        }
    }
    ?>
    <?php
    if ($ac == 1 || $ac == 2) {
        $ql = new qlynguoi();
        if (isset($_POST['makh'])) {
            $makh = $_POST['makh'];
            $kh = $ql->selectKhachHangId($makh);
            $tenkh = $kh['tenkh'];
            $hinh = $kh['avatar'];
        }
        if (isset($_POST['idnv'])) {
            $idnv = $_POST['idnv'];
            $kh = $ql->selectNhanVienId($idnv);
            $tennv = $kh['tennv'];
            $chucvu = $kh['chucvu'];
        }
        $username = $kh['username'];
        $email = $kh['email'];
        $diachi = $kh['diachi'];
        $sodienthoai = $kh['sodienthoai'];
    }
    ?>
    <div class="d-flex col-md-12  mt-5 placecontentcenter mb-5">
        <?php
        if ($ac == 1) {
            echo '<form action="index.php?action=khachhang&act=khachhang_update_action" onsubmit="return kiemTraEmail();" method="post" enctype="multipart/form-data" class="col-md-9 background p-5">';
        }
        if ($ac == 2) {
            echo '<form action="index.php?action=nhanvien&act=nhanvien_update_action" onsubmit="return kiemTraEmail();" method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
        }
        if ($ac == 3) {
            echo '<form action="index.php?action=khachhang&act=themkhachhang_action" onsubmit="return kiemTraEmail();" method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
        }
        if ($ac == 4) {
            echo '<form action="index.php?action=nhanvien&act=themnhanvien_action" onsubmit="return kiemTraEmail();" method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
        }
        ?>

        <table class="table table-hover">

            <?php
            if ($ac == 1 || $ac == 3) {
            ?>
                <tr>
                    <td class="text-center">Mã Khách Hàng</td>
                    <td> <input type="text" class="form-control" required name="makh" value="<?php if (isset($makh)) echo $makh; ?>" readonly /></td>
                </tr>
                <tr>
                    <td class="text-center">Tên Khách Hàng</td>
                    <td><input type="text" class="form-control" placeholder="Tên Khách hàng" required autocomplete="off" name="tenkh" value="<?php if (isset($tenkh)) echo $tenkh; ?>" maxlength="100px"></td>
                </tr>
            <?php
            } else {
            ?>
                <tr>
                    <td class="text-center">Mã Nhân Viên</td>
                    <td> <input type="text" class="form-control" required name="idnv" value="<?php if (isset($idnv)) echo $idnv; ?>" readonly /></td>
                </tr>
                <tr>
                    <td class="text-center">Tên Nhân Viên</td>
                    <td><input type="text" class="form-control" placeholder="Tên Nhân Viên" required autocomplete="off" name="tennv" value="<?php if (isset($tennv)) echo $tennv; ?>" maxlength="100px"></td>
                </tr>
            <?php
            }
            ?>
            <?php
            if ($ac == 2 || $ac == 4) {
            ?>
                <tr>
                    <td class="text-center"> <label class="fw-normal" for="Chức Vụ">Chức Vụ</label></td>
                    <td>

                        <select name="chucvu" id="Chức Vụ" class="form-control">
                            <?php
                            if ($ac == 2) {
                                if ($_SESSION['chucvu'] == 'Admin') {
                                    echo '<option value="Admin">Admin</option>';
                                } else if ($_SESSION['chucvu'] != 'Admin') {
                            ?>
                                    <option value="Quản Lý">Quản Lý</option>
                                    <option value="Nhân Viên">Nhân Viên</option>
                                <?php }
                            } else if ($ac == 4) {
                                if ($_SESSION['chucvu'] == 'Admin') {
                                ?>
                                    <option value="Admin">Admin</option>
                                <?php } ?>
                                <option value="Quản Lý">Quản Lý</option>
                                <option value="Nhân Viên">Nhân Viên</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td class="text-center">Username </td>
                <?php
                ?>
                <td><input type="text" class="form-control" placeholder="Username" required autocomplete="off" value="<?php if (isset($username)) echo $username; ?>" name="username">
                </td>
            </tr>
            <tr>
                <td class="text-center">Email</td>
                <td><input type="email" class="form-control" placeholder="Email" id="email" required autocomplete="off" value="<?php if (isset($email)) echo $email; ?>" name="email">
                </td>
            </tr>
            <tr>
                <td class="text-center">Địa Chỉ</td>
                <td><input type="text" class="form-control" placeholder="Địa Chỉ" required autocomplete="off" value="<?php if (isset($diachi)) echo $diachi; ?>" name="diachi">
                </td>
            </tr>
            <tr>
                <td class="text-center">Số Điện Thoại</td>
                <td><input type="text" class="form-control" id="sodienthoai" placeholder="Số Điện Thoại" required autocomplete="off" value="<?php if (isset($sodienthoai)) echo $sodienthoai; ?>" name="sodienthoai">
                </td>
            </tr>
            <?php
            if ($ac == 3 || $ac == 4) {
            ?>
                <tr>
                    <td class="text-center">Mật Khẩu</td>
                    <td><input type="text" class="form-control" id="matkhau" placeholder="Mật Khẩu" required autocomplete="off" value="<?php if (isset($sodienthoai)) echo $sodienthoai; ?>" name="matkhau">
                    </td>
                </tr>
                <tr>
                    <td class="text-center">Nhập Lại Mật Khẩu</td>
                    <td><input type="text" class="form-control" id="matkhau2" placeholder="Nhập Lại Mật Khẩu" required autocomplete="off" value="<?php if (isset($sodienthoai)) echo $sodienthoai; ?>" name="matkhau2">
                    </td>
                </tr>
            <?php } ?>
            <!-- nếu thêm sản phẩm thì phải có số lượng, hình ảnh, size -->
        </table>
        <?php if ($ac == 1 || $ac == 3) { ?>
            <div class="col-12 mt-5 text-center d-flex">
                <div class="col-3 offset-025">
                    <h5>Hình Cũ</h5>
                </div>
                <div class="col-6">
                    <h5>Hình Mới</h5>
                </div>
            </div>
            <div class="col-12 d-flex">
                <div class="form-group col-9">
                    <div class="d-flex">
                        <img src="Content/imagetourdien/<?php echo $hinh ?>" name="hinh" class="w-50 h-50 rounded-20px" alt="">
                        <img src="" name="hinh" id="hinhmoi" class="w-50 h-50 rounded-20px offset-025" alt="">
                        <input class="align-content-center col-6" id="fileInput" type="file" value="<?php if (isset($hinh)) echo $hinh; ?>" name="imagenew">
                    </div>
                    <input type="hidden" value="<?php if (isset($hinh)) echo $hinh; ?>" name="image">
                </div>
                <input type="hidden" class="form-control" id="makh" name="makh" value="<?php if (isset($makh)) echo $makh; ?>">
            <?php } ?>
            <div class="col-3 d-flex justify-content-center align-items-center offset-025">
                <div class="col-12">
                    <?php if ($ac == 1 || $ac == 3) { ?>
                        <div class="d-noneimpt" id="hienthi">
                            <input class="align-content-center" id="fileInput1" type="file" value="<?php if (isset($hinh)) echo $hinh; ?>" name="imagenew1">
                        </div>
                    <?php } ?>
                    <div class="mt-5">
                        <button type="submit" class="btn vmt col-md-12 my-sm-0 bg-rbg3 bordernone">Lưu</button>
                    </div>
                </div>
            </div>
            </div>
            </form>
    </div>
</div>
<script>
    function kiemTraEmail() {
        var email = document.getElementById("email").value;
        // var emailPattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3}$/;

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
        if (!emailPattern.test(email)) {
            alert("Email không hợp lệ.");
            return false; // Ngăn form được gửi đi
        }
    }
</script>
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