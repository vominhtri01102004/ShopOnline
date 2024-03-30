

<header class="row no-gutters">
    <!-- nav san pham -->
    <section class="col-12" style="height:40px; width:100%">
        <!-- <div class="col-12"> -->
            <!-- <div class="container"> -->

                <!-- test -->
                <nav class="navbar navbar-expand-sm bg-light navbar-light">
                    <div class="container">
                    <!-- Brand -->
                        <a class="navbar-brand col-md-2" href="#">TRI</a>

                        <!-- Links -->
                        <ul class="navbar-nav col-md-10 list-inline">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=home">Trang Chủ</a>
                            </li>
                            
                            <!-- Quản trị Doanh Mục -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Quản Trị Doanh Mục
                                </a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="index.php?action=loai">Loại Sản Phẩm</a>
                                <a class="dropdown-item" href="index.php?action=size">Size</a>
                                <a class="dropdown-item" href="index.php?action=mau">Màu</a>
                            </li>
                            <!-- Thống kê -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="index.php?action=thongke&act=thongke" >
                                    Thống Kê
                                </a>
                            </li>
                            <!-- Báo cáo -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Báo Cáo
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.php?action=thongke&act=thongkethang">Tháng</a>
                                    <a class="dropdown-item" href="#">Quý</a>
                                    <a class="dropdown-item" href="index.php?action=thongke&act=thongke">Năm</a>
                                </div>
                            </li>
                            <!-- Báo cáo Tồn kho -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tồn Kho</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../User">Trang người dùng</a>
                            </li>
                            <?php
                                if (isset($_SESSION['admin'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=dangnhap&act=dangxuat">Đăng xuất</a>
                            </li>
                            <?php
                                } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=dangnhap">Đăng nhập</a>
                            </li>
                            <?php };?>
                        </ul>
                    </div>
                </nav>
                <!-- end test -->
            <!-- </div> -->
        <!-- </div> -->

    </section>



</header>
<!-- dang ky -->