<?php
if (!isset($_SESSION['tennv'])) {
    echo '<script> alert("Hãy Đăng Nhập");</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
?>
<?php
} else {
    $qly = new qlynguoi();
    $tong = $qly->checkNhanVientontai($_SESSION['chucvu'], $_SESSION['tennv'])->rowCount();
    if ($tong < 1) {
        echo '<script>alert("Phiên Đăng Nhập Đã Hết Hạn");</script>';
        echo '<meta http-equiv=refresh content="0;url=./index.php?action=dangnhap&act=dangxuat"/>';
    }
?>
    <header class="d-flex no-gutters">
        <section class="col-12 h40px w-100">
            <nav class="navbar navbar-expand-sm navbar-light bre5e5e5">
                <div class="container whcontainer">
                    <div class="col-md-1 text-black fs-15 text-center">
                        <?php
                        echo $_SESSION['tennv'];
                        echo '<h6>(' . $_SESSION['chucvu'] . ')</h6>';
                        ?>
                    </div>
                    <ul class="navbar-nav col-md-11 list-inline">
                        <li class="nav-item me-4">
                            <a class="nav-link p-0" href="index.php?action=home">Hàng Hóa</a>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <span class="position-absolute top-a15 start-100 translate-middle badge rounded-pill bg-light text-dark">
                                <?php
                                $kh = new xacnhandon();
                                $a = $kh->selectLoaiDon1($tt = 0)->rowCount();
                                $b = $kh->selectLoaiDon1($tt = 4)->rowCount();
                                echo $c = $a + $b;
                                ?>
                            </span>
                            <a class="nav-link p-0" href="index.php?action=xacnhandon">
                                Xác Nhận Đơn Hàng
                            </a>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <?php
                            $kh = new tinnhan();
                            if (isset($_GET['makh']) && isset($_GET['act']) && $_GET['act'] == 'tinnhan') {
                                $kh->updateTinNhanDaXem($_GET['makh']);
                            }
                            $a = $kh->selectTinNhanChuaXem()->rowCount();
                            if ($a > 0) {
                            ?>
                                <span class="position-absolute top-a15 start-100 translate-middle badge rounded-pill bg-light text-dark">

                                    <?php echo $a != 0 ? $a : '' ?>

                                </span>
                            <?php } ?>
                            <a class="nav-link p-0" href="index.php?action=tinnhan&act=tinnhan">
                                Tin Nhắn
                            </a>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link p-0 dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Quản Lý
                            </a>
                            <div class="dropdown-menu rounded-20px start--35">
                                <a class="dropdown-item col-11 col-11" href="index.php?action=nhanvien&act=nhanvien">Nhân Viên</a>
                                <a class="dropdown-item col-11" href="index.php?action=khachhang&act=khachhang">Khách Hàng</a>
                                <a class="dropdown-item col-11" href="index.php?action=voucher&act=ship">Loại Ship</a>
                                <a class="dropdown-item col-11" href="index.php?action=voucher&act=voucher">Voucher</a>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link p-0 dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Thống Kê
                            </a>
                            <div class="dropdown-menu rounded-20px start--25">
                                <a class="dropdown-item col-11" href="index.php?action=thongke&act=thongkesanpham">Sản Phẩm</a>
                                <a class="dropdown-item col-11" href="index.php?action=thongke&act=thongkedoanhthu">Doanh Thu</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link p-0 dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Quản Trị Doanh Mục
                            </a>
                            <div class="dropdown-menu rounded-20px start-25">
                                <a class="dropdown-item col-11" href="index.php?action=loai">Loại</a>
                                <a class="dropdown-item col-11" href="index.php?action=size">Size</a>
                                <a class="dropdown-item col-11" href="index.php?action=mau">Màu</a>
                            </div>
                        </li>
                        <?php
                        if (isset($_SESSION['tennv'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link p-0" href="index.php?action=dangnhap&act=dangxuat">Đăng xuất</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link p-0" href="index.php?action=dangnhap">Đăng nhập</a>
                            </li>
                        <?php }; ?>
                    </ul>
                </div>
            </nav>
        </section>
    </header>
<?php

}
?>