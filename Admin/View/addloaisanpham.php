<div class="row mt-5">
  <div class="card h-100 col-md-4 p-0">
        <div class="card-header bg-primary text-center">
           <h4>THÊM LOẠI</h4>
        </div>
        <div class="card-body">
          <?php
            if (isset($_GET['act'])&& $_GET['act']=='update') {
              echo '<form action="index.php?action=loai&act=update_action" method="post" enctype="multipart/form-data">';
            } else {
              echo '<form action="index.php?action=loai&act=loai_action" method="post" enctype="multipart/form-data">';
            }
          ?>
        
              <!-- <div class="form-group">
                <label for="">Mã loại</label>
                <input type="text" readonly name="idloai" placeholder="Không cần nhập mã loại" class="form-control" >
              </div> -->
              <div class="form-group">
                <label for="">Tên loại</label>
                <input type="text" name="tenloai" class="form-control" value="<?php if (isset($_GET['act'])&& $_GET['act']=='update'){
                  echo $_SESSION['tenloai'] ;
                } ?>">
              </div>
              <?php
                if (isset($_GET['act'])&& $_GET['act']=='update') {
                  echo '<div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>';
                } else {
                  echo '<div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>';
                }
              ?>
              
              
          </form>
        </div>
  </div>
  <div class="col-md-2"></div>
  <div class="col-md-6">
    <h1 class="text-center"><b>Danh sách loại</b></h1>
    <?php
       if (isset($_GET['act'])&& $_GET['act']=='update') {
        echo '<a href="index.php?action=loai" type="button" class="btn btn-primary">Thêm 1 Loại</a>';
      }
    ?>
    
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success">
        <tr>
          <th>Mã loại</th>
          <th>Tên loại</th>
          <th style="width:100px; float:right;">Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $loai = new loai();
          $result = $loai->getLoai();
          while ($set=$result->fetch()) :
        ?>
        <tr>
          <td><?php echo $set['maloai']?></td>
          <td><?php echo $set['tenloai']?></td>
          <td>
            <a href="index.php?action=loai&act=update&id=<?php echo $set['maloai'] ?>" type="button" class="btn btn-success">Chỉnh sửa</a>
            <a href="index.php?action=loai&act=delloai&id=<?php echo $set['maloai'] ?>" type="button" class="btn btn-danger">Xóa</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>
      
