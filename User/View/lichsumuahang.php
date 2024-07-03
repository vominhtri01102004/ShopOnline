<?php
if (!isset($_SESSION['makh'])) {
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
}
if (isset($_SESSION['masohd']) && !empty($_SESSION['masohd']) && $_SESSION['masohd'] != 0) {
    $kh = new user();
    if (isset($_GET['act']) && $_GET['act'] == 'trangthai') {
        $lsmuahang = $kh->selectLoaiDon($_SESSION['makh'], $_GET['tt']);
        $tong = $kh->selectLoaiDon($_SESSION['makh'], $_GET['tt'])->rowCount();
    } else {
        $lsmuahang = $kh->LichSuMuaHang($_SESSION['makh']);
        $tong = 1;
    }
    $previous_masohd = null;
    $firstItem = true;
    $firstOrder = true;
    $trangthai = '';

?>
    <div class="d-flex align-items-center mt-4">
        <div class="col-3">
            <div class="nav-item dropdown text-start col-7">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    echo isset($_GET['tt']) ? ($_GET['tt'] == 0 ? 'Đơn Chờ Xác Nhận' : ($_GET['tt'] == 1 ? 'Đơn Đang Được Giao' : ($_GET['tt'] == 2 ? 'Đơn Đã Hoàn Thành' : ($_GET['tt'] == 3 ? 'Đơn Đã Bị Hủy' : ($_GET['tt'] == 4 ? 'Đợi Đổi/Trả Hàng' : 'Đổi Trả Hàng Thành Công'))))) : 'Danh Sách';
                    // if (isset($_GET['tt'])) {
                    //     if ($_GET['tt'] == 0) {
                    //         echo 'Đơn Chờ Xác Nhận';
                    //     }
                    //     if ($_GET['tt'] == 1) {
                    //         echo 'Đơn Đang Được Giao';
                    //     }
                    //     if ($_GET['tt'] == 2) {
                    //         echo 'Đơn Đã Hoàn Thành';
                    //     }
                    //     if ($_GET['tt'] == 3) {
                    //         echo 'Đơn Đã Bị Hủy';
                    //     }
                    //     if ($_GET['tt'] == 4) {
                    //         echo 'Đợi Đổi/Trả Hàng';
                    //     }
                    //     if ($_GET['tt'] == 5) {
                    //         echo 'Đổi Trả Hàng Thành Công';
                    //     }
                    // }
                    // if (!isset($_GET['tt'])) {
                    //     echo 'Danh Sách';
                    // }
                    ?>
                </a>
                <div class="dropdown-menu rounded-10 shadow" aria-labelledby="dropdownId">
                    <h5>
                        <a class="dropdown-item" href="index.php?action=user&act=trangthai&tt=0">Chờ Xác Nhận
                            <span class="position-absolute top-5 start-71 translate-middle badge rounded-pill bg-light text-dark">
                                <?php
                                $a = $kh->selectLoaiDon($_SESSION['makh'], $tt = 0)->rowCount();
                                echo isset($a) ? $a : 0;
                                ?>
                            </span>
                        </a>
                    </h5>
                    <h5>
                        <a class="dropdown-item" href="index.php?action=user&act=trangthai&tt=1">Đang Giao Hàng
                            <span class="position-absolute top-18 start-79 translate-middle badge rounded-pill bg-light text-dark">
                                <?php
                                $a = $kh->selectLoaiDon($_SESSION['makh'], $tt = 1)->rowCount();
                                echo isset($a) ? $a : 0;
                                ?>
                            </span>
                        </a>
                    </h5>
                    <h5>
                        <a class="dropdown-item" href="index.php?action=user&act=trangthai&tt=2">Hoàn Thành
                            <span class="position-absolute top-31 start-62 translate-middle badge rounded-pill bg-light text-dark">
                                <?php
                                $a = $kh->selectLoaiDon($_SESSION['makh'], $tt = 2)->rowCount();
                                echo isset($a) ? $a : 0;
                                ?>
                            </span>
                        </a>
                    </h5>
                    <h5>
                        <a class="dropdown-item" href="index.php?action=user&act=trangthai&tt=3">Đã Hủy</a>
                        <span class="position-absolute top-45 start-44 translate-middle badge rounded-pill bg-light text-dark">
                            <?php
                            $a = $kh->selectLoaiDon($_SESSION['makh'], $tt = 3)->rowCount();
                            echo isset($a) ? $a : 0;
                            ?>
                        </span>
                    </h5>
                    <h5>
                        <a class="dropdown-item" href="index.php?action=user&act=trangthai&tt=4">Đổi/Trả Hàng</a>
                        <span class="position-absolute top-59 start-69 translate-middle badge rounded-pill bg-light text-dark">
                            <?php
                            $a = $kh->selectLoaiDon($_SESSION['makh'], $tt = 4)->rowCount();
                            echo isset($a) ? $a : 0;
                            ?>
                        </span>
                    </h5>
                    <h5>
                        <a class="dropdown-item" href="index.php?action=user&act=trangthai&tt=5">Đổi/Trả Thành Công</a>
                        <span class="position-absolute top-71 start-97 translate-middle badge rounded-pill bg-light text-dark">
                            <?php
                            $a = $kh->selectLoaiDon($_SESSION['makh'], $tt = 5)->rowCount();
                            echo isset($a) ? $a : 0;
                            ?>
                        </span>
                    </h5>
                    <h5>
                        <a class="dropdown-item" href="index.php?action=user&act=lichsumuahang">Tất Cả</a>
                        <span class="position-absolute top-84 start-43 translate-middle badge rounded-pill bg-light text-dark">
                            <?php
                            $a = $kh->LichSuMuaHang1($_SESSION['makh'])->rowCount();
                            echo isset($a) ? $a : 0;
                            ?>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-6 text-end">
            <h2 class=" mb-3 text-xxl-center">Lịch Sử Mua Hàng</h2>
        </div>
    </div>
    <?php
    if ($tong > 0) {
        while ($set = $lsmuahang->fetch()) :
            if ($set['trangthai'] == 0) {
                $trangthai = 'Đơn Đang Chờ Xác Nhận';
            }
            if ($set['trangthai'] == 1) {
                $trangthai = 'Đơn Đang Được Giao';
            }
            if ($set['trangthai'] == 2) {
                $trangthai = 'Đơn Đã Hoàn Thành';
            }
            if ($set['trangthai'] == 3) {
                $trangthai = 'Đơn Đã Bị Hủy';
            }
            if ($set['trangthai'] == 4) {
                $trangthai = 'Trả Hàng Đang Đợi Xác Nhận';
            }
            if ($set['trangthai'] == 5) {
                $trangthai = 'Trả Hàng Thành Công';
            }
            if ($set['masohd'] !== $previous_masohd) {
                if (!$firstItem && !$firstOrder) {
                    echo '
                    </div>';
                }
                if (!$firstOrder) {
                    echo '    <div class="mt-4 text-end">
                    </div>
                    </div>';
                }
    ?>
                <div class="order-container mb-4 hoverlist">
                    <div class="d-flex">
                        <div class="col-7 pe-4">
                            <div class="col-12">
                                <h3 class="text-end"> Hóa Đơn <?php echo $set['masohd']; ?></h3>
                            </div>
                            <div class="col-12">
                                <form action="index.php?action=user&act=lichsuchitiet" method="post">
                                    <input type="hidden" value="<?php echo $set['masohd']; ?>" name="masohd">
                                    <button class=" rounded-10px col-3 chitietdon p-05" type="submit">Chi Tiết Hóa Đơn</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-5">
                            <div>
                                <h6 class="text-end"><i class="fa-solid fa-circle-exclamation fa-xs"> </i> <?php echo $trangthai; ?></h6>
                                <div class="text-end">
                                    <?php
                                    if ($set['trangthai'] == 0) {
                                    ?>
                                        <a href="index.php?action=user&act=huydon&masohd=<?php echo $set['masohd']; ?>" class="col-6 fs13 user huydon">
                                            <button class="col-5 xacnhandon rounded-10px" type="button">

                                                Bạn Muốn Hủy Đơn ?

                                            </button>
                                        </a>
                                    <?php } ?>
                                    <?php
                                    if ($set['trangthai'] == 1) {
                                    ?>
                                        <a href="index.php?action=user&act=xacnhan&masohd=<?php echo $set['masohd']; ?>" class="col-6 fs13 user">
                                            <button class="col-5 xacnhandon rounded-10px" type="button">

                                                Xác Nhận Đã Nhận Hàng !

                                            </button>
                                        </a> <?php } ?>

                                    <?php
                                    if ($set['trangthai'] == 2) {
                                    ?>
                                        <a href="index.php?action=user&act=trahang&masohd=<?php echo $set['masohd']; ?>" class="col-6 fs13 user">
                                            <button class="col-5 xacnhandon rounded-10px" type="button">

                                                Bạn Muốn Trả Hàng ?

                                            </button>
                                        </a> <?php } ?>

                                    <?php
                                    if ($set['trangthai'] == 4) {
                                    ?>
                                        <a href="index.php?action=user&act=huytrahang&masohd=<?php echo $set['masohd']; ?>" class="col-6 fs13 user">
                                            <button class="col-5 xacnhandon rounded-10px" type="button">

                                                Bạn Muốn Hủy Trả Hàng?

                                            </button>
                                        </a> <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                echo '<div class="order-item"> ';
                $firstItem = true;
                $firstOrder = false;
            }
            if (!$firstItem) {
                echo '</div> <hr class="mt-0">';
                echo '<div class="order-item"> ';
            }
                ?>
                <div class="item-image col-1">
                    <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" alt="Product Image" class="rounded-20">
                </div>
                <div class="item-details col-6">
                    <h3 class="item-name"><?php echo $set['tenhh'] ?>
                        <p class="item-name"> <?php echo $set['loai'] ?>, <?php echo $set['size'] ?>, <?php echo $set['mausac'] ?></p>
                        <p class="item-quantity">x <?php echo $set['soluongmua'] ?></p>
                        <?php if ($set['ghichu'] != null && $set['ghichu'] != 0) { ?>
                            <p class="item-quantity">Ghi Chú: <?php echo $set['ghichu'] ?></p>
                        <?php } ?>
                </div>
                <div class="col-5 text-end">
                    <div class="me-3">
                        <?php
                        $hh = new hanghoa();
                        $ls = $hh->GetHangHoaDanhGia($set['mahh'], $_SESSION['makh']);
                        if (($set['trangthai'] == 2 || $set['trangthai'] == 5) && $ls < 1) {
                        ?>
                            <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>&actt=danhgia"><button class="xacnhandon rounded-10px col-5 p-0 ">Đánh Giá</button></a>
                        <?php } ?>
                    </div>
                    <div class="mt-5">
                        <?php
                        if ($set['giamgia'] > 0) {
                        ?>
                            <div class="d-flex text-end">
                                <h5 class="item-price col-9 text-end fw-normal opacity-25"> <strike> <?php echo number_format($set['dongia']); ?></strike> </h5>
                                <h5 class="item-price col-3 text-start offset-05 fw-normal"> <?php echo number_format($set['giamgia']); ?></h5>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-11 text-end">
                                <h5 class="item-price fw-normal me-3"><?php echo number_format($set['dongia']); ?>₫</h5>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                $firstItem = false;
                $previous_masohd = $set['masohd'];
                ?>
            <?php
        endwhile;
        echo ' </div> ';
        echo '   <div class="mt-4 text-end">
    </div>
    </div> ';
    } else {        ?>
            <div class="text-center mt-7 mb-7">
                <h1 class="text-center text-d9d9d9">không có gì ở đây</h1>
            </div>

        <?php } ?>

    <?php
} else {
    echo '<script> alert("Chưa Có Hóa Đơn Cũ");</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
}
    ?>