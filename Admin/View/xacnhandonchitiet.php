<style>
    body {
        background-color: #F2F2F2;
    }
</style>
<div class="text-center">
    <div class="table-responsive mt-4">
        <form class="pt-2" method="post">
            <?php
            $date = new DateTime('now');
            $ngay = $date->format('Y-m-d');
            // $ngay = $ngaymua;
            if (isset($_SESSION['chucvu'])) {
                $chucvu = $_SESSION['chucvu'];
                $hd = new xacnhandon();
                $kh = $hd->selectThongTinKHLSChiTiet($_GET['masohd']);
                $tenkh = $kh['tenkh'];
                $email = $kh['email'];
                $dc = $kh['diachi'];
                $sodt = $kh['sodienthoai'];
                $ngaydat = $kh['ngaydat'];
                $trangthai = $kh['trangthai'];
                $ghichu = $kh['ghichu'];
                $tienship = $kh['tienship'];
                $voucherhanghoa = $kh['voucherhanghoa'];
                $vouchership = $kh['vouchership'];
                $phivanchuyen = $tienship - $vouchership;
            ?>
                <div class="untree_co-section">
                    <div class="container whcontainer">
                        <div class="col-md-12">
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <div class="">
                                            <div class="d-flex">
                                                <div class="col-2 align-content-center">
                                                    <a href="index.php?action=xacnhandon">
                                                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                                                    </a>
                                                </div>
                                                <div class="col-8">
                                                    <h1 class="text-center">Đơn Số <?php echo $_GET['masohd']; ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-lg-5 mt-3 bg-light rounded-30px">
                                        <table class="table site-block-order-table mb-0">
                                            <thead>
                                                <th class="text-center font13 borderdouble">Hình</th>
                                                <th class="text-center font13 borderdouble">Tên</th>
                                                <th class="text-center font13 borderdouble">Loại</th>
                                                <th class="text-center font13 borderdouble">Màu</th>
                                                <th class="text-center font13 borderdouble">Size</th>
                                                <th class="text-center font13 borderdouble">Số Lượng</th>
                                                <th class="text-center font13 borderdouble">Đơn Giá</th>
                                                <th class="text-center font13 borderdouble">Giảm Giá</th>
                                                <th class="text-center font13 borderdouble">Thành Tiền</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ls = new xacnhandon();
                                                $tongtien = 0;
                                                $thanhtien = 0;
                                                $dongia = 0;
                                                $soluongmua = 0;

                                                $result = $ls->selectThongTinHDonLSChiTiet($_GET['masohd']);
                                                while ($set = $result->fetch()) :
                                                    if ($set['giamgia'] > 0) {
                                                        $thanhtien = ($set['soluongmua'] * $set['giamgia']);
                                                    } else {

                                                        $thanhtien = ($set['soluongmua'] * $set['dongia']);
                                                    }
                                                    $dongia += $set['dongia'] * $set['soluongmua'];
                                                    $soluongmua += $set['soluongmua'];
                                                    $tongtien += $thanhtien;


                                                ?>
                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" alt="Image" class="img-fluid hinhlichsu">
                                                        </td>
                                                        <td class="align-middle font13"><?php echo $set['tenhh']; ?></td>
                                                        <td class="align-middle font13"><?php echo $set['loai']; ?></td>
                                                        <td class="align-middle font13"><?php echo $set['mausac']; ?></td>
                                                        <td class="align-middle font13" class="text-center"><?php echo $set['size']; ?> </td>
                                                        <td class="align-middle font13" class="text-center"><?php echo $set['soluongmua']; ?></td>
                                                        <td class="align-middle font13">
                                                            <?php
                                                            if ($set['giamgia'] > 0) {
                                                                echo '<strike class="strikehome strikeslt"><strong class="stronglislt fw-normal text-rbg2">' . number_format($set['dongia']) . '</strong></strike>';
                                                            }
                                                            if ($set['giamgia']  == 0) {
                                                                echo number_format($set['dongia']);
                                                            }
                                                            ?></td>
                                                        <td class="align-middle font13">
                                                            <?php
                                                            if ($set['giamgia'] > 0) {
                                                                echo number_format($set['giamgia']);
                                                            }
                                                            if ($set['giamgia']  == 0) {
                                                                echo '/';
                                                            }
                                                            ?></td>
                                                        <td class="fw-normal align-middle font13">
                                                            <?php
                                                            echo number_format($thanhtien);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                // endwhile;
                                                endwhile;
                                                ?>
                                                <tr>
                                                    <td class="text-black font13 align-middle" colspan="5"><strong>Tổng Tiền</strong></td>

                                                    <td class="text-black font13 fw-bold" colspan="4"><?php echo number_format($tongtien); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php if ($ghichu != null && $ghichu != 0) { ?>
                                            <p class="item-quantity text-start">
                                                <?php echo  $trangthai == 0 || $trangthai == 1 || $trangthai == 2 ? 'Ghi Chú: ' . $ghichu . '' : '' ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container whcontainer justify-content-center d-flex">
                        <div class="col-md-12 mb-5 ">
                            <div class="p-lg-5 bg-light text-center d-flex  rounded-30px">
                                <div class="col-5 pt-4 pb-5 pe-5 ps-5 br-solid border-end">
                                    <h2 class="h3 mb-5 mt-0 text-black">
                                        <n>Chi Tiết Hóa Đơn</n>
                                    </h2>
                                    <div class="d-flex p-4">
                                        <div class="col-6 text-start">
                                            <p>Tổng Đơn Giá</p>
                                        </div>
                                        <div class="col-6">
                                            <p><?php echo number_format($dongia); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top p-4">
                                        <div class="col-6 text-start">
                                            <p>Phí Vận Chuyển
                                            <p>
                                        </div>
                                        <div class="col-6">
                                            <p><?php echo number_format($tienship); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top p-4">
                                        <div class="col-6 text-start">
                                            <p>Tổng Giảm Giá Mặc Hàng</p>
                                        </div>
                                        <div class="col-6">
                                            <p>- <?php echo number_format($giamgia = $dongia - $tongtien); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top p-4">
                                        <div class="col-6 text-start">
                                            <p>Voucher Phí Vận Chuyển</p>
                                        </div>
                                        <div class="col-6">
                                            <p><?php echo $vouchership != 0 ? '- ' . number_format($vouchership) : '/'; ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top p-4">
                                        <div class="col-6 text-start">
                                            <p>Voucher Hàng Hóa</p>
                                        </div>
                                        <div class="col-6">
                                            <p><?php echo $voucherhanghoa != 0 ? '- ' . number_format($voucherhanghoa) : '/'; ?></p>
                                        </div>

                                    </div>
                                    <div class="d-flex border-top p-4">
                                        <div class="col-6 text-start">
                                            <p>Tổng Tiền Hàng</p>
                                        </div>
                                        <div class="col-6">
                                            <p><?php echo number_format($tongtien + $phivanchuyen); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7 pt-4 pb-5 pe-5 ps-5">
                                    <div class="">
                                        <p class="mb-3 text-black text-center textgreen"><i class="fa-solid fa-circle-info"></i> Thông Tin Người Nhận</p>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <div class="col-12 ">
                                            <div class="d-flex offset-2">
                                                <p class="text-start fs-16px me-1">Tên khách Hàng:</p>
                                                <p> <?php echo $tenkh ?></p>
                                            </div>
                                            <div class="">
                                                <div class="col-12 p-0">
                                                    <p class="text-start fs-16px text-center">Địa Chỉ Nhận hàng</p>
                                                </div>
                                                <div class="col-12 p-0">
                                                    <p class=""><?php echo $dc ?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex offset-2">
                                                <p class="text-start fs-16px me-1">Số Điện Thoại: </p>
                                                <p><?php echo $sodt ?></p>
                                            </div>
                                            <div class="">
                                                <div class="col-12 p-0">
                                                    <p class="text-start fs-16px text-center">Email Người Nhận</p>
                                                </div>
                                                <div class="col-12 p-0">
                                                    <p class=""><?php echo $email ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-4 borderbottom">
                                        <div class="h4 col-6 p-2 text-center">Phương Thức Thanh Toán:</div>
                                        <div class="h4 col-6 p-2 text-start textorange">Thanh Toán Trực Tiếp</div>
                                    </div>
                                    <div class="d-flex mb-4 borderbottom">
                                        <div class="h4 col-6 p-2 text-center">Trạng Thái Đơn Hàng:</div>
                                        <div class="h4 col-6 p-2 text-start textgreen">
                                            <?php
                                            if ($trangthai == 0) {
                                                echo 'Chờ Xác Nhận';
                                            }
                                            if ($trangthai == 1) {
                                                echo 'Đang Giao Hàng';
                                            }
                                            if ($trangthai == 2) {
                                                echo 'Đơn Đã Hoàn Thành';
                                            }

                                            if ($trangthai == 3) {
                                                echo 'Đơn Đã Bị Hủy';
                                            }

                                            if ($trangthai == 4) {
                                                echo 'Chờ Xác Nhận Đổi/Trả Hàng';
                                            }
                                            if ($trangthai == 5) {
                                                echo 'Đổi/Trả Hàng Thành Công';
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-6 text-end">
                                            <?php if ($trangthai == 0) { ?>
                                                <a href="index.php?action=xacnhandon&act=xacnhan&masohd=<?php echo $_GET['masohd']; ?>&tt=<?php echo $trangthai; ?>" class="col-6">
                                                    <button class="xacnhandon" type="button">
                                                        Xác Nhận Đơn
                                                    </button>
                                                </a>
                                            <?php } ?>
                                            <?php if ($trangthai == 4) { ?>
                                                <a href="index.php?action=xacnhandon&act=xacnhan&masohd=<?php echo $_GET['masohd']; ?>&tt=<?php echo $trangthai; ?>" class="col-6">
                                                    <button class="xacnhandon" type="button">
                                                        Xác Nhận Trả Hàng
                                                    </button>
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-6 text-start">
                                            <?php
                                            if ($trangthai == 0) {
                                            ?>
                                                <a href="index.php?action=xacnhandon&act=huydon&masohd=<?php echo $_GET['masohd']; ?>&tt=<?php echo $trangthai; ?>" class="col-6">
                                                    <button class="huydon" type="button">
                                                        Hủy Đơn
                                                    </button>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <?php echo  $trangthai == 3 || $trangthai == 4 || $trangthai == 5 ? '<p class="text-start">Lý Do Đổi Hàng: ' . $ghichu . '</p>' : '' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
<?php
            }
?>
</div>