<div class="text-center">
    <div class="table-responsive mt-4 background">
        <?php
        if (!isset($_SESSION['makh'])) :
            echo '<script> alert("Bạn Phải Đăng Nhập");</script>';
            echo '<meta  http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
        ?>
        <?php
        else :
        ?>
            <form class="pt-2" method="post">
                <?php
                $date = new DateTime('now');
                $ngay = $date->format('Y-m-d');
                if (isset($_SESSION['makh'])) {
                    $makh = $_SESSION['makh'];
                    $us = new user();
                    $kh = $us->getUser($_SESSION['makh']);
                    $username = $kh['username'];
                    $email = $kh['email'];
                    $tenkhdatho = $kh['tenkh'];
                    $hd = new hoadon();
                    $hh = $hd->selectThongTinHDonLSChiTiet1($_POST['masohd']);
                    $ghichu = $hh['ghichu'];
                    $ngaydat = $hh['ngaydat'];
                    $tienship = $hh['tienship'];
                    $vouchership = $hh['vouchership'];
                    $voucherhanghoa = $hh['voucherhanghoa'];
                    $tenkh = $hh['tenkh'];
                    $trangthai = $hh['trangthai'];
                    $sodt = $hh['sodienthoai'];
                    $dc = $hh['diachi'];
                    if ($hh['tenkh'] == $kh['tenkh'] && $hh['sodienthoai'] == $kh['sodienthoai']) {
                        $datho = 0;
                    } else {
                        $datho = 1;
                    }
                    $phivanchuyen = $tienship - $vouchership;
                ?>
                    <div>
                        <h2>HÓA ĐƠN <?php echo $_POST['masohd'] ?></h2>
                    </div>
                    <div class="untree_co-section">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <h2 class="h3 mb-3 text-black">Chi Tiết Đơn Hàng Đã Mua</h2>
                                        <div class="p-3 p-lg-5 border bg-white">
                                            <table class="table site-block-order-table mb-0">
                                                <thead>
                                                    <th class="fw-500">Hình</th>
                                                    <th class="fw-500">Thông Tin Sản Phẩm</th>
                                                    <th class="fw-500">Loại</th>
                                                    <th class="fw-500">Size</th>
                                                    <th class="fw-500">Màu</th>
                                                    <th class="fw-500">Số Lượng</th>
                                                    <th class="fw-500">Đơn Giá</th>
                                                    <th class="fw-500">Giảm Giá</th>
                                                    <th class="fw-500">Thành Tiền</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // $hh = new hanghoa();
                                                    // $result = $hh->getHangHoaSale();
                                                    // while ($set = $result->fetch()) :

                                                    $ls = new hoadon();
                                                    $tongtien = 0;
                                                    $thanhtien = 0;
                                                    $dongia = 0;
                                                    $soluongmua = 0;

                                                    $result = $ls->selectThongTinHDonLSChiTiet($_POST['masohd']);
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
                                                            <td class="align-middle"><?php echo $set['tenhh']; ?></td>
                                                            <td class="align-middle"><?php echo $set['loai']; ?></td>
                                                            <td class="align-middle" class="align-middle"><?php echo $set['size']; ?> </td>
                                                            <td class="align-middle"><?php echo $set['mausac']; ?></td>
                                                            <td class="align-middle"><?php echo $set['soluongmua']; ?></td>
                                                            <td class="align-middle">
                                                                <?php
                                                                if ($set['giamgia'] > 0) {
                                                                    echo '<strike class="strikehome strikeslt align-middle"><strong class="stronglislt align-middle fw-normal text-rbg2">' . $set['dongia'] . '</strong></strike>';
                                                                }
                                                                if ($set['giamgia']  == 0) {
                                                                    echo number_format($set['dongia']);
                                                                }
                                                                ?></td>
                                                            <td class="align-middle">
                                                                <?php
                                                                if ($set['giamgia'] > 0) {
                                                                    echo number_format($set['giamgia']);
                                                                }
                                                                if ($set['giamgia']  == 0) {
                                                                    echo '/';
                                                                }
                                                                ?></td>
                                                            <td class="fw-normal align-middle">
                                                                <?php
                                                                echo number_format($thanhtien);
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    endwhile;
                                                    ?>
                                                    <tr>
                                                        <td class="text-black align-middle" colspan="5"><strong>Tổng Tiền</strong></td>
                                                        <td class="text-black fw-500" colspan="4"><?php echo number_format($tongtien); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="item-quantity text-start minh-27">
                                                <?php if ($ghichu != null & $ghichu != 0) { ?>
                                                    <?php echo $trangthai == 3 || $trangthai == 4 || $trangthai == 5 ? 'Lý Do Trả Hàng: ' . $ghichu : 'Ghi Chú: ' . $ghichu  ?>
                                                <?php } ?>
                                            </p>
                                            <div class="text-end">
                                                <h2 class="h3 mb-3 text-black col-11">Cảm Ơn Bạn Đã Lựa Chọn Chúng Tôi!</h2>
                                                <div class="form-group col-11">
                                                    <div class="d-flex align justify-content-right">
                                                        <div class="col-2 me-4">
                                                            <a href="index.php?action=tinnhan&act=tinnhan">
                                                                <button class="btn vmt col-md-12 my-sm-0 bg-rbg3 bordernone" name="button" type="button">Liên Hệ</button>
                                                            </a>
                                                        </div>
                                                        <div class="col-2">
                                                            <a href="index.php?action=giohang&act=mualai&masohd=<?php echo $_POST['masohd']; ?>">
                                                                <button class="btn vmt col-md-12 my-sm-0 bg-rbg3 bordernone" name="button" type="button">Mua Lại</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5 mb-5 ">
                                    <span>
                                        <h2 class="h3 mb-3 text-black"> Khách Hàng</h2><span>
                                            <div class="p-5 border bg-white text-center <?php echo $datho == 0 ? '' : 'pt-2 pb-2' ?>">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_lname" class="text-black">Số Hóa Đơn <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control disabledorder text-center" id="c_lname" name="c_lname" value="<?php echo $_POST['masohd'] ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_fname" class="text-black">Tên Khách Hàng <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control disabledorder text-center" id="c_fname" name="c_fname" value="<?php echo $tenkh; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_address" class="text-black">Địa Chỉ <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control disabledorder text-center" id="c_address" name="c_address" value="<?php echo $dc; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_address" class="text-black">Ngày Mua <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control disabledorder text-center" id="c_address" name="c_address" value="<?php echo $ngaydat; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_phone" class="text-black">Số Điện Thoại <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control disabledorder text-center" id="c_phone" name="c_phone" value="<?php echo $sodt; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="c_email_address" class="text-black">Email <span class="text-danger"></span></label>
                                                        <input type="text" class="form-control disabledorder text-center" id="c_email_address" name="c_email_address" value="<?php echo $email; ?>" disabled>
                                                    </div>
                                                </div>
                                                <?php if ($datho == 1) { ?>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label for="c_email_address" class="text-black">Khách Hàng Đã Đặt Hộ <span class="text-danger"></span></label>
                                                            <input type="text" class="form-control disabledorder text-center" id="c_email_address" name="c_email_address" value="<?php echo $tenkhdatho ?>" disabled>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                </div>
                                <div class="col-md-7 mb-5 ">
                                    <span>
                                        <h2 class="h3 mb-3 text-black"> <b>Chi Tiết Hóa Đơn</b></h2><span>
                                            <div class="p-3 p-lg-5 border bg-white text-center">
                                                <div class="d-flex border-top p-4">
                                                    <div class="col-6 text-start"><b>Tổng Đơn Giá</b></div>
                                                    <div class="col-6"><b><?php echo number_format($dongia); ?></b></div>
                                                </div>
                                                <div class="d-flex border-top p-4">
                                                    <div class="col-6 text-start"><b>Phí Vận Chuyển</b></div>
                                                    <div class="col-6"><b><?php echo number_format($tienship); ?></b></div>
                                                </div>
                                                <div class="d-flex border-top p-4">
                                                    <div class="col-6 text-start"><b>Tổng Giảm Giá Mặt Hàng</b></div>
                                                    <div class="col-6"><b>- <?php echo number_format($giamgia = $dongia - $tongtien); ?></b></div>
                                                </div>
                                                <div class="d-flex border-top p-4">
                                                    <div class="col-6 text-start"><b>Voucher Phí Vận Chuyển</b></div>
                                                    <div class="col-6"><b><?php echo $vouchership != 0 ? '- ' . number_format($vouchership) : '/'; ?></b></div>
                                                </div>
                                                <div class="d-flex border-top p-4">
                                                    <div class="col-6 text-start"><b>Voucher Hàng Hóa</b></div>
                                                    <div class="col-6"><b><?php echo $voucherhanghoa != 0 ? '- ' . number_format($voucherhanghoa) : '/'; ?></b></div>

                                                </div>
                                                <div class="d-flex border-top p-4">
                                                    <div class="col-6 text-start"><b>Tổng Tiền Hàng</b></div>
                                                    <div class="col-6"><b><?php echo number_format($tongtien + $phivanchuyen); ?></b></div>
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
            endif;
?>
</div>