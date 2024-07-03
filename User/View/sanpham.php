<?php
// phần trang
$hh = new hanghoa();
$trang = new page();

$limit = 8;

// Lấy số trang và start cho danh sách hàng hóa chính
$count_all = $hh->getCountHangHoaAll();
$page_all = $trang->findPage($count_all, $limit);
$start_all = $trang->findStart($limit);

// Lấy số trang và start cho danh sách hàng hóa khuyến mãi
$count_sale = $hh->getCountHangHoaKhuyenMai();
$page_sale = $trang->findPage($count_sale, $limit);
$start_sale = $trang->findStart($limit);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'sanphamkhuyenmai') {
        $ac = 2;
    } elseif (isset($_GET['act']) && $_GET['act'] == 'timkiem') {
        $ac = 3;
    } elseif (isset($_GET['act']) && $_GET['act'] == 'sanpham') {
        $ac = 1;
    } elseif (isset($_GET['act']) && $_GET['act'] == 'loai') {
        $ac = 4;
    }
}


?>
<section id="examples" class="text-center mt-3">
    <div class="product-section">
        <div class="container">
            <?php
            if ($ac == 1) {
                echo '<H2 class="text-center">Tất cả Sản Phẩm</H2>';
            }
            if ($ac == 2) {
                echo '<H2 class="text-center">Sản Phẩm Khuyến Mãi</H2>';
            }
            if ($ac == 3) {
                echo '<H2 class="text-center">Sản Phẩm Có Tên Giống Với: ' . $_POST['txtsearch'] . '</H2>';
            }
            if ($ac == 4) {
                echo '<H2 class="text-center">' . $_GET['tenloai']  . ' </H2>';
            }
            ?>
            <div class="col-12 d-flex">
                <div class="col-6">
                    <div class="nav-item dropdown text-start col-3">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loại Sản phẩm</a>
                        <div class="dropdown-menu rounded-20px ps-1 pe-1" aria-labelledby="dropdownId">
                            <?php
                            $loai = new hanghoa();
                            $result = $loai->getLoai();
                            while ($set = $result->fetch()) :
                            ?>
                                <h5><a class="dropdown-item" href="index.php?action=sanpham&act=loai&maloai=<?php echo $set['maloai'] ?>&tenloai=<?php echo $set['tenloai'] ?>"><?php echo $set['tenloai'] ?></a></h5>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php

                if ($ac == 1) {
                    // $result=$hh->getHangHoaAll();// lấy được 14 sản phẩm *****
                    $result = $hh->getHangHoaAll($start_all, $limit); // phân trang
                }
                if ($ac == 2) {
                    $result = $hh->getHangHoaAllSale($start_sale, $limit); // lấy được 8 sản phẩm
                }
                if ($ac == 3) {
                    $tk = $_POST['txtsearch'];

                    $result = $hh->getTimKiem($tk);
                }

                $hh = new hanghoa();
                if ($ac == 1) {
                    // $result=$hh->getHangHoaAll();// lấy được 14 sản phẩm *****
                    $result = $hh->getHangHoaAll($start_all, $limit); // phân trang
                }
                if ($ac == 2) {
                    $result = $hh->getHangHoaAllSale($start_sale, $limit); // lấy được 8 sản phẩm
                }
                if ($ac == 3) {
                    if (isset($_POST['txtsearch'])) {
                        if ($_POST['txtsearch'] == "") {
                            echo '<script> alert("Chưa Nhập Giá Trị Tìm Kiếm");</script>';
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                        }
                        if ($_POST['txtsearch'] !== "") {
                            // đem giá trị này đi tìm kiếm
                            $result = $hh->getTimKiem($tk);
                            $ketqua = $hh->getTimKiem($tk)->rowCount();
                            if ($ketqua <= 0) {
                                echo '<script> alert("Xin Lỗi Chúng Tôi Chưa Có Mặt Hàng Này");</script>';
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
                            }
                        }
                    }
                }
                if ($ac == 4) {
                    $result = $hh->getHangHoaLoai($_GET['maloai']);
                    $ketqua = $hh->getHangHoaLoai($_GET['maloai'])->rowCount();
                    if ($ketqua <= 0) {
                        echo '<script> alert("Sản Phẩm Của Loại Này Đã Hết");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&actt=out"/>';
                    }
                }
                while ($set = $result->fetch()) :
                ?>
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 sanphamhome">
                        <a class="product-item" href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                            <img style="height: 294px; width: 294px" src=Content/imagetourdien/<?php echo $set['hinh']; ?> class="img-fluid product-thumbnail">
                            <ul class="ulhome">
                                <?php
                                $laymau = $hh->getHangHoaMau($set['mahh']);
                                $count = $laymau->rowCount();
                                $i = 0;
                                while ($mau = $laymau->fetch()) : ?>
                                    <?php
                                    if ($mau['soluongton'] <= 0) {
                                        echo '<li class="lihomeslt">';
                                        echo '<strike class="strikehome strikeslt"><strong class="stronglislt fw-normal text-rbg2">' . $mau['mausac'] . '</strong></strike>';
                                    }
                                    if ($mau['soluongton'] > 0) {
                                        echo '<li class="lihome">';
                                        if ($i < 3) {
                                            echo $mau['mausac'];
                                        } else {
                                            echo '...';
                                        }
                                    }
                                    echo '</li>';
                                    $i++;
                                    if ($i < $count && $count > 1) echo " -";
                                    ?>
                                <?php endwhile; ?>
                            </ul>
                            <h3 class="product-title">
                                <?php echo $set['tenhh']; ?>
                            </h3>
                            <?php
                            if ($set['giamgia'] != 0) {
                                echo  '   <strong class="product-price">' . (number_format($set['giamgia'])) . '</strong> ';
                                echo ' <strike class="strikehome"><strong class="product-pricemau">' . (number_format($set['dongia'])) . '</strong></strike>';
                            }
                            if ($set['giamgia'] == 0) {
                                echo  '   <strong class="product-price">' . (number_format($set['dongia'])) . '</strong> ';
                            }
                            ?>
                            <span class="icon-cross">
                                <img src="Content/imagetourdien/cross.svg" class="img-fluid">
                            </span><br>
                            <span class="viewslx">Số lượt
                                xem
                                <?php echo $set['soluotxem']; ?>
                            </span>
                            <?php
                            $getslt = $hh->getSoLuongTon($set['mahh']);
                            $tongsoluongton = 0;
                            while ($slt = $getslt->fetch()) :
                                if ($slt['soluongton'] > 0) {
                                    $tongsoluongton++; // Tăng biến đếm
                                }
                            ?>
                            <?php endwhile; ?>
                            <?php
                            if ($tongsoluongton > 0) {
                                echo '<span class="viewslt">Còn Hàng</span>';
                            } else {
                                echo '<span class="viewslt">Hết Hàng</span>';
                            }
                            // if ($set['soluongton'] > 0) {
                            //     echo '<span class="viewslt">Tồn Kho ' . ($set['soluongton']) . '</span>';
                            // }
                            // if ($set['soluongton'] <= 0) {
                            //     echo '<span class="viewslt">Hết Hàng</span>';
                            // }
                            ?>
                        </a>
                    </div>
                    <!-- End Column 4 -->
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>

