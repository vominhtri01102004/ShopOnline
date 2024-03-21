<!-- quảng cáo -->
<?php
// include "quangcao.php";
?>
<!-- end quảng cáo -->
<?php
// phân trang
$hh = new hanghoa();
//b1 :xác định trang mình đang phân trang có bao nhieu sản phẩm
//cách 1: dùng count
// $count=$hh->getCountHangHoaAll();14
// cách 2:
$count = $hh->getHangHoaAll()->rowCount(); //14
//b2 : giới hạn 1 trang bao nhiêu sản phẩm, tự cho tùy bào thiết kế
$limit = 8;
//b3: tính ra số trang dựa trên tổng sản phẩm và limit
$trang = new page();
//lấy ra có bao nhiêu trang
$page = $trang->findPage($count, $limit); //2
//lấy ra start
$start = $trang->findStart($limit); //8
?>

<!-- end số lượt xem san phẩm -->
<!-- sản phẩm-->
<?php
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'sanphamkhuyenmai') {
        $ac = 2;
    }
    elseif(isset($_GET['act']) && $_GET['act'] == 'timkiem'){
        $ac=3;
    }
    elseif(isset($_GET['act']) && $_GET['act'] == 'sanpham')
    {
        $ac = 1;
    }
}
?>
<section id="examples" class="text-center">
    <div class="product-section">
        <div class="container">
            <?php
            if ($ac == 1) {
                echo '<H2 class="text-center">Tất cả Sản Phẩm</H2>';
            }
            if ($ac == 2) {
                echo '    <H2 class="text-center">Sản Phẩm Khuyến Mãi</H2>';
            }
            if ($ac == 3) {
                echo '    <H2 class="text-center">Sản Phẩm Tìm Kiếm</H2>';
            }
            ?>
            <div class="row">
                <?php
                $hh = new hanghoa();
                if ($ac == 1) {
                    // $result=$hh->getHangHoaAll();// lấy được 14 sản phẩm *****
                    $result = $hh->getHangHoaAllPage($start, $limit); // phân trang
                }
                if ($ac == 2) {
                    $result = $hh->getHangHoaAllSale(); // lấy được 8 sản phẩm
                }
                if ($ac == 3) {
                    if(isset($_POST['txtsearch']))
                    {
                        if($_POST['txtsearch'] == "")
                        {
                            echo '<script> alert("Chưa Nhập Giá Trị Tìm Kiếm");</script>';
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                        }
                        if($_POST['txtsearch'] !== "")
                        {
                            $tk=$_POST['txtsearch'];
                        // đem giá trị này đi tìm kiếm
                        $result=$hh->getTimKiem($tk,$start,$limit);
                        }
                    }
                }
                while ($set = $result->fetch()) :
                ?>
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 sanphamhome">
                        <a class="product-item" href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh'] ?>">
                            <img src=Content/imagetourdien/<?php echo $set['hinh']; ?> class="img-fluid product-thumbnail">
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
                            if ($set['soluongton'] > 0) {
                                echo '<span class="viewslt">Tồn Kho ' . ($set['soluongton']) . '</span>';
                            }
                            if ($set['soluongton'] <= 0) {
                                echo '<span class="viewslt">Hết Hàng</span>';
                            }
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
<!--Section: Examples-->



<!-- end sản phẩm mới nhất -->


<div class="col-md-6 col-md-offset-3">
    <!-- Phân trang -->
    <ul class="pagination">
        <?php
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        // Hiển thị nút "Trang trước"
        if ($current_page > 1 && $page > 1) {
            if($ac==1){
                echo '<li><a href="index.php?action=sanpham&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
            }
            if($ac==2){
                echo '<li><a href="index.php?action=sanphamkhuyenmai&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
            }
            if($ac==3){
                echo '<li><a href="index.php?action=timkiem&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                <span aria-hidden="true">&laquo;</span></a></li>';
            }
        }
        // Hiển thị số trang
        for ($i = 1; $i <= $page; $i++) {
           
            if($ac==1){
                echo '<li class="' . ($current_page == $i ? 'active' : '') . '"><a href="index.php?action=sanpham&page=' . $i . '">' . $i . '</a></li>';
            }
            if($ac==2){
                 echo '<li class="' . ($current_page == $i ? 'active' : '') . '"><a href="index.php?action=sanphamkhuyenmai&page=' . $i . '">' . $i . '</a></li>';
            }
            if($ac==3){
                 echo '<li class="' . ($current_page == $i ? 'active' : '') . '"><a href="index.php?action=timkiem&page=' . $i . '">' . $i . '</a></li>';
            }
            
        }
        // Hiển thị nút "Trang sau"
        if ($current_page < $page && $page > 1) {
            
            if($ac==1){
                echo '<li><a href="index.php?action=sanpham&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }
            if($ac==2){
                echo '<li><a href="index.php?action=sanphamkhuyenmai&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }
            if($ac==3){
                echo '<li><a href="index.php?action=timkiem&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo;</span></a></li>';
            }
        }
        ?>
    </ul>
</div>
