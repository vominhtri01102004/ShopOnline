<div class="row mt-5">
  <div class="card h-100 col-md-4 p-0">
        <div class="card-header bg-primary text-center">
           <h4>THÊM Màu</h4>
        </div>
        <div class="card-body">
        <form action="index.php?action=mau&act=mau_action" method="post" enctype="multipart/form-data">
              <!-- <div class="form-group">
                <label for="">Mã loại</label>
                <input type="text" readonly name="idloai" placeholder="Không cần nhập mã loại" class="form-control" >
              </div> -->
              <div class="form-group">
                <label for="">Tên Màu</label>
                <input type="text" name="mau" class="form-control">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
          </form>
        </div>
  </div>
  <div class="col-md-2"></div>
  <div class="col-md-4">
    <h1 class="text-center"><b>Danh sách mau</b></h1>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success">
        <tr>
          <th>Mã Màu</th>
          <th>Tên Màu</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $mau = new Mau();
          $result = $mau->getMau();
          while ($set=$result->fetch()) :
        ?>
        <tr>
          <td style="vertical-align: middle;"><?php echo $set['Idmau']?></td>
          <td style="vertical-align: middle;"><?php echo $set['mausac']?></td>
          <td style="vertical-align: middle;"><a href="index.php?action=mau&act=delsize&id=<?php echo $set['Idmau'] ?>"
           type="button" class="btn btn-danger">Xóa</a></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>
      
