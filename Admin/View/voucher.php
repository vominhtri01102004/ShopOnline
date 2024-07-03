<div class="table-responsive mt-5">
    <?php
    if (isset($_GET['act']) && $_GET['act'] == 'ship') {
        echo '<form action="index.php?" method="post">';
        $ac = 1;
    }
    if (isset($_GET['act']) && $_GET['act'] == 'voucher') {
        echo '<form action="index.php?" method="post">';
        $ac = 2;
    }

    ?>

    <div class="untree_co-section background mt-4">
        <div class="container mw-1370px w-1400px">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center">
                            <div class="col-4">
                                <?php
                                if ($ac == 1) {
                                    if ($_SESSION['chucvu'] == 'Admin' || $_SESSION['chucvu'] == 'Quản Lý') {
                                ?>
                                        <a class="btn btn-danger" href="index.php?action=voucher&act=ship_insert"><i class="fa-solid fa-user-plus"></i></a>
                            </div>
                            <div class="col-8">
                                <h1 class=" mb-3 text-xxl-center text-start">Quản Lý Loại Ship</h1>
                            </div>
                        <?php
                                    }
                                } else {
                                    if ($_SESSION['chucvu'] == 'Admin' || $_SESSION['chucvu'] == 'Quản Lý') {
                        ?>
                            <a class="btn btn-danger" href="index.php?action=voucher&act=voucher_insert"><i class="fa-solid fa-user-plus"></i></a>
                        </div>
                        <div class="col-8">
                            <h1 class=" mb-3 text-xxl-center text-start">Quản Lý Voucher</h1>
                        </div>
                    <?php }
                                }
                                $ql = new voucher();
                                if ($ac == 1) {
                                    $kh = $ql->selectAllShip();
                                    $tong = $ql->selectAllShip()->rowCount();
                                }
                                if ($ac == 2) {
                                    $kh = $ql->selectAllVoucher();
                                    $tong = $ql->selectAllVoucher()->rowCount();
                                }
                                if ($tong > 0) { ?>
                    </div>
                    <div class="p-3 p-lg-5 border bg-white">
                        <table class="table site-block-order-table mb-5">
                            <thead>
                                <th class="fw-500">Mã <?php echo $ac == 1 ? 'Ship' : 'Voucher' ?></th>
                                <th class="fw-500">Loại <?php echo $ac == 1 ? 'Ship' : 'Voucher' ?></th>
                                <?php

                                    if ($ac == 2) {
                                ?>
                                    <th class="fw-500">Dùng Cho</th>
                                    <th class="fw-500">Số Lượng</th>
                                    <th class="fw-500">Đơn Tối Thiểu</th>
                                    <th class="fw-500">Giảm Tối Đa</th>
                                    <th class="fw-500">Ngày Bắt Đầu</th>
                                    <th class="fw-500">Ngày Kết Thức</th>

                                <?php
                                    }
                                ?>

                                <th class="fw-500">Giá <?php echo $ac == 1 ? 'Tiền' : 'Trị Voucher' ?></th>
                                <th class="fw-500">Sửa</th>
                                <th class="fw-500">Xóa</th>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    while ($item = $kh->fetch()) :
                                        $i++;
                                ?>
                                    <tr class="hoverlist <?php echo $i % 2 ? 'bg-e5e5e5 ' : '' ?>">
                                        <?php
                                        if ($ac == 1) {
                                        ?>
                                            <td><?php echo $item['idship']; ?></td>
                                            <td><?php echo $item['tenship']; ?> </td>
                                            <td> <?php echo number_format(($item['gia'])); ?></td>
                                        <?php } else {
                                        ?>
                                            <td><?php echo $item['mavoucher']; ?></td>
                                            <td><?php echo $item['loaivoucher']; ?> </td>
                                            <td><?php echo $item['dungcho']; ?> </td>
                                            <td><?php echo $item['soluongvoucher']; ?> </td>
                                            <td><?php echo number_format($item['toithieu']); ?></td>
                                            <td><?php echo number_format($item['toida']); ?></td>
                                            <td><?php echo $item['batdau']; ?> </td>
                                            <td><?php echo $item['ketthuc']; ?> </td>
                                            <td> <?php echo number_format(($item['giatri']));
                                                    echo  $item['loaivoucher'] == 'Phần Trăm' ? ' %' : '';    ?></td>
                                        <?php } ?>
                                        <?php
                                        if ($_SESSION['chucvu'] == 'Admin' || $_SESSION['chucvu'] == 'Quản Lý') {
                                            if ($ac == 1) {
                                        ?>
                                                <td><a class="btn btn-danger" href="index.php?action=voucher&act=ship_update&idship=<?php echo $item['idship']; ?>"><i class="fa-solid fa-pen fa-xs"></i></a></td>
                                                <td><a class="btn btn-danger link" onclick="showConfirmation(this)"  href="index.php?action=voucher&act=delship&idship=<?php echo $item['idship']; ?>"><i class="fa-regular fa-trash-can "></i></a></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td><a class="btn btn-danger" href="index.php?action=voucher&act=voucher_update&mavoucher=<?php echo $item['mavoucher']; ?>"><i class="fa-solid fa-pen fa-xs"></i></a></td>
                                                <td><a class="btn btn-danger link" onclick="showConfirmation(this)"  href="index.php?action=voucher&act=delvoucher&mavoucher=<?php echo $item['mavoucher']; ?>"><i class="fa-regular fa-trash-can "></i></a></td>
                                        <?php
                                            }
                                        } else {
                                            echo '<td>Không Đủ Quyền</td>';
                                            echo '<td>Không Đủ Quyền</td>';
                                        }
                                        ?>

                                    </tr>
                                <?php
                                    endwhile;
                                } else {
                                ?>
                    </div>
                    <div class="text-center">
                        <h2 class="text-center text-d9d9d9 me-13rem p-7 ">Kho Trống</h2>
                    </div>
                <?php
                                }
                ?>
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
</div>
</div>