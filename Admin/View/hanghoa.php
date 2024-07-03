<div class="row pb-5">
  <div class="col-md-8 col-md-offset-4 mt-5">
    <?php
    $hh = new hanghoa();
    $count = $hh->getHangHoa()->rowCount();
    $limit = 8;
    $trang = new page();
    $page = $trang->findPage($count, $limit);
    $start = $trang->findStart($limit);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $ac = 1;
    if (isset($_GET['action'])) {
      if (isset($_GET['act']) && $_GET['act'] == 'timkiem') {
        $ac = 3;
        echo '<h3><b>DANH SÁCH HÀNG CÓ GIÁ TRỊ GIỐNG VỚI: ' . $_POST['txtsearch'] . '</b></h3>';
      }
      if (isset($_GET['act']) && $_GET['act'] == 'chitiet') {
        $ac = 2;
        echo '<h3><b>Chi Tiết Hàng Hóa Với Mã Số ' . $_GET['id'] . '</b></h3>';
      }
      if (!isset($_GET['act'])) {
        $ac = 1;
        echo '<h3><b>DANH SÁCH HÀNG HÓA</b></h3>';
      }
    }
    if (isset($_POST['txtsearch'])) {
      $tk = $_POST['txtsearch'];
    } else {
      $tk = '';
    }

    ?>

  </div>
  <div class="row col-12">
    <div class="col-9">
      <?php if ($ac == 2) { ?>
        <a class="btn col-4 themsanpham" href="index.php?action=hanghoa&act=insert_hanghoachitiet&id=<?php echo $_GET['id']; ?>">
          <h4>Thêm Chi Tiết Hàng Hóa</h4>
        </a>
      <?php } ?>
      <?php if ($ac == 1) { ?>
        <a class="btn col-4 themsanpham" href="index.php?action=hanghoa&act=insert_hanghoa">
          <h4>Thêm sản phẩm</h4>
        </a>
      <?php } ?>
    </div>
    <div class="col-3 align-self-center text-end p-0">
      <?php if ($ac == 1 || $ac == 3) { ?>
        <form action="index.php?action=hanghoa&act=timkiem" method="post" class="mb-3">
          <a class="icon-container">
            <button type="submit" id="btsearch" class="bordernone bg-white"><i class="fa fa-fw fa-search text-dark mr-2 icon material-icons"></i></button>
            <input type="text" class="input-field h40px rounded-20px text-center" value="<?php echo $tk ?>" required name="txtsearch" placeholder="Tìm Kiếm..." autocomplete="off">
          </a>
        </form>
      <?php } ?>
    </div>
  </div>
  <table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <?php if ($ac == 2) {
        ?>
          <th>Hình</th>
          <th>Tên</th>
          <th>Tên loại</th>
          <th>Màu</th>
          <th>Size</th>
          <th>Đơn Giá</th>
          <th>Giảm Giá</th>
          <th>Số Lượng Tồn</th>

        <?php
        } else { ?>
          <th>Tên Hàng Hóa</th>
          <th>Tên loại</th>
          <th>Màu</th>
          <th>Size</th>
          <th>Mô tả</th>
        <?php } ?>
        <th class="mw-155px">Trạng Thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php


      if ($ac == 1) {
        $result = $hh->getHangHoaAllPage($start, $limit);
      }
      if ($ac == 3) {
        if (isset($_POST['txtsearch'])) {
          if ($_POST['txtsearch'] == "") {
            echo '<script> alert("Chưa Nhập Giá Trị Tìm Kiếm");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
          }
          if ($_POST['txtsearch'] !== "") {
            $result = $hh->getTimKiem($tk);
            $ketqua = $hh->getTimKiem($tk)->rowCount();
            if ($ketqua <= 0) {
              echo '<script> alert("Xin Lỗi Chúng Tôi Chưa Có Mặt Hàng Này");</script>';
              echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            }
          }
        }
      }
      if ($ac == 2) {
        $result = $hh->getHangHoaChiTiet($_GET['id']);
      }
      while ($set = $result->fetch()) :
      ?>
        <tr>
          <td><?php echo $set['mahh'] ?> </td>
          <?php
          if ($ac == 2) {
            echo '<td class="text-center wh-140px"> <img src=Content/imagetourdien/' . $set['hinh'] . ' class="rounded-20px mw-100 h125px w125px""> </td>';
          }
          ?>
          <td><?php echo $set['tenhh'] ?> </td>
          <td><?php echo $set['tenloai'] ?> </td>
          <td>

            <?php
            if ($ac == 2) {
              echo $set['mausac'];
            } else {
              $mau = $hh->getHangHoaMau($set['mahh']);
              $count = $mau->rowCount();
              $i = 0;
              if ($count <= 1) {
                echo '<p>Trống</p>';
              }
              while ($mausac = $mau->fetch()) :
            ?>
                <?php echo $mausac['mausac'];
                $i++;
                if ($i < $count && $count > 1) echo "/";
                ?>
            <?php
              endwhile;
            }
            ?>
          </td>
          <td><?php
              if ($ac == 2) {
                echo $set['size'];
              } else {
                $sizegiay = $hh->getHangHoaSize($set['mahh']);
                $count = $sizegiay->rowCount();
                $i = 0;
                if ($count <= 1) {
                  echo '<p>Trống</p>';
                }
                while ($size = $sizegiay->fetch()) :
              ?>
                <?php echo $size['size'];
                  $i++;
                  if ($i < $count && $count > 1) echo "/";
                ?>
            <?php
                endwhile;
              } ?> </td>
          <?php
          if ($ac == 2) {
          ?>
            <td><?php echo number_format($set['dongia']) ?> </td>
            <td><?php echo $set['giamgia'] > 0 ? number_format($set['giamgia']) : '/'  ?></td>
            <td><?php echo $set['soluongton'] ?> </td>
          <?php
          } else {
          ?>
            <td class="mw750 h-200px mota"><?php echo (strlen($set['mota']) > 50 ? substr($set['mota'], 0, 50) . '...' : $set['mota']) ?> </td>
          <?php
          }
          ?>

          <?php if ($ac == 2) { ?>
            <?php if ($set['hienthi'] == 0) { ?>
              <td class="text-center"><a class="btn bordersolid col-10 themsanpham" href="index.php?action=hanghoa&act=anhanghoa&id=<?php echo $set['mahh']; ?>&idmau=<?php echo $set['idmau']; ?>&idsize=<?php echo $set['idsize']; ?>">Đang Hiển Thị</a></td>
            <?php  } ?>
            <?php if ($set['hienthi'] == 1) { ?>
              <td class="text-center"><a class="btn bordersolid col-10 themsanpham" href="index.php?action=hanghoa&act=hienhanghoa&id=<?php echo $set['mahh']; ?>&idmau=<?php echo $set['idmau']; ?>&idsize=<?php echo $set['idsize']; ?>">Đang Ẩn</a></td>

            <?php  } ?>
            <td class="text-center b">
              <a class="btn bordersolid col-10 themsanpham mb-1" href="index.php?action=hanghoa&act=update_hanghoachitiet&id=<?php echo $set['mahh']; ?>&idmau=<?php echo $set['idmau']; ?>&idsize=<?php echo $set['idsize']; ?>">Chỉnh Sửa</a>
              <a class="btn bordersolid col-10 themsanpham link" onclick="showConfirmation(this)" href="index.php?action=hanghoa&act=delete_hanghoachitiet&id=<?php echo $set['mahh'] ?>&idmau=<?php echo $set['idmau']; ?>&idsize=<?php echo $set['idsize']; ?>">Xóa</a>
            </td>
          <?php } else {
            $getslt = $hh->GetHienThi($set['mahh']);
            $tonghienthi = 0;
            $tonghang = 0;
            while ($slt = $getslt->fetch()) {

              if ($slt['idhanghoa'] !=  0) {
                $tonghang++;
              }
              if ($slt['hienthi'] ==  0) {
                $tonghienthi++; // Tăng biến đếm
              }
            }
          ?>

            <?php if ($tonghienthi > 0) { ?>
              <td class="text-center"><a class="btn bordersolid col-10 themsanpham" href="index.php?action=hanghoa&act=anhanghoaall&id=<?php echo $set['mahh']; ?>&page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>">Đang Hiển Thị</a>
                <p>Đang Hiển Thị: <?php echo $tonghienthi ?></p>
                <p>Đang Ẩn: <?php echo $tonghang - $tonghienthi ?></p>
              </td>
            <?php  } ?>
            <?php if ($tonghienthi == 0) { ?>
              <td class="text-center"><a class="btn bordersolid col-10 themsanpham" href="index.php?action=hanghoa&act=hienhanghoaall&id=<?php echo $set['mahh']; ?>&page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>">Đang Ẩn</a>
                <p>Đang Hiển Thị: <?php echo $tonghienthi ?></p>
                <p>Đang Ẩn: <?php echo $tonghang - $tonghienthi ?></p>
              </td>
            <?php  } ?>
            <td class="text-center b">
              <a class="btn bordersolid col-10 themsanpham mb-2" href="index.php?action=hanghoa&act=chitiet&id=<?php echo $set['mahh']; ?>">Chi Tiết</a>
              <a class="btn bordersolid col-10 themsanpham mb-2" href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh']; ?>">Sửa</a>
              <a class="btn bordersolid col-10 themsanpham link" onclick="showConfirmation(this)" href="index.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set['mahh'] ?>&page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>">Xóa
              </a>
            </td>
          <?php } ?>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<div class="col-md-12 text-center">

  <ul class="pagination justify-content-center">
    <?php
    // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    if ($ac == 1) {
      if ($current_page > 1 && $page > 1) {
        echo '<li class="page-item"><a class="page-link" href="index.php?action=hanghoa&page=' . ($current_page - 1) . '" aria-label="Trang trước">
                  <span aria-hidden="true">&laquo;</span></a></li>';
      }
      for ($i = 1; $i <= $page; $i++) {

        echo '<li class="page-item ' . ($current_page == $i ? 'active' : '') . '"><a class="page-link" href="index.php?action=hanghoa&page=' . $i . '">' . $i . '</a></li>';
      }
      if ($current_page < $page && $page > 1) {
        echo '<li class="page-item"><a class="page-link" href="index.php?action=hanghoa&page=' . ($current_page + 1) . '" aria-label="Trang sau"><span aria-hidden="true">&raquo</span></a></li>';
      }
    }
    ?>
  </ul>
</div>