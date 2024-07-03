<?php
if (isset($_GET['id']) && isset($_GET['idmau'])) {
  $mahh = $_GET['id'];
  $idmau = $_GET['idmau'];
  $idsize = $_GET['idsize'];
  // truy vấn thông tin của id
  $hh = new hanghoa();
  $kq = $hh->getHangHoaChiTietID($mahh, $idmau, $idsize);

  if ($kq !== false) {
    $tenhh = $kq['tenhh'];
    $gia = $kq['dongia'];
    $giamgia = $kq['giamgia'];
    $maloai = $kq['maloai'];
    $soluongton = $kq['soluongton'];
    $hinh = $kq['hinh'];
    $mausac = $kq['mausac'];
    $size = $kq['size'];
  } else {
    // Xử lý khi không có dữ liệu được trả về
    echo "Không tìm thấy hàng hóa với mã $mahh và màu sắc $mausac";
  }

  // $dacbiet=$kq['dacbiet'];
  // $slx=$kq['soluotxem'];
  // $ngaylap=$kq['ngaylap'];
  $mota = $kq['mota'];
}
?>
<div class="col-12 mt-5">
  <?php
  $ac = 1;
  if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'insert_hanghoachitiet') {
      echo '<div class="d-flex">
                <div class="col-2">
                    <a href="index.php?action=hanghoa&act=chitiet&id=' . $_GET['id'] . '">
                        <i class="fa-solid fa-arrow-left fa-xl"></i>
                    </a>
                </div>
                <div class="col-8">
                    <h1 class="text-center">Thêm Chi Tiết Hàng Hóa</h1>
                </div>
            </div>';
    } else {
      $ac = 2;
      echo '<div class="d-flex">
      <div class="col-2">
          <a href="index.php?action=hanghoa&act=chitiet&id=' . $_GET['id'] . '">
              <i class="fa-solid fa-arrow-left fa-xl"></i>
          </a>
      </div>
      <div class="col-8">
          <h1 class="text-center">Chỉnh Sửa Chi Tiết Hàng Hóa </h1>
      </div>
  </div>';
    }
  }
  ?>
  <div class="d-flex col-md-12  mt-5 placecontentcenter mb-5">
    <?php
    if ($ac == 1) {
      echo '<form action="index.php?action=hanghoa&act=insertchitiet_action" method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
    } else {
      echo '<form action="index.php?action=hanghoa&act=updatechitiet_action" method="post" enctype="multipart/form-data" class="col-md-7 background p-5">';
    }
    ?>

    <table class="table table-hover bordernone">

      <?php
      if ($ac == 2) {
      ?>
        <tr>
          <td>Mã Hàng</td>
          <td> <input type="text" class="form-control color-cell" required name="mahh" value="<?php if (isset($mahh)) echo $mahh; ?>" readonly /></td>
        </tr>
      <?php } else { ?>
        <tr>
          <td>Mã Hàng</td>
          <td> <input type="text" class="form-control color-cell" required name="mahh" value="<?php echo $_GET['id'] ?>" readonly /></td>
        </tr>
      <?php } ?>
      <td>Giá </td>
      <?php
      ?>
      <td><input type="number" class="form-control color-cell" min="1" required autocomplete="off" value="<?php if (isset($gia)) echo $gia; ?>"name="dongia">
      </td>
      </tr>
      <tr>
        <td>Giá đã giảm</td>
        <td><input type="number" class="form-control color-cell" min="0" required value="<?php if (isset($giamgia)) echo $giamgia; ?>" name="giamgia">
        </td>
      </tr>
      <?php if ($ac == 1) { ?>
        <tr>
          <td>
            <h4 class="text-end">Màu</h4>
          </td>
          <td>
            <?php
            $selectedMau = -1;
            if (isset($idmau) && $idmau != -1) {
              $selectedMau = $idmau;
            }
            $mau = new Mau();
            $result = $mau->getMau();
            $count = 0;
            while ($set = $result->fetch()) :
              if ($count % 2 == 0) {
                echo "<tr>";
              }
            ?>
          <td class="color-cell "><input type="checkbox" name="mau" value="<?php echo $set['Idmau'] ?>" onchange="disableOtherColors(this)" <?php if ($selectedMau == $set['Idmau']) echo 'checked'; ?>> <?php echo $set['mausac']; ?></td>
        <?php
              $count++;
              if ($count % 2 == 0) {
                echo "</tr>";
              }
            endwhile;
            if ($count % 2 != 0) {
              echo "</tr>";
            }
        ?>
        </td>
        </tr>
        <tr>
          <td>
            <h4 class="text-end">Size</h4>
          </td>
          <td>
            <?php
            $selectSize = -1;
            if (isset($idsize) && $idsize != -1) {
              $selectSize = $idsize; //6
            }
            $size = new size();
            $result = $size->getSize();
            while ($set = $result->fetch()) :
            ?>
        <tr>
          <td><input type="checkbox" name="size" value="<?php echo $set['Idsize'] ?>" onchange="enableNumberInput(this);disableOtherSizes(this)" <?php if ($selectSize == $set['Idsize']) echo 'checked'; ?>> <?php echo $set['size']; ?></input></td>
          <td><input type="number" name="soluong" min="1" required value="<?php echo $soluongton; ?>" class="form-control" placeholder="Số lượng" disabled></td>

        <?php
            endwhile;
        ?>
        </tr>
        <tr>
          <td>Chọn Hình </td>
          <td><input type="file" class="form-control color-cell align-content-center" required value="<?php if (isset($hinh)) echo $hinh; ?>" name="image"></td>
        </tr>

        </td>
        </tr><?php } else { ?>
        <tr>
          <td>Màu </td>
          <td class="color-cell"><input class="bordernone backgroundwhite h40px text-center w-100 rounded-20px" type="text" readonly value="<?php echo $mausac ?>"> </td>
          <td class="color-cell"><input class="bordernone backgroundwhite h40px text-center w-100 rounded-20px" type="hidden" readonly name="mau" value="<?php echo $idmau ?>"> </td>

        </tr>
        <tr>
          <td>Size</td>
          <td class="color-cell"><input class="bordernone backgroundwhite h40px text-center w-100 rounded-20px" type="text" readonly value="<?php echo $size ?>"> </td>
          <td class="color-cell"><input class="bordernone backgroundwhite h40px text-center w-100 rounded-20px" type="hidden" readonly name="size" value="<?php echo $idsize ?>"> </td>

        </tr>
        <tr>
          <td>Số Lượng</td>
          <td><input type="number" name="soluong" min="1" required value="<?php echo $soluongton; ?>" class="form-control" placeholder="Số lượng"></td>
        </tr>
        <!-- kết thúc số lượng -->
        <tr>
          <td>Hình Hiện Tại</td>
          <td>
            <img src=Content/imagetourdien/<?php echo $hinh; ?> class="img-fluid product-thumbnail mw-50">
          <td><input type="hidden" class="form-control color-cell align-content-center" readonly value="<?php if (isset($hinh)) echo $hinh; ?>" name="image"></td>
          </td>
        </tr>
        <tr>
          <td>Chọn Hình Mới</td>
          <td><input type="file" class="form-control color-cell align-content-center" value="" name="imagenew"></td>
        </tr>
      <?php } ?>


    </table>
    <div class="col-12  text-center">

      <input class="btn btn-primary col-8 submit" type="submit" value="Xong">
    </div>
    </form>
  </div>
