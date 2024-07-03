 <meta charset="UTF-8">
 <!--Load the AJAX API-->
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
   google.load('visualization', '1.0', {
     'packages': ['corechart']
   });
   google.setOnLoadCallback(drawVisualization);

   function drawVisualization() {
     //thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
     var rows = new Array();
     var tenhh = new Array();
     var soluongban = new Array();
     var dataten = 0;
     var soluong = 0;
     //b1: phải tạo bảng
     var data = new google.visualization.DataTable();
     // lấy dữ liệu từ database về
     <?php
      if (isset($_GET['act']) && $_GET['act'] == 'thongkedonhang') {
        $ac = 1;
        $noidung = 'Đơn Hàng';
      }
      if (isset($_GET['act']) && $_GET['act'] == 'thongkesanpham') {
        $ac = 2;
        $noidung = 'Sản Phẩm';
      }
      if (isset($_GET['act']) && $_GET['act'] == 'thongkedoanhthu') {
        $ac = 3;
        $noidung = 'Doanh Thu';
      }
      $hh = new hanghoa();
      if (isset($_SESSION['nam']) || isset($_SESSION['thang'])) {
        if ($ac == 2) {
          $result = $hh->getThongKeSanPham($_SESSION['nam'], $_SESSION['thang']);
        } else if ($ac == 1) {
          $result = $hh->getThongKeDonHang($_SESSION['nam'], $_SESSION['thang']);
        } else if ($ac == 3) {
          $result = $hh->getThongKeDoanhThu($_SESSION['nam'], $_SESSION['thang']);
        }
      } else {
        if ($ac == 2) {
          $result = $hh->getThongKeSanPham();
        } else if ($ac == 1) {
          $result = $hh->getThongKeDonHang();
        } else if ($ac == 3) {
          $result = $hh->getThongKeDoanhThu();
        }
      }
      while ($set = $result->fetch()) :
        if ($ac == 2 || $ac == 3) {
          $tenhh = trim($set['tenhh']);
          $slb = $set['soluong'];
        } else if ($ac == 1) {
          if ($set['trangthai'] == 0) {
            $tenhh = 'Chờ Xác Nhận';
          }
          if ($set['trangthai'] == 1) {
            $tenhh = 'Đang Giao Hàng';
          }
          if ($set['trangthai'] == 2) {
            $tenhh = 'Hoàn Thành';
          }
          if ($set['trangthai'] == 3) {
            $tenhh = 'Đã Bị Hủy';
          }
          if ($set['trangthai'] == 4) {
            $tenhh = 'Chờ Xác Nhận Trả Hàng';
          }
          if ($set['trangthai'] == 5) {
            $tenhh = 'Trả Hàng';
          }
          // $tenhh = trim($set['trangthai']); //Dép Quai Chữ V Đan Chéo Vân Cá Sấu
          $slb = $set['soluong'];
        }
        // đem biến này đưa vào mảng tenhh và soluongban
        echo "tenhh.push('" . $tenhh . "');";
        echo "soluongban.push('" . $slb . "');";
      endwhile;
      ?>
     //+ tạo dòng
     for (var i = 0; i < tenhh.length; i++) {
       dataten = tenhh[i];
       soluong = parseInt(soluongban[i]);
       rows.push([dataten, soluong]);
     }
     // +tạo cột
     data.addColumn('string', 'Tên hàng hóa');
     data.addColumn('number', 'Số lượng bán');
     data.addRows(rows);
     //b2: tạo options
     var options = {
       'width': 1200,
       'height': 700,
       'backgroundColor': '#ffffff',
       is3D: true
     };

     // b3: tiến hàng vẽ
     var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
     chart.draw(data, options);

   }
 </script><?php
          $tongtien = 0;
          if (isset($_SESSION['nam']) || isset($_SESSION['thang'])) {
            if (!isset($_SESSION['thang'])) {
              $_SESSION['thang'] = 0;
            }
            if (!isset($_SESSION['nam'])) {
              $_SESSION['nam'] = 0;
            }
            $result1 = $hh->getThongKeDoanhThu($_SESSION['nam'], $_SESSION['thang']);
          } else {
            $result1 = $hh->getThongKeDoanhThu();
          }
          while ($set = $result1->fetch()) :
            $tongtien += $set['soluong'];
          endwhile; ?>

 <div class="row mt-5">
   <div class="col-md-6">
     <?php
      if (!isset($_SESSION['nam']) || $_SESSION['nam'] == 0) {
        $nam = 'Toàn Bộ';
      }
      if (!isset($_SESSION['thang']) || $_SESSION['thang'] == 0) {
        $thang = 'Toàn Bộ';
      }
      if (isset($_SESSION['thang'])  && $_SESSION['thang'] != 0) {
        $thang = $_SESSION['thang'];
      }
      if (isset($_SESSION['nam'])  && $_SESSION['nam'] != 0) {
        $nam = $_SESSION['nam'];
      }
      if ($nam != "Toàn Bộ" || $thang != "Toàn Bộ") {
        echo "<h2 class='text-center'>Thống kê $noidung Năm: " . $nam . " - Tháng: " . $thang . "</h2>";
      } else {
        echo "<h2 class='text-center'>Thống Kê Tất Cả $noidung</h2>";
      }
      if ($ac == 3) {
        if ($nam != "Toàn Bộ" ||  $thang != "Toàn Bộ") {
          echo ' <h3 class="text-center">Tổng Doanh Thu : ' . number_format($tongtien) . '</h3>';
        } else {
          echo ' <h3 class="text-center">Tổng Doanh Thu : ' . number_format($tongtien) . '</h3>';
        }
      }
      ?>
     <div class="w-100" id="chart_div">
     </div>
   </div>
   <div class="col-md-6">
     <div class="thongke mt-5 text-center">
       <?php if ($ac == 2) {
          echo '<form action="index.php?action=thongke&act=thongkesanpham_action" method="post">';
        } else if ($ac == 1) {
          echo '<form action="index.php?action=thongke&act=thongkedonhang_action" method="post">';
        } else if ($ac == 3) {
          echo '<form action="index.php?action=thongke&act=thongkedoanhthu_action" method="post">';
        } ?>
       <h1>Thống kê theo năm</h1>
       <select class="form-control w-50 d-inline" name="nam" id="">
         <option value="0">--Toàn bộ--</option>
         <?php
          $hd = new hoadon();
          $years = $hd->getNam();
          while ($set = $years->fetch()) :
          ?>
           <option value="<?php echo $set['nam'] ?>
             " <?php if (isset($_SESSION['nam']) && $set['nam'] == $_SESSION['nam']) {
                  echo "selected";
                  unset($_SESSION['nam']);
                } ?>><?php echo $set['nam'] ?></option>
         <?php endwhile; ?>
       </select>
       <div class="d-flex">
         <div class="col-12">
           <select class="form-control w-50 d-inline" name="thang" id="">
             <option value="0">--Toàn bộ--</option>
             <?php
              $hd = new hoadon();
              $months = $hd->getThang();
              while ($set = $months->fetch()) :
              ?>
               <option value="<?php echo $set['thang'] ?>
             " <?php if (isset($_SESSION['thang']) && $set['thang'] == $_SESSION['thang']) {
                  echo "selected";
                  unset($_SESSION['thang']);
                } ?>><?php echo $set['thang'] ?></option>
             <?php endwhile; ?>
         </div>
         </select>
         <div class="col-12">
           <input class="btn btn-primary col-4 rounded-20px bg-rbg3 bordernone" type="submit" value="Bắt Đầu Thống Kê">
         </div>
       </div>
       </form>
     </div>
   </div>
 </div>
 </meta>