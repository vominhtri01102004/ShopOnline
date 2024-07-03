<div class="table-responsive mt-5">
    <?php
    if (!isset($_SESSION['tennv'])) :
        echo '<script> alert("Bạn Phải Đăng Nhập");</script>';
        echo '<meta  http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
    ?>
    <?php
    else :
    ?>
        <div class="untree_co-section background mt-4 rounded-30px">
            <div class="container mw-1370px w-1400px">
                <div class="col-md-12 mh300">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <div class="col-3">
                                    <div class="nav-item dropdown text-start col-12">
                                        <a class="nav-link dropdown-toggle text-dark fs-13" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php
                                            echo isset($_GET['tt']) ? ($_GET['tt'] == 0 ? 'Đơn Chờ Xác Nhận' : ($_GET['tt'] == 1 ? 'Đơn Đang Được Giao' : ($_GET['tt'] == 2 ? 'Đơn Đã Hoàn Thành' : ($_GET['tt'] == 3 ? 'Đơn Đã Bị Hủy' : ($_GET['tt'] == 4 ? 'Đợi Đổi/Trả Hàng' : 'Đổi Trả Hàng Thành Công'))))) : 'Tất Cả Đơn';
                                            ?>
                                        </a>
                                        <div class="dropdown-menu rounded-10 shadow start--15" aria-labelledby="dropdownId">
                                            <h5>
                                                <a class="dropdown-item fs-16px" href="index.php?action=xacnhandon&act=trangthai&tt=0">Chờ Xác Nhận
                                                    <span class="position-absolute top-7 start-65 translate-middle badge rounded-pill bg-light text-dark">
                                                        <?php
                                                        $kh = new xacnhandon();
                                                        $a = $kh->selectLoaiDon1($tt = 0)->rowCount();
                                                        echo isset($a) ? $a : 0;
                                                        ?>
                                                    </span>
                                                </a>
                                            </h5>
                                            <h5>
                                                <a class="dropdown-item fs-16px" href="index.php?action=xacnhandon&act=trangthai&tt=1">Đang Giao Hàng
                                                    <span class="position-absolute top-21 start-71 translate-middle badge rounded-pill bg-light text-dark">
                                                        <?php
                                                        $a = $kh->selectLoaiDon1($tt = 1)->rowCount();
                                                        echo isset($a) ? $a : 0;
                                                        ?>
                                                    </span>
                                                </a>
                                            </h5>
                                            <h5>
                                                <a class="dropdown-item fs-16px" href="index.php?action=xacnhandon&act=trangthai&tt=2">Hoàn Thành
                                                    <span class="position-absolute top-34 start-56 translate-middle badge rounded-pill bg-light text-dark">
                                                        <?php
                                                        $a = $kh->selectLoaiDon1($tt = 2)->rowCount();
                                                        echo isset($a) ? $a : 0;
                                                        ?>
                                                    </span>
                                                </a>
                                            </h5>
                                            <h5>
                                                <a class="dropdown-item fs-16px" href="index.php?action=xacnhandon&act=trangthai&tt=3">Đã Hủy</a>
                                                <span class="position-absolute top-47 start-41 translate-middle badge rounded-pill bg-light text-dark">
                                                    <?php
                                                    $a = $kh->selectLoaiDon1($tt = 3)->rowCount();
                                                    echo isset($a) ? $a : 0;
                                                    ?>
                                                </span>
                                            </h5>
                                            <h5>
                                                <a class="dropdown-item fs-16px" href="index.php?action=xacnhandon&act=trangthai&tt=4">Yêu Cầu Đổi/Trả Hàng</a>
                                                <span class="position-absolute top-60 start-89 translate-middle badge rounded-pill bg-light text-dark">
                                                    <?php
                                                    $a = $kh->selectLoaiDon1($tt = 4)->rowCount();
                                                    echo isset($a) ? $a : 0;
                                                    ?>
                                                </span>
                                            </h5>
                                            <h5>
                                                <a class="dropdown-item fs-16px" href="index.php?action=xacnhandon&act=trangthai&tt=5">Đổi/Trả Thành Công</a>
                                                <span class="position-absolute top-74 start-81 translate-middle badge rounded-pill bg-light text-dark">
                                                    <?php
                                                    $a = $kh->selectLoaiDon1($tt = 5)->rowCount();
                                                    echo isset($a) ? $a : 0;
                                                    ?>
                                                </span>
                                            </h5>
                                            <h5>
                                                <a class="dropdown-item fs-16px" href="index.php?action=xacnhandon">Tất Cả</a>
                                                <span class="position-absolute top-86 start-40 translate-middle badge rounded-pill bg-light text-dark">
                                                    <?php
                                                    $a = $kh->selectTatCaDon()->rowCount();
                                                    echo isset($a) ? $a : 0;
                                                    ?>
                                                </span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <h2 class=" mb-3 text-xxl-center">Danh Sách Đơn </h2>
                                </div>
                            </div>

                            <div class="p-0 border bg-white">
                                <table class="table site-block-order-table mb-5">

                                    <?php
                                    $ql = new xacnhandon();
                                    if (isset($_GET['act']) && $_GET['act'] == 'trangthai') {
                                        $kh = $ql->selectLoaiDon($_GET['tt']);
                                        $tong = $ql->selectLoaiDon($_GET['tt'])->rowCount();
                                    } else {
                                        $kh = $ql->selectTatCaDon();
                                        $tong = $ql->selectTatCaDon()->rowCount();
                                    }
                                    if ($tong > 0) : ?>
                                        <thead>
                                            <th class="fw-500">Mã Đơn</th>
                                            <th class="fw-500">Tên Khách</th>
                                            <th class="fw-500">Email</th>
                                            <th class="fw-500">Ngày Đặt</th>
                                            <th class="fw-500">Tiền Ship</th>
                                            <th class="fw-500">Trạng Thái</th>
                                            <th class="fw-500">Chi Tiết</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            while ($item = $kh->fetch()) :
                                                $i++;
                                            ?>
                                                <tr class="hoverlist <?php echo $i % 2 ? 'bg-e5e5e5 ' : '' ?>">
                                                    <td><?php echo $item['masohd']; ?></td>
                                                    <td><?php echo $item['tenkh']; ?> </td>
                                                    <td><?php echo $item['email']; ?></td>
                                                    <td><?php echo $item['ngaydat']; ?></td>
                                                    <td><?php echo number_format($item['tienship']); ?></td>
                                                    <td>
                                                        <?php if ($item['trangthai'] == 0) {
                                                            echo 'Chờ Xác Nhận';
                                                        }
                                                        ?>
                                                        <?php if ($item['trangthai'] == 1) {
                                                            echo 'Đang Giao Hàng';
                                                        }
                                                        ?>
                                                        <?php if ($item['trangthai'] == 2) {
                                                            echo 'Đơn Hoàn Thành';
                                                        }
                                                        ?>
                                                        <?php if ($item['trangthai'] == 3) {
                                                            echo 'Đã Bị Hủy';
                                                        }
                                                        ?>
                                                        <?php if ($item['trangthai'] == 4) {
                                                            echo 'Đợi Xác Nhận Trả Hàng';
                                                        }
                                                        ?>
                                                        <?php if ($item['trangthai'] == 5) {
                                                            echo 'Đổi/Trả Hàng Thành Công';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><a class="xemchitiet" href="index.php?action=xacnhandon&act=xemchitiet&masohd=<?php echo $item['masohd']; ?>">Xem Chi Tiết</a></td>


                                                </tr>
                                            <?php
                                            endwhile;
                                        else :
                                            ?>
                                            <div class="text-center mt-7 mb-7">
                                                <h2 class="text-center text-d9d9d9">không có gì ở đây</h2>
                                            </div>

                                        <?php endif; ?>
                                        </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
<?php
    endif;
?>
</div>
</div>