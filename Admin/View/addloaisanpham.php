<div class="row mt-5">
  <?php
      if ($_SESSION['chucvu'] == 'Admin' ||  $_SESSION['chucvu'] == "Quản Lý") {
      ?>
  <div class="card h-100 col-md-4 p-0 mt-5 rounded-20px text-center">
    <div class="text-center bg-blue text-light rounded-10px">
      <?php if (isset($_GET['act']) && $_GET['act'] == 'update') {
        echo ' <h4>Chỉnh Sửa Loại</h4>';
      ?>
      <?php } else {
        echo '  <h4>Thêm Loại</h4>';
      } ?>

    </div>
    <div class="card-body">
      <?php
      if (isset($_GET['act']) && $_GET['act'] == 'update') {
        echo '<form action="index.php?action=loai&act=update_action" method="post" enctype="multipart/form-data">';
      } else {
        echo '<form action="index.php?action=loai&act=loai_action" method="post" enctype="multipart/form-data">';
      }
      ?>

      <div class="form-group">
        <input type="text" name="tenloai" required autocomplete="off" class="form-control" value="<?php if(isset($_GET['act']) && $_GET['act'] == 'update') {echo $_SESSION['tenloai'];} ?>">
      </div>
      <?php
      if (isset($_GET['act']) && $_GET['act'] == 'update') {
      ?>
        <div class="form-group">
          <button type="submit" class="btn btn-primary p-3 rounded-10px bg-blue1">Cập nhật</button>
          <a href="index.php?action=loai">
            <button type="button" class="btn btn-primary p-3 rounded-10px bg-blue1">Hủy Cập Nhật</button>
          </a>
        </div>
        <?php
      } else {
?>
          <div class="form-group">
            <button type="submit w-50" class="btn btn-primary p-3 rounded-10px bg-blue1">Thêm Loại Mới</button>
          </div>
      <?php
        }
      }
      ?>


      </form>
    </div>
  </div>
  <div class="col-md-2"></div>
  <div class="col-md-6">
    <h1 class="text-center"><b>Danh sách loại</b></h1>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success">
        <tr>
          <th>Mã loại</th>
          <th>Tên loại</th>
          <th class="w-100px float-end">Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $loai = new loai();
        $result = $loai->getLoai();
        while ($set = $result->fetch()) :
        ?>
          <tr>
            <td><?php echo $set['maloai'] ?></td>
            <td><?php echo $set['tenloai'] ?></td>
            <td>
              <?php
              if ($_SESSION['chucvu'] == 'Admin' ||  $_SESSION['chucvu'] == "Quản Lý") {
              ?>
                <a href="index.php?action=loai&act=update&id=<?php echo $set['maloai'] ?>" type="button" class="btn btn-success">Chỉnh sửa</a>
                <a href="index.php?action=loai&act=delloai&id=<?php echo $set['maloai'] ?>" onclick="showConfirmation(this)" type="button" class="btn btn-danger link">Xóa</a>
              <?php
              }
              ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>