<div class="col-12">
    <?php
    $ac = 1;
    if (isset($_GET['action'])) {
        if (isset($_GET['act']) && $_GET['act'] == 'ship_insert') {
            $ac = 1;
            echo '<div class="d-flex">
            <div class="col-2 text-center align-content-center">
                <a href="index.php?action=voucher&act=ship">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </div>
            <div class="col-8">
                <h1 class="text-center">Thêm Loại Ship Mới</h1>
            </div>
        </div>';
        }
        if (isset($_GET['act']) && $_GET['act'] == 'ship_update') {
            $ac = 2;
            echo '<div class="d-flex">
            <div class="col-2 text-center align-content-center">
                <a href="index.php?action=voucher&act=ship">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </div>
            <div class="col-8">
                <h1 class="text-center">Chỉnh Sửa Loại Ship</h1>
            </div>
        </div>';
        }
        if (isset($_GET['act']) && $_GET['act'] == 'voucher_insert') {
            $ac = 3;
            echo '<div class="d-flex">
            <div class="col-2 text-center align-content-center">
                <a href="index.php?action=voucher&act=voucher">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </div>
            <div class="col-8">
                <h1 class="text-center">Thêm Voucher Mới</h1>
            </div>
        </div>';
        }
        if (isset($_GET['act']) && $_GET['act'] == 'voucher_update') {
            $ac = 4;
            echo '<div class="d-flex">
                <div class="col-2 text-center align-content-center">
                    <a href="index.php?action=voucher&act=voucher">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Chỉnh Sửa Voucher</h1>
                </div>
            </div>';
        }
    }
    ?>
    <div class="d-flex col-md-12  mt-5 placecontentcenter mb-5">
        <?php
        if ($ac == 1) {
            echo '<form action="index.php?action=voucher&act=ship_insert_action"  method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
        }
        if ($ac == 2) {
            echo '<form action="index.php?action=voucher&act=ship_update_action"  method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
        }
        if ($ac == 3) {
            echo '<form action="index.php?action=voucher&act=voucher_insert_action"  method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
        }
        if ($ac == 4) {
            echo '<form action="index.php?action=voucher&act=voucher_update_action"  method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
        }

        if ($ac == 2) {
            $ql = new voucher();
            if (isset($_GET['idship'])) {
                $idship = $_GET['idship'];
                $ship = $ql->selectShipID($idship);
                $idship = $ship['idship'];
                $tenship = $ship['tenship'];
                $gia = $ship['gia'];
            }
        }
        if ($ac == 4) {
            $ql = new voucher();
            if (isset($_GET['mavoucher'])) {
                $mavoucher = $_GET['mavoucher'];
                $ship = $ql->selectVoucherID($mavoucher);;
                $soluong = $ship['soluongvoucher'];
                $loaivoucher = $ship['loaivoucher'];
                $dungcho = $ship['dungcho'];
                $batdau = $ship['batdau'];
                $ketthuc = $ship['ketthuc'];
                $gia = $ship['giatri'];
                $toithieu = $ship['toithieu'];
                $toida = $ship['toida'];
            }
        }
        ?>


        <table class="table table-hover">

            <?php
            if ($ac == 1 || $ac == 2) {
            ?>
                <tr>
                    <td class="text-center">Mã Ship</td>
                    <td> <input type="text" class="form-control" autocomplete="off" required name="idship" value="<?php if (isset($idship)) echo $idship; ?>" readonly /></td>
                </tr>
                <tr>
                    <td class="text-center">Tên Loại Ship</td>
                    <td><input type="text" class="form-control" autocomplete="off" placeholder="Tên Loại Ship" required name="tenship" value="<?php if (isset($tenship)) echo $tenship; ?>"></td>
                </tr>
                <tr>
                    <td class="text-center">Giá Tiền</td>
                    <td> <input type="text" class="form-control" autocomplete="off" min="1" autocomplete="off" placeholder="Giá Tiền" required name="gia" value="<?php echo isset($gia) ? number_format($gia) : '' ?>" /></td>
                </tr>

            <?php
            } else {
            ?>
                <tr>
                    <td class="text-center">Mã Voucher</td>
                    <td> <input type="text" class="form-control" autocomplete="off" required name="mavoucher" value="<?php if (isset($mavoucher)) echo $mavoucher; ?>" readonly /></td>
                </tr>
                <tr>
                    <td class="text-center"> <label class="fw-normal">Loại Voucher</label></td>
                    <td>
                        <?php
                        $selectloai = 'aa';
                        if (isset($loaivoucher) && $loaivoucher != 'aa') {
                            $selectloai = $loaivoucher; //6
                        }
                        if ($ac == 4) {
                        ?>

                            <select name="loaivoucher" id="Chức Vụ" class="form-control">
                                <option value="<?php echo $loaivoucher ?> 
                            " <?php if ($selectloai == $loaivoucher)
                                    echo 'selected'; ?>>
                                    <?php echo $loaivoucher
                                    ?>
                                </option>
                                <?php if ($loaivoucher == 'VND') { ?>
                                    <option value="Phần Trăm">Phần Trăm</option>
                                <?php }
                                if ($loaivoucher == 'Phần Trăm') { ?>
                                    <option value="VND">VND</option>
                                <?php } ?>
                            </select>
                        <?php } else { ?>

                            <select name="loaivoucher" id="Chức Vụ" class="form-control">
                                <option value="VND">VND</option>
                                <option value="Phần Trăm">Phần Trăm</option>
                            </select>

                        <?php } ?>

                    </td>
                </tr>
                <tr>
                    <td class="text-center"> <label class="fw-normal">Voucher Dùng Cho</label></td>
                    <td>
                        <?php
                        $selectloai = 'aa';
                        if (isset($dungcho) && $dungcho != 'aa') {
                            $selectloai = $dungcho; //6
                        }
                        if ($ac == 4) {
                        ?>
                            <select name="dungcho" id="Chức Vụ" class="form-control">
                                <option value="<?php echo $dungcho ?> 
                            " <?php if ($selectloai == $dungcho)
                                    echo 'selected'; ?>>
                                    <?php echo $dungcho
                                    ?>
                                </option>
                                <?php if ($dungcho == 'Ship Hàng') { ?>
                                    <option value="Hàng Hóa">Hàng Hóa</option>
                                <?php } else { ?>
                                    <option value="Ship Hàng">Ship Hàng</option>
                                <?php } ?>
                            </select>
                        <?php } else { ?>

                            <select name="dungcho" id="Chức Vụ" class="form-control">
                                <option value="Hàng Hóa">Hàng Hóa</option>
                                <option value="Ship Hàng">Ship Hàng</option>
                            </select>

                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">Số Lượng Voucher</td>
                    <td> <input type="number" class="form-control" autocomplete="off" number_format min="1" required name="soluong" value="<?php if (isset($soluong)) echo $soluong; ?>" /></td>
                </tr>
                <tr>
                    <td class="text-center">Tiền Tối Thiểu
                    </td>
                    <td> <input type="text" class="form-control" autocomplete="off" min="1" required name="toithieu" value="<?php if (isset($toithieu)) echo number_format($toithieu); ?>" /></td>
                </tr>
                <?php if ($ac == 4 && $loaivoucher == 'VND') { ?>
                    <tr>
                        <td class="text-center">Giảm Tối Đa
                        </td>
                        <td> <input type="text" class="form-control" readonly autocomplete="off" min="0" required name="toida" value="<?php if (isset($toida)) echo number_format($toida); ?>" /></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td class="text-center">Giảm Tối Đa
                        </td>
                        <td> <input type="text" class="form-control" autocomplete="off" min="0" required name="toida" value="<?php if (isset($toida)) echo number_format($toida); ?>" /></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="text-center">Ngày Bắt Đầu</td>
                    <td> <input type="date" class="form-control" autocomplete="off" required name="batdau" value="<?php if (isset($batdau)) echo $batdau; ?>" /></td>
                </tr>
                <tr>
                    <td class="text-center">Ngày Kết Thúc</td>
                    <td><input type="date" class="form-control" autocomplete="off" autocomplete="off" required autocomplete="off" name="ketthuc" value="<?php if (isset($ketthuc)) echo $ketthuc; ?>"></td>
                </tr>
                <tr>
                    <td class="text-center">Giá Trị Voucher
                    </td>
                    <td> <input type="text" class="form-control" autocomplete="off" min="0" autocomplete="off" placeholder="Giá Trị Voucher VND/%" required name="giatri" value="<?php echo isset($gia) ? number_format($gia) : '' ?>" /></td>
                </tr>
            <?php
            }
            ?>
            <!-- nếu thêm sản phẩm thì phải có số lượng, hình ảnh, size -->
        </table>
        <div class="col-12  text-center">

            <input class="btn col-8 submit vmt background border shadow" type="submit" value="Xong">
        </div>
        </form>
    </div>
</div>