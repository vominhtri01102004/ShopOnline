
<div class="row pb-5">
<div  class="col-md-4 col-md-offset-4 mt-5"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12">
<a class="btn btn-primary mb-5" href="index.php?action=hanghoa&act=insert_hanghoa"><h4>Thêm sản phẩm</h4></a>
</div>
<table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Hình ảnh</th>
        <th>Tên hàng</th>
        <th>Mã loại</th>
        <!-- <th>Ngày lập</th> -->
        <th>Mô tả</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $hh=new hanghoa();
        $count = $hh->getHangHoa()->rowCount();
        $limit=12;
        $trang=new page();
        $page=$trang->findPage($count,$limit);
        $start=$trang->findStart($limit);
        $result = $hh->getHangHoaAllPage($start,$limit);
        while($set=$result->fetch()):
      ?>
      <tr>
        <td><?php echo $set['mahh'] ?> </td>
        <td style="padding:0; text-align:center;"><img src=Content/imagetourdien/<?php echo $set['hinh'] ?> alt="" style="width:50px"></td>
        <td><?php echo $set['tenhh'] ?> </td>
        <td><?php echo $set['maloai'] ?> </td>
        <!-- <td><?php echo $set['ngaylap'] ?> </td> -->
        <td><?php echo $set['mota'] ?> </td>
        <td class="text-center"><a class="btn btn-primary" href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh']?>">Chỉnh sửa</a></td>
        <td class="text-center"><a class="btn btn-danger" href="index.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set['mahh']?>">Xóa</a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<nav aria-label="Page navigation">
              <ul class="pagination justify-content-center" >
              <?php
                $current_page=isset($_GET['page'])?$_GET['page']:1;
                if($current_page>1 && $page>1)
                {
                    echo '<li>
                    <a href="index.php?action=hanghoa&page='.($current_page-1).'" class="page-link">Prev</a>
                    </li>';
                }
                    for($i=1;$i<=$page;$i++){
                    ?>  
                    <li class="page-item"><a href="index.php?action=hanghoa&page=<?php echo $i;?>" class="page-link"><?php echo $i; ?></a></li>
                    <?php
                    }
                    if($current_page<$page && $page>1)
                {
                    echo '<li>
                    <a href="index.php?action=hanghoa&page='.($current_page+1).'" class="page-link">Next</a>
                    </li>';
                }
                   ?>          
            </ul>
          </nav>
<style>
  .table>tbody>tr>td{
    vertical-align: middle;
  }
</style>