<div class="col-md-12 text-center">
    <!-- Phân trang -->
    <ul class="pagination justify-content-center">
        <?php
        // Hiển thị nút "Trang trước"
        if ($current_page > 1 && $page_all > 1 && $ac == 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?action=sanpham&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
        }
        if ($current_page > 1 && $page_sale > 1 && $ac == 2) {
            echo '<li class="page-item"><a class="page-link" href="index.php?action=sanpham&act=sanphamkhuyenmai&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
        }

        // Hiển thị số trang
        for ($i = 1; $i <= ($ac == 1 ? $page_all : $page_sale); $i++) {
            if ($ac == 1) {
                echo '<li class="page-item ' . ($current_page == $i ? 'active' : '') . '"><a class="page-link" href="index.php?action=sanpham&page=' . $i . '">' . $i . '</a></li>';
            }
            if ($ac == 2) {
                echo '<li class="page-item ' . ($current_page == $i ? 'active' : '') . '"><a class="page-link" href="index.php?action=sanpham&act=sanphamkhuyenmai&page=' . $i . '">' . $i . '</a></li>';
            }
        }

        // Hiển thị nút "Trang sau"
        if (($current_page < $page_all && $page_all > 1 && $ac == 1) || ($current_page < $page_sale && $page_sale > 1 && $ac == 2)) {
            if ($ac == 1) {
                echo '<li class="page-item"><a class="page-link" href="index.php?action=sanpham&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo</span></a></li>';
            }
            if ($ac == 2) {
                echo '<li class="page-item"><a class="page-link" href="index.php?action=sanpham&act=sanphamkhuyenmai&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }
        }
        ?>
    </ul>
</div>