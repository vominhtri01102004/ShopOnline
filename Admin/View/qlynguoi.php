<div class="table-responsive mt-5">
    <?php
    if (isset($_GET['act']) && $_GET['act'] == 'nhanvien') {
        $ac = 1;
    }
    if (isset($_GET['act']) && $_GET['act'] == 'khachhang') {
        $ac = 2;
    }
    ?>
    <div class="untree_co-section background mt-4">
        <div class="container mw-1370px w-1400px">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <?php if ($ac == 1) {
                        ?>
                            <div class="d-flex align-items-center">
                                <div class="col-4">
                                    <?php
                                    if ($_SESSION['chucvu'] == 'Admin' || $_SESSION['chucvu'] == 'Quản Lý') {
                                    ?>
                                        <a class="btn btn-danger" href="index.php?action=nhanvien&act=themnhanvien"><i class="fa-solid fa-user-plus"></i></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-8">
                                    <h1 class=" mb-3 text-xxl-center text-start">Quản Lý Nhân Viên</h1>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="d-flex align-items-center">
                                <div class="col-4">
                                    <?php
                                    if ($_SESSION['chucvu'] == 'Admin' || $_SESSION['chucvu'] == 'Quản Lý') {
                                    ?>
                                        <a class="btn btn-danger" hidden href="index.php?action=khachhang&act=themkhachhang"><i class="fa-solid fa-user-plus"></i></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-8">
                                    <h1 class=" mb-3 text-xxl-center text-start">Quản Lý Khách Hàng</h1>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="p-0 border bg-white">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th class="fw-500">Mã Số</th>
                                    <th class="fw-500">Tên </th>
                                    <th class="fw-500">Username</th>
                                    <th class="fw-500">Email</th>
                                    <th class="fw-500">Số Điện Thoại</th>
                                    <?php
                                    if ($ac == 1) {
                                        echo '<th class="fw-500">Chức Vụ</th>';
                                    }
                                    if ($ac == 2) {
                                        echo '<th class="fw-500 w-200px">Hình Đại Diện</th>';
                                    }
                                    ?>
                                    <th class="fw-500">Sửa</th>
                                    <th class="fw-500">Xóa</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $ql = new qlynguoi();
                                    if ($ac == 1) {
                                        $kh = $ql->selectAllNhanVien();
                                    }
                                    if ($ac == 2) {
                                        $kh = $ql->selectAllKhachHang();
                                    }
                                    $i = 0;
                                    while ($item = $kh->fetch()) :
                                        $i++;
                                    ?>
                                        <tr class="hoverlist <?php echo $i % 2 ? 'bg-e5e5e5 ' : '' ?>">
                                            <?php
                                            if ($ac == 1) {
                                            ?>
                                                <td><?php echo $item['idnv']; ?></td>
                                                <td><?php echo $item['tennv']; ?> </td>
                                            <?php
                                            }
                                            if ($ac == 2) {
                                            ?>
                                                <td><?php echo $item['makh']; ?></td>
                                                <td><?php echo $item['tenkh']; ?> </td>
                                            <?php
                                            }
                                            ?>
                                            <td><?php echo $item['username']; ?></td>
                                            <td><?php echo $item['email']; ?></td>
                                            <td> <?php echo ($item['sodienthoai']); ?></td>
                                            <?php
                                            if ($ac == 1) {
                                            ?>
                                                <td> <?php echo ($item['chucvu']); ?></td>
                                            <?php } else { ?>
                                                <td> <img class="w-15 rounded-10px" src="Content/imagetourdien/<?php echo ($item['avatar']); ?>" alt=""></td>

                                            <?php } ?>
                                            <?php
                                            if ($_SESSION['chucvu'] == 'Admin' || $_SESSION['chucvu'] == 'Quản Lý' && $item['chucvu'] == 'Nhân Viên') {
                                                if ($ac == 1) {
                                            ?>
                                                    <td>
                                                        <form action="index.php?action=nhanvien&act=nhanvien_update" method="post">
                                                            <input type="hidden" value="<?php echo $item['idnv'] ?>" name="idnv">
                                                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-pen fa-xs"></button></i>
                                                        </form>
                                                    </td>
                                                    <td><a class="btn btn-danger link" onclick="showConfirmation(this)" <?php echo $_SESSION['idnv'] ==  $item['idnv'] ? 'disabled' : '' ?> href="
                                              <?php if ($_SESSION['idnv'] ==  $item['idnv']) {
                                                        echo '#';
                                                    } else { ?>   
                                                    index.php?action=nhanvien&act=delnhanvien&idnv=<?php echo $item['idnv']; ?>&tennv=<?php echo $item['tennv']; ?>&chucvu=<?php echo $item['chucvu']; ?> <?php } ?>"><i class="fa-regular fa-trash-can"></i></a></td>
                                                <?php
                                                }
                                                if ($ac == 2) {
                                                ?><td>
                                                        <form action="index.php?action=khachhang&act=khachhang_update" method="post">
                                                            <input type="hidden" value="<?php echo $item['makh'] ?>" name="makh">
                                                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-pen fa-xs"></button></i>
                                                        </form>
                                                    </td>

                                                    <td><a class="btn btn-danger link" onclick="showConfirmation(this)" href="index.php?action=khachhang&act=delkhachhang&makh=<?php echo $item['makh']; ?>"><i class="fa-regular fa-trash-can "></i></a></td>
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