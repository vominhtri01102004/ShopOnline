<?php if (isset($_SESSION['masohd']) && !empty($_SESSION['masohd'])) {
    ?>
<?php
    $kh = new user();
    $lsmuahang = $kh->LichSuMuaHang($_SESSION['makh']);
?>
<h1 class="text-center">Lịch sử mua hàng</h1>
<table class="table table-bordered table-striped table-hover w-100">
    <thead class="bg-primary">
        <tr>
            <th>Ngày mua</th>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Só lượng mua</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th>Tổng Tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($set = $lsmuahang->fetch()) :
        ?>
        <tr class="lsmnuahang">
            <td><?php echo $set['ngaydat'] ?></td>
            <td><?php echo $set['tenhh'] ?></td>
            <td><?php echo $set['size'] ?></td>
            <td><?php echo $set['soluongmua'] ?></td>
            <td><?php echo $set['dongia'] ?></td>
            <td><?php echo ($set['dongia']*$set['soluongmua']) ?></td>
            <td><?php echo $set['tongtien'] ?></td> 
        </tr>
        <?php endwhile;
        ?>
    </tbody>
</table>
<?php
}else {
      echo '<script> alert("Bạn Chưa Có Hóa Đơn Cũ");</script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    }
?>