</div>
<script>
  // window.addEventListener('DOMContentLoaded', (event) => {
  //   // Check if 'idsize' parameter is present in the URL
  //   const urlParams = new URLSearchParams(window.location.search);
  //   const idsizeParam = urlParams.get('idsize');

  //   // If 'idsize' is present, enable the input fields
  //   if (idsizeParam) {
  //     enableNumberInputs();
  //   }
  // });

  function enableNumberInputs() {
    // Select all checkboxes for sizes
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="dongia"]');

    // For each checkbox, enable its corresponding input field
    checkboxes.forEach(checkbox => {
      const input = checkbox.parentNode.nextElementSibling.querySelector('input[type="number"]');
      input.disabled = !checkbox.checked; // Enable/disable based on checkbox state
    });
  }

  function enableNumberInput(checkbox) {
    const input = checkbox.parentNode.nextElementSibling.querySelector('input[type="number"]');
    input.disabled = !checkbox.checked; // Enable/disable based on checkbox state
  }

  function disableOtherColors(checkbox) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="mau"]');
    checkboxes.forEach(box => {
      if (box !== checkbox && checkbox.checked) {
        box.disabled = true;
      } else {
        box.disabled = false;
      }
    });
  }

  function disableOtherSizes(checkbox) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="size"]');
    checkboxes.forEach(box => {
      if (box !== checkbox && checkbox.checked) {
        box.disabled = true;
      } else {
        box.disabled = false;
      }
    });
  }
</script>
<style>
  /* CSS để ẩn các trường nhập khi chúng bị vô hiệu hóa */
  input[disabled] {
    display: none;
  }
</style>