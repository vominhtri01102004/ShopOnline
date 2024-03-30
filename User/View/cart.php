<div class="untree_co-section before-footer-section">
  <div class="container">
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    ?>
      <div class="row mb-5">
        <form class="col-md-12" method="post" action="index.php?action=giohang&act=update_cart">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th class="product-thumbnail">Hình</th>
                  <th class="product-name">Tên Món</th>
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
                foreach ($_SESSION['cart'] as $key => $item) :
                  if ($item['soluongton'] < $item['soluong']) {
                    echo '<script> alert("Mặt Hàng Này Chỉ Còn ' . ($item['soluongton']) . '");</script>';
                    unset($_SESSION['cart'][$key]);
                    // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . ($item['mahh']) . '"/>';
                    // if (isset($item['mahh']) && $item['soluongton'] < $item['soluong']) {
                    // }
                    if (isset($item['mahh'])) {
                      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id=' . ($item['mahh']) . '"/>';
                  }
                  else{
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                  }
                  }
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="Content/imagetourdien/<?php echo $item['hinh']; ?>" alt="Image" class="img-fluid" height="100px" width="100px">
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
                      <?php
                      if ($item['giamgia'] > 0) {
                        echo ' <small class="text-muted"><strike>
                                <strong class="product-pricecart">' . (number_format($item['dongia'])) . '
                                </strong></strike><s><span></span></s></small>';
                        echo number_format($item['giamgia']);
                      }
                      if ($item['giamgia'] == 0) {
                        echo number_format($item['dongia']);
                      }
                      ?>
                    </td>
                    <td>
                      <div class="input-group mb-3 d-flex align-items-center quantity-container">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-black decrease" type="button" onclick="decreaseQuantity(<?php echo $key; ?>)">&minus;</button>
                        </div>
                        <input type="text" name="newqty[]" class="form-control text-center quantity-amount" autocomplete="off"
                         value="<?php echo $item['soluong']; ?>" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        <div class="input-group-append">
                          <button class="btn btn-outline-black increase" type="button" onclick="increaseQuantity(<?php echo $key; ?>)">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td>
                      <?php echo number_format($item['thanhtien']); ?>
                    </td>
                    <td><a href="index.php?action=giohang&act=delete_cart&id=<?php echo $key; ?>" class="btn btn-black btn-sm">X</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
              <a href="index.php?action=giohang&act=update_cart" name="">
                <button class="btn btn-black btn-sm btn-block" type="submit">Cập Nhật Giỏ Hàng</button>
              </a>
            </div>
            <div class="col-md-6">
              <a href="index.php?action=home&act=home"><button class="btn btn-outline-black btn-sm btn-block" type="button">Tiếp Tục Mua Hàng</button></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
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
      echo '<script> alert("Bạn chưa có hàng");</script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    } ?>
  </div>
</div>


<script>
  // Hàm để tăng số lượng nè non nớt
  function increaseQuantity(index) {
    var quantityInput = document.getElementsByClassName('quantity-amount')[index];
    var currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
  }

  // Hàm để giảm số lượng nè non nớt
  function decreaseQuantity(index) {
    var quantityInput = document.getElementsByClassName('quantity-amount')[index];
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
      quantityInput.value = currentQuantity - 1;
    }
  }
</script>

<!-- Đoạn mã HTML và PHP tiếp theo của bạn -->