<div class="untree_co-section before-footer-section">
  <?php $gh = new giohang();
  if (isset($_SESSION['makh']) && $giohang > 0) {
    $giohang = $gh->getGioHang($_SESSION['makh'])->rowcount();
  ?>
    <h3 class="text-center mb-5">Giỏ Hàng Của Bạn</h3>
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post" action="index.php?action=giohang&act=update_cart" id="cart-form">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th class="product-thumbnail">Hình</th>
                  <th class="product-name">Tên</th>
                  <th class="product-color">Màu</th>
                  <th class="product-size">Size</th>
                  <th class="product-price">Giá</th>
                  <th class="product-quantity">Số Lượng</th>
                  <th class="product-total">Thành Tiền</th>
                  <th class="product-remove">Xóa</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // unset($_SESSION['cart']);
                $tong = 0;
                $giohang = $gh->getGioHang($_SESSION['makh']);
                // var_dump($giohang);
                foreach ($giohang as $key => $item) :
                  $hh = new hanghoa();
                  $hinh = $hh->getHangHoaHinhMauSize($item['mahh'], $item['idmau'], $item['idsize']);
                  $hinh = $hinh['hinh'];
                  if ($item['soluongton'] < $item['soluongmua']) {
                    echo '<script> alert("Mặt Hàng Này Đã Hết");</script>';
                    $xoa = $gh->delGiohang($_SESSION['makh'], $item['mahh'],  $item['idmau'],  $item['idsize']);
                    if (isset($item['mahh'])) {
                      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitietupdate&id=' . ($item['mahh']) . '&mymausac=' . ($item['idmau']) . '&size=' . ($item['idsize']) . '"/>';
                    } else {
                      unset($_SESSION['cart']);
                      echo '<script> alert("Đã Xảy Ra lỗi");</script>';
                      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                    }
                  }
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="Content/imagetourdien/<?php echo $hinh; ?>" alt="Image" class="img-fluid" height="100px" width="100px">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">
                        <?php echo $item['tenhh']; ?>
                      </h2>
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">
                        <?php echo $item['mausac']; ?>
                      </h2>
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">
                        <?php echo $item['size']; ?>
                      </h2>
                    </td>
                    <td>
                      <h2 class="h5 text-black">
                        <?php
                        if ($item['giamgia'] != 0) {
                          echo ' <small class="text-muted"><strike>
                                <strong class="product-pricecart">' . (number_format($item['dongia'])) . '
                                </strong></strike><s><span></span></s></small>';
                          echo number_format($item['giamgia']);
                        }
                        if ($item['giamgia'] == 0) {
                          echo number_format($item['dongia']);
                        }
                        ?>
                      </h2>
                    </td>
                    <td>
                      <div class="input-group d-flex align-items-center quantity-container">
                        <div class="input-group-prepend baba">
                          <button class="btn btn-outline-black decrease" type="button" onclick="decreaseQuantity(<?php echo $key; ?>)">&minus;</button>
                        </div>
                        <input type="text" name="newqty[]" class="form-control text-center quantity-amount rounded-30" autocomplete="off" onchange="submitForm();checkQuantity(this)" value="<?php echo $item['soluongmua']; ?>" />
                        <div class="input-group-append bonbon">
                          <button class="btn btn-outline-black increase" type="button" onclick="increaseQuantity(<?php echo $key; ?>)">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h2 class="h5 text-black">
                        <?php
                        if ($item['giamgia'] > 0) {
                          echo number_format($item['soluongmua'] * $item['giamgia']);
                        }
                        if ($item['giamgia'] == 0) {
                          echo number_format($item['soluongmua'] * $item['dongia']);
                        }
                        ?>
                      </h2>
                    </td>
                    <td><a href="index.php?action=giohang&act=delete_cart&id=<?php echo $item['mahh'] ?>&idmau=<?php echo $item['idmau'] ?>&idsize=<?php echo $item['idsize'] ?>" class="btn btn-black btn-sm">
                        <h2 class="h5 text-black">X</h2>
                      </a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>
      <?php
      $giohangan = $gh->getGioHangAn($_SESSION['makh'])->rowCount();
      if($giohangan >0) { ?>
      <div class="offset-025 mb-2">Có <?php echo $giohangan; ?> món đã bị ẩn</div>

      <?php } ?>
      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6">
              <a href="index.php?action=home&act=home"><button class="btn btn-outline-black btn-sm btn-block" type="button">Tiếp Tục Mua Hàng</button></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-4">
                  <h3 class="text-black h4 text-uppercase">Tổng Tiền</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Tổng Cộng</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">
                    <?php
                    $gh = new giohang();
                    echo $gh->getSubTotal();
                    ?>
                  </strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <a href="index.php?action=thanhtoan">
                    <button class="btn btn-black btn-lg py-3 btn-block" type="button" value="button">Thanh Toán</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      </form>
    <?php
  } else {
    echo '
      <div class="text-center mt-7 mb-7">
        <h2 class="text-center text-d9d9d9">Giỏ hàng của bạn trống</h2>
        <a href="index.php" type="button" class="btn vmt col-md-2 my-sm-0 bg-d9d9d9 bordernone">ĐI MUA NGAY</a>
      </div>
      ';
  } ?>
    </div>
</div>


<script>
  function checkQuantity(input) {
    var quantity = input.value.trim(); // Lấy giá trị nhập vào và loại bỏ các ký tự không cần thiết từ đầu và cuối
    var decimalRegex = /^\d+$/; // Biểu thức chính quy kiểm tra số nguyên

    if (!decimalRegex.test(quantity)) { // Kiểm tra xem giá trị nhập vào có chứa số thập phân hay không
      alert("Hãy Nhập Số Nguyên");
      input.value = <?php echo $item['soluongmua']; ?>; // Xóa giá trị nhập vào nếu có số thập phân
      return false; // Trả về false để ngăn form submit
    }
    return true; // Trả về true nếu không có lỗi
  }

  function increaseQuantity(index) {
    var quantityInput = document.getElementsByClassName('quantity-amount')[index];
    var currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
    submitFormdelay();
  }

  function decreaseQuantity(index) {
    var quantityInput = document.getElementsByClassName('quantity-amount')[index];
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
      quantityInput.value = currentQuantity - 1;
    submitFormdelay();
    }
  }
  // Hàm gửi form
  function submitForm() {
    var form = document.getElementById('cart-form');
    if (validateForm()) {
      form.submit();
    }
  }

  function validateForm() {
    var quantityInputs = document.querySelectorAll('.quantity-amount');
    for (var i = 0; i < quantityInputs.length; i++) {
      if (!checkQuantity(quantityInputs[i])) {
        return false;
      }
    }
    return true;
  }


  function delayTime2(func, wait) {
    return function() {
      var that = this,
        args = [].slice(arguments);
      clearTimeout(func._throttleTimeout);
      func._throttleTimeout = setTimeout(function() {
        func.apply(that, args);
      }, wait);
    };
  }
  var submitFormdelay = delayTime2(submitForm, 800);
</script>