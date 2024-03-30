<?php
  if(isset($_GET['id']))
  {
    $mahh=$_GET['id'];
    // truy vấn thông tin của id
    $hh=new hanghoa();
    $kq=$hh->getHangHoaID($mahh);
    $tenhh=$kq['tenhh'];
    $gia=$kq['dongia'];
    $giamgia=$kq['giamgia'];
    $maloai=$kq['maloai'];//6
    // $dacbiet=$kq['dacbiet'];
    // $slx=$kq['soluotxem'];
    // $ngaylap=$kq['ngaylap'];
    $mota=$kq['mota'];
  }
?>
<?php
$ac=1;
if(isset($_GET['action']))
{
  if(isset($_GET['act'])&& $_GET['act']=='insert_hanghoa')
  {
    $ac=1;
    echo "<h1 class='text-center mt-5'>THÊM MẶT HÀNG</h1>";
  }
  else
  {
    $ac=2;
    echo "<h1 class='text-center mt-5'>SỬA MẶT HÀNG</h1>";
  }
}
?>
<div class="row col-md-4 col-md-offset-4 mt-5" >
  <?php
    if($ac==1)
    {
      echo '<form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data">';
    }
    else
    {
      echo'<form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data">';
    }
  ?>

    <table class="table table-hover" style="border: 0px;">

      <?php
         if ($ac==2) :
      ?>
      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($mahh)) echo $mahh;?>" readonly/></td>
      </tr>
      <?php endif;?>

      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh"  value="<?php if(isset($tenhh)) echo $tenhh;?>"  maxlength="100px"></td>
      </tr>
      
      <tr>
        <td>Mã loại</td>
        <td>
          <select name="maloai" class="form-control" style="width:150px;">
          <option value="">-- Chọn một loại --</option>
            <?php
            $selectloai=-1;
            if(isset($maloai) && $maloai!=-1)
            {
              $selectloai=$maloai;//6
            }
              $loai=new loai();
              $result=$loai->getLoai();
              while($set=$result->fetch()):
            ?>
            <option value="<?php echo $set['maloai']?>" <?php if($selectloai==$set['maloai']) echo 'selected';?>><?php echo $set['tenloai'];?></option>
            <?php
              endwhile;
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Giá </td>
        <td><input type="text" class="form-control"  value="<?php if(isset($gia)) echo $gia;?>" name="dongia" >
        </td>
      </tr>
      <tr>
        <td>Giảm giá (%)</td>
        <td><input type="number" class="form-control"  value="<?php if(isset($giamgia)) echo $giamgia;?>" name="giamgia" >
        </td>
      </tr>
      <!-- nếu thêm sản phẩm thì phải có số lượng, hình ảnh, size -->
      <?php
        if ($ac === 1) :
          ?>
      <tr>
        <td>Hình ảnh</td>
        <td><input type="file" class="form-control"  value="" name="image">
        </td>
      </tr>
      <!-- size -->
      <tr>
        <td>Size</td>
        <td>
            <?php
              $size=new size();
              $result=$size->getSize();
              while($set=$result->fetch()):
            ?>
            <tr>
              <td><input type="checkbox" name="size[]" value="<?php echo $set['Idsize']?>" onchange="enableNumberInput(this)"> <?php echo $set['size'];?></input></td>
              <td><input type="number" name="soluong[]" class="form-control" id="" placeholder="Số lượng" disabled></td>
            </tr>
            
            <?php
              endwhile;
            ?>
        </td>
      </tr>
    <?php endif; ?>
    <!-- kết thúc số lượng -->
    <tr>
      <td>Mô tả</td>
      <td><input type="text" class="form-control" name="mota" value="<?php if(isset($mota)) echo $mota;?>"></input>
      </td>
    </tr>
    </table>
      <input class="btn btn-primary" type="submit" value="submit">
  </form>
</div>
<script>
function enableNumberInput(checkbox) {
    var input = checkbox.parentNode.nextElementSibling.querySelector('input[type="number"]');
    if (checkbox.checked) {
        input.disabled = false;
    } else {
        input.disabled = true;
        input.value = null;
    }
}
</script>
