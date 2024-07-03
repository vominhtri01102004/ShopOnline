<link rel="stylesheet" href="./Content/Css/style1.css">
<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php
        $ud = 1;
        if (isset($_GET['action'])) {
            if (isset($_GET['act']) && $_GET['act'] == 'sanphamchitiet') {
                $ud = 1;
            }
            if (isset($_GET['act']) && $_GET['act'] == 'sanphamchitietupdate') {
                $ud = 2;
            }
            if (isset($_GET['actt'])) {
                $th = 2;
            }
            if (!isset($_GET['actt'])) {
                $th = 1;
            }
        }
        ?>
        <div class="card">
            <div class="container-fliud">
                <form method="post" action="index.php?action=sanpham&act=sanphamchitietupdate&id=<?php echo $_GET['id'] ?>" id="cart-form" onsubmit="return check(index)">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="active">
                                <?php
                                // điều hướng qua view chi tiết, đông thời cũng truyền id
                                if (isset($_GET['id']) && $ud == 1) {
                                    $id = $_GET['id'];
                                    //view đòi hỏi cần có thông tin của sản phẩm mà id=24?model
                                    $hh = new hanghoa();
                                    $sp = $hh->getHangHoaId1($id, $th); // array(mahh:24,tenhh: giày...)
                                    $tenhh = $sp['tenhh'];
                                    $mota = $sp['mota'];
                                    $dongia = $sp['dongia'];
                                    $giamgia = $sp['giamgia'];
                                    $idmau = $sp['idmau'];
                                    $idsize = $sp['idsize'];
                                    $soluongton = $sp['soluongton'];
                                    $loai = $sp['tenloai'];
                                    $soluotxem = $sp['soluotxem'];
                                }
                                if (isset($_GET['id']) && $ud == 2) {
                                    $id = $_GET['id'];
                                    if (isset($_POST['mymausac'])) {
                                        $idmau = $_POST['mymausac'];
                                        $idsize = $_POST['size'];
                                    }
                                    if (isset($_GET['mymausac'])) {
                                        $idmau = $_GET['mymausac'];
                                        $idsize = $_GET['size'];
                                    }
                                    //view đòi hỏi cần có thông tin của sản phẩm mà id=24?model
                                    $hh = new hanghoa();
                                    $sp = $hh->getHangHoaId($id, $idmau, $idsize); // array(mahh:24,tenhh: giày...)
                                    $tenhh = $sp['tenhh'];
                                    $mota = $sp['mota'];
                                    $dongia = $sp['dongia'];
                                    $giamgia = $sp['giamgia'];
                                    $soluongton = $sp['soluongton'];
                                    $loai = $sp['tenloai'];
                                    $soluotxem = $sp['soluotxem'];
                                    $soluongton = $sp['soluongton'];
                                }
                                ?>
                                <?php
                                $ac = 1;
                                if (isset($_GET['action'])) {
                                    if (isset($_GET['act']) && $giamgia == 0) {
                                        $ac = 2;
                                    }
                                    if (isset($_GET['act']) && $giamgia != 0) {
                                        $ac = 1;
                                    }
                                }
                                $ud = 1;
                                if (isset($_GET['action'])) {
                                    if (isset($_GET['act']) && $_GET['act'] == 'sanphamchitiet') {
                                        $ud = 1;
                                    }
                                    if (isset($_GET['act']) && $_GET['act'] == 'sanphamchitietupdate') {
                                        $ud = 2;
                                    }
                                }
                                ?>
                                <?php
                                $hinh = $hh->getHangHoaHinh($id);
                                $set = $hinh->fetch(); // lấy ra thông tin của dòng đầu
                                ?>
                                <div class="tab-pane active">
                                    <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" name="hinh" id="main-image" class="mh-523px">
                                </div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <?php
                                $hinh1 = $hh->getHangHoaHinh($id);
                                $count = $hinh1->rowCount(); // Đếm số lượng hình

                                if ($count > 1) {
                                    while ($img = $hinh1->fetch()) :
                                ?>
                                        <li class="">
                                            <a data-target="#pic-1" data-toggle="tab" href="#<?php echo $img['hinh']; ?>">
                                                <img class="mwh-90px" src="<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>" class="preview-thumbnail" id="thumb-<?php echo $img['hinh']; ?>" onmouseover="changeImage('Content/imagetourdien/<?php echo $img['hinh']; ?>')">
                                            </a>
                                        </li>
                                <?php
                                    endwhile;
                                }
                                ?>
                                <i class="fa-regular fa-heart heart"></i>
                            </ul>
                        </div>
                        <div class="details col-md-6">
                            <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                            <h3 class="product-title UPPERCASE">
                                <?php echo $tenhh; ?>
                            </h3>
                            <div class="rating">
                                <?php
                                $comment = $hh->getComment($id);
                                $a = 0;
                                $diemtong = 0;
                                while ($diem = $comment->fetch()) :
                                    $a++;
                                    $diemtong += $diem['diem'];
                                ?>
                                    <?php
                                    ?>
                                <?php
                                endwhile;
                                ?>
                                <?php
                                if ($a != 0) {
                                    $diemtb1 = $diemtong / $a;
                                    $diemtb = floor($diemtb1);
                                    echo '<div class="stars mb-2">';
                                    for ($i = 0; $i < $diemtb; $i++) {
                                        echo '<span class="fa fa-star checked me-2"></span>';
                                    }
                                    for ($i = 0; $i < (5 - $diemtb); $i++) {
                                        echo '<span class="fa fa-star me-2"></span>';
                                    }
                                    echo '</div>';
                                }
                                if ($a != 0) {
                                ?>

                                    <span class="review-no">Đã Có <?php echo $a ?> Bài Đánh Giá</span>
                                <?php
                                } else {
                                ?>
                                    <span class="review-no">Chưa Có Bài Đánh Giá Nào</span>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- // trang thai -->
                            <?php
                            if ($ac == 1) {
                                echo ' <small class="text-muted">Giá cũ:<strike class="trikechitiet">
                                <strong class="product-pricemauchitiet">' . (number_format($dongia)) . '
                                </strong></strike><s><span></span></s></small>';
                                echo '   <h4 class="price">Giá hiện tại: ' . (number_format($giamgia)) . '</h4> ';
                            }
                            if ($ac == 2) {
                                echo '   <h4 class="price">Giá hiện tại: ' . (number_format($dongia - $giamgia)) . '</h4> ';
                            }
                            ?>
                            <h4 class="price">Tồn Kho: <?php echo (number_format($soluongton)) ?></h4>
                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy
                                    tín</strong>!
                            </p>
                            <h5 class="sizes">sizes:
                                <?php
                                if ($ud == 2) {
                                ?>
                                    <input type="hidden" name="size" id="size" value="
                                    <?php
                                    if (isset($_POST['size'])) {
                                        echo $_POST['size'];
                                    }
                                    if (isset($_GET['size'])) {
                                        echo $_GET['size'];
                                    }
                                    ?>" />
                                <?php
                                } else {
                                ?>
                                    <input type="hidden" name="size" id="size" value="0" />
                                <?php
                                }
                                ?>

                                <?php
                                $size = $hh->getHangHoaSize($id);
                                while ($set = $size->fetch()) :
                                    $value1 = $set['idsize'];
                                ?>
                                    <button type="button" name="" <?php if ($set['soluongton'] <= 0) echo 'disabled'; ?> onclick="chonsize(<?php echo $set['idsize']; ?>);check();" class="btn nhannhan btn-default-xanh btn-circle
                                     <?php
                                        if (isset($_POST['size'])) {
                                            if ($ud == 2 && $value1 == $_POST['size']) {
                                                echo 'blue-button';
                                            }
                                        }
                                        if (isset($_GET['size'])) {
                                            if ($ud == 2 && $value1 == $_GET['size']) {
                                                echo 'blue-button';
                                            }
                                        }
                                        ?>" id="hong" value="<?php echo $set['idsize']; ?>">
                                        <?php echo $set['size']; ?>
                                    </button>
                                <?php
                                endwhile;
                                ?>
                            </h5>
                            <br>
                            <!-- mở test -->
                            <h5 class="colors">Màu:
                                <?php
                                if ($ud == 2) {
                                ?>
                                    <input type="hidden" name="mymausac" id="mausac" value="
                                    <?php
                                    if (isset($_POST['mymausac'])) {
                                        echo $_POST['mymausac'];
                                    }
                                    if (isset($_GET['mymausac'])) {
                                        echo $_GET['mymausac'];
                                    }


                                    ?>" />
                                <?php
                                } else {
                                ?>
                                    <input type="hidden" name="mymausac" id="mausac" value="0" />
                                <?php
                                }
                                ?>
                                <?php
                                $mau = $hh->getHangHoaMau($id);
                                $j = 0;
                                while ($set = $mau->fetch()) :
                                    $value2 = $set['idmau'];
                                    if ($set['soluongton'] > 0) {
                                        $j++;
                                    }
                                ?>
                                    <button type="button" name="" <?php if ($set['soluongton'] <= 0) echo 'disabled'; ?> onclick="chonmau('<?php echo $set['idmau']; ?>');check();" class="btn-active nhannhan btn btn-default-hong btn-circle  
                                    <?php if (isset($_POST['mymausac'])) {
                                        if ($ud == 2 && $value2 == $_POST['mymausac']) {
                                            echo 'red-button';
                                        }
                                    }
                                    if (isset($_GET['mymausac'])) {
                                        if ($ud == 2 && $value2 == $_GET['mymausac']) {
                                            echo 'red-button';
                                        }
                                    }
                                    ?>" id="xanh" value="<?php echo $set['idmau']; ?> ">
                                        <?php echo $set['mausac']; ?>
                                    </button>
                                <?php
                                endwhile;
                                ?>

                            </h5>

                            <div class="form-group">
                                <label for="soluong">Số lượng đặt mua:</label>
                                <input type="number" class="soluongmua" id="soluong" name="soluong" min="1" max="1000" value="1" size="10" required autocomplete="off" />
                            </div>
                            <div>
                                <?php
                                if (isset($_SESSION['makh'])) {
                                ?>
                                    <a id="mot">
                                        <button class="btn btn-circle muangay" type="button" value="button">Thêm Hàng</button>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="index.php?action=dangnhap">
                                        <button class="btn btn-circle muangay" type="button" value="button">Đăng Nhập Để Mua Hàng</button>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</main>
<main role="main">
    <div class="container1">
        <div class="container <?php echo isset($_GET['actt']) ? 'right-panel-active' : ''; ?>" id="container">

            <div class="form-container sign-up-container">
                <!-- <form class="formlogin mt-4" action="" method="post"> -->
                <div class="formlogin mt-4">

                    <h1>Đánh Giá Sản Phẩm</h1>
                    <?php
                    if ($a == 0) {
                    ?>
                        <h4 class="mt-12 text-d9d9d9">Hãy Trở Thành Người Đầu Tiên Đánh Giá</h4>
                    <?php
                    }
                    ?>
                    <div class="col-12">
                        <?php
                        if (isset($_SESSION['makh'])) {
                            $makh = $_SESSION['makh'];
                        } else {
                            $makh = 0;
                        }
                        $i = 1;
                        $bl = new binhluan();
                        $binhluan = $bl->selectBinhLuan($id);
                        while ($set = $binhluan->fetch()) :
                            $dathich = $bl->selectBinhLuanDaThich($makh, $set['idcomment']);
                            if (!empty($dathich)) {
                                $idcomment = $dathich['idcomment'];
                            } else {
                                $idcomment = 0;
                            }
                            $sp = $hh->getHangHoaId2($id); // array(mahh:24,tenhh: giày...)
                            $tenhh = $sp['tenhh'];
                            $ngay_thang_nam = date('Y-m-d', strtotime($set['thoigian']));
                            $gio_phut_giay = date('H:i:s', strtotime($set['thoigian']));

                            $i++;
                            if ($a != 0) {
                        ?>
                                <div class="col-12 comment">
                                    <div class="col-12 d-md-flex">
                                        <div class="col-2 align-content-center">
                                            <img class="image bl" src="Content/imagetourdien/<?php echo $set['avatar'] ?>" alt=""></a>
                                        </div>
                                        <div class="col-8 text-sm-start">
                                            <div class="d-md-flex text-end">
                                                <?php echo  '<b class="col-1 text-start">' . $set['username'] . '</b>' . '<h6 class="col-10 mt-1">' . $set['thoigian'] . '</h6>';
                                                ?>
                                                <!-- <?php
                                                        echo
                                                        '<h6 class="col-5 mt-1">' . $ngay_thang_nam . '</h6>
                                                <h6 class="col-5 mt-1">' . $gio_phut_giay . '</h6>';
                                                        ?> -->
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-6">

                                                    <?php
                                                    $diem = $set['diem'];
                                                    echo '<div class="stars">';
                                                    for ($i = 0; $i < $diem; $i++) {
                                                        echo '<span class="fa fa-star checked me-1"></span>';
                                                    }
                                                    for ($i = 0; $i < (5 - $diem); $i++) {
                                                        echo '<span class="fa fa-star"></span>';
                                                    }
                                                    echo '</div>';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="text-break">
                                                <?php
                                                echo $set['content'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-2 align-self-center">
                                            <form action="index.php?action=binhluan&act=binhluanthich" method="post">
                                                <input type="hidden" name="masp" value="<?php echo $id; ?>">
                                                <input type="hidden" name="idcomment" value="<?php echo $set['idcomment']; ?>">
                                                <input type="hidden" name="thich" value="<?php echo $set['thich'] + 1; ?> ">
                                                <?php
                                                ?>
                                                <?php
                                                if (!isset($_SESSION['makh'])) {
                                                ?>
                                                    <a href="index.php?action=dangnhap">
                                                        <button class="bordernone disabledorder col-12" type="button" value="button">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </button>
                                                    </a>
                                                    <?php
                                                } else {
                                                    if ($idcomment == $set['idcomment']) {
                                                    ?>
                                                        <a href="index.php?action=binhluan&act=binhluanbothich&id=<?php echo $id ?>&idcomment=<?php echo $set['idcomment'] ?>">
                                                            <button class="bordernone disabledorder col-4 " type="button" value="button">
                                                                <i class="fa-regular fa-heart tim1"></i>
                                                            </button>
                                                        </a>
                                                        <div class="col-12 p-0">
                                                            <b> <?php echo isset($_GET['actt']) && $_GET['actt'] == $set['idcomment'] ? 'Đã Thích' : ''; ?></b>
                                                        </div>
                                                    <?php } else { ?>
                                                        <button class="bordernone disabledorder col-4" type="submit" value="submit">
                                                            <i class="fa-regular fa-heart tim"></i>
                                                        </button>
                                                        <div class="col-12 p-0">
                                                            <b> <?php echo isset($_GET['actt']) && $_GET['actt'] == $set['idcomment'] ? 'Bỏ Thích' : ''; ?></b>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <style>
                                                    .tim1 {
                                                        color: red;
                                                        font-weight: 900;
                                                    }

                                                    .tim1:hover {
                                                        /* font-weight: 900 !important; */
                                                        animation: unredHeart 0.8s forwards, sizeHeart 1s forwards;
                                                    }

                                                    .tim:hover {
                                                        font-weight: 900 !important;
                                                        animation: redHeart 0.8s forwards, sizeHeart 1s forwards;
                                                    }

                                                    @keyframes sizeHeart {
                                                        0% {
                                                            opacity: 0;
                                                            transform: scale(0.9);
                                                        }

                                                        50% {
                                                            opacity: 1;
                                                            transform: scale(1.8);
                                                        }

                                                    }

                                                    @keyframes unredHeart {
                                                        0% {
                                                            color: red;

                                                        }

                                                        25% {
                                                            color: #002050;
                                                        }

                                                        50% {
                                                            color: #ff8000;
                                                        }

                                                        75% {
                                                            color: #ffc0c0;
                                                        }

                                                        100% {
                                                            color: black;

                                                        }
                                                    }

                                                    @keyframes redHeart {
                                                        0% {
                                                            color: black;
                                                        }

                                                        25% {
                                                            color: #002050;
                                                            /* Màu xanh đậm */
                                                        }

                                                        50% {
                                                            color: #ff8000;
                                                            /* Màu cam đậm */
                                                        }

                                                        75% {
                                                            color: #ffc0c0;
                                                            /* Màu hồng nhạt */
                                                        }

                                                        100% {
                                                            color: red;
                                                        }
                                                    }
                                                </style>
                                                <div class="col-12 pb-0">
                                                    <h6 class="mb-0  fs-09">
                                                        (<?php echo $set['thich']; ?>)
                                                    </h6>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                            echo '<hr class="mt-0 opacity-50">';
                        endwhile;
                        ?>
                    </div>
                    <?php
                    if (isset($_SESSION['makh'])) {
                        $hh = new hanghoa();
                        $id = $_GET['id'];
                        $makh = $_SESSION['makh'];
                        $check = $hh->GetHangHoaDaMua($id, $makh);
                        if ($check > 0 && isset($_GET['actt']) && $_GET['actt'] == 'danhgia') {
                            $ls = $hh->GetHangHoaDanhGia($id, $makh);
                            if ($ls >= 1) {
                                $dg = 1;
                            } else {
                                $dg = 0;
                            }
                        } else {
                            $dg = 2;
                        }
                    } else {
                        $dg = 1;
                    }
                    ?><?php
                        if ($dg == 0) {
                        ?>
                    <form action="index.php?action=binhluan&act=binhluan_action" method="post">
                        <div class="col-12 position-absolute disabledorder bottom-0 pb-3 text-center start-0">
                            <div class="col-md-12">
                                <input type="hidden" name="txtmahh" value="<?php echo $id; ?>" />
                                <input class="col-md-12 vmt text-sm-center cursortext" required autocomplete="off" type="text" name="comment" id="comment" placeholder="Đánh Giá Sản Phẩm">
                            </div>
                            <?php
                            if (isset($_GET['thieudiem'])) {
                                echo '<div class="col-md-12" role="alert"><p class=" alert-warning fs-09 mb-0 mt-3">Bạn Quên Chưa Đánh Giá Điểm</p></div>';
                            }
                            ?>
                            <div class="rating mb-0">
                                <input type="radio" id="star5" name="diem" value="5"><label for="star5"><i class="fas fa-star me-1"></i></label>
                                <input type="radio" id="star4" name="diem" value="4"><label for="star4"><i class="fas fa-star me-1"></i></label>
                                <input type="radio" id="star3" name="diem" value="3"><label for="star3"><i class="fas fa-star me-1"></i></label>
                                <input type="radio" id="star2" name="diem" value="2"><label for="star2"><i class="fas fa-star me-1"></i></label>
                                <input type="radio" id="star1" name="diem" value="1"><label for="star1"><i class="fas fa-star"></i></label>
                            </div>
                            <div class="col-md-12">
                                <?php
                                echo '<button type="submit" class="btn vmt col-7 bg-d9d9d9 bordernone mt-1" id="submitButton">Gửi Đánh Giá</button>';
                                ?>
                            </div>
                        </div>
                    </form>
                <?php } ?>
                </div>
            </div>
            <div class="form-container sign-in-container">
                <form class="formlogin mt-4" method="post" action="index.php?action=dangnhap&act=dangnhap_action">
                    <h1 class="mb-4">Chi Tiết Sản Phẩm</h1>
                    <div class="col-md-12 text-start">
                        <span class="col-md-12 d-md-flex">Loại:
                            <div class="col-12 text-center">
                                <b><?php echo $loai; ?></b>
                            </div>
                        </span>
                    </div>
                    <div class="col-md-12 text-start mt-1">
                        <span class="col-md-12 d-md-flex">Tổng Số Lượt Xem:
                            <div class="col-6 text-center ms-sm-04">

                                <b>
                                    <?php
                                    $e = 0;
                                    echo $e += $soluotxem; ?></b>
                            </div>
                        </span>
                    </div>
                    <div class="col-md-12 text-start mt-1">
                        <span class="col-md-12 d-md-flex">Số Lượng Đã Bán:
                            <div class="col-6 text-center ms-sm-3">
                                <b>
                                    <?php
                                    $hd = new hoadon();
                                    $sl = $hd->selectThongTinDaBan($id);
                                    echo $sl['soluongmua'] >0 ? $sl['soluongmua'] : 0;
                                    ?>
                                </b>

                            </div>

                        </span>
                    </div>

                    <div class="col-md-12 text-start mt-1">
                        <span class="col-md-12 d-md-flex">Số Lượng Tồn:
                            <div class="col-7 text-center ms-sm-12">
                                <b>
                                    <?php
                                    $sl = $hd->selectThongTinSoLuongTon($id);
                                    echo $soluongton = $sl['soluongton'];
                                    ?>
                                </b>
                            </div>

                        </span>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h1 class="me-5">mô tả</h1>
                    </div>
                    <div class="col-md-12">
                        <span class="float-start text-start mota"> <?php echo nl2br($mota); ?></span>
                    </div>
                    <style>
.mota p img {
    width: 60%;
    border-radius: 40px;
}
                    </style>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Đánh Giá Sản Phẩm</h1>
                        <p class="text-d9d9d9">Nơi Để Đánh Giá Sản Phẩm</p>
                        <button class="ghost" id="signIn">Xem Thông Tin</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Chi Tiết Sản Phẩm</h1>
                        <p class="text-d9d9d9">Nơi Để Thông Tin Sản Phẩm</p>
                        <button class="ghost" id="signUp">Xem Bình Luận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="./Content/js/style.js"></script>
<script type="text/javascript">
    const checkbutton = document.getElementById("mot");
    checkbutton.onclick = function() {
        if (document.getElementById("size").value === "0") {
            alert("Hãy Chọn Size");
            return false;
        }
        if (document.getElementById("mausac").value === "0") {
            alert("Hãy Chọn Màu");
            return false;
        } else {
            submitFormgiohang();
        }
    };

    function check() {
        var sizeValue = document.getElementById("size").value;
        var colorValue = document.getElementById("mausac").value;

        if (sizeValue !== "0" && colorValue !== "0") {
            submitForm(); // Gọi hàm submitForm() nếu cả hai nút đã được chọn
        }
    }

    function submitForm() {
        var form = document.getElementById('cart-form');
        form.submit();
    }

    function submitFormgiohang() {
        var form = document.getElementById('cart-form');
        form.action = 'index.php?action=giohang&act=giohang_action';
        form.submit();
    }

    function chonsize(a) {
        document.getElementById("size").value = a;
    }

    function chonmau(b) {
        document.getElementById("mausac").value = b;
    }
    var buttons = document.querySelectorAll('.btn-default-hong');
    var buttonss = document.querySelectorAll('.btn-default-xanh');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            toggleRedColor(this, buttons);
        });
    });

    buttonss.forEach(function(button) {
        button.addEventListener('click', function() {
            toggleRedColor(this, buttonss);
        });
    });

    function toggleRedColor(clickedButton, buttonGroup) {
        buttonGroup.forEach(function(button) {
            button.classList.remove('red-button');
            button.classList.remove('blue-button');
        });

        clickedButton.classList.add(clickedButton.classList.contains('btn-default-hong') ? 'red-button' : 'blue-button');
    }


    function changeImage(imageSrc) {
        setTimeout(function() {
            document.getElementById('main-image').src = imageSrc;
        }, 10); // Trễ 1 giây (1000 mili giây)
    }
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popperjs/popper.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom script - Các file js do mình tự viết -->
<script src="../assets/js/app.js"></script>