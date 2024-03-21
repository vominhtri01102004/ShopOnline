<?php
  if(isset($_GET['id']))
  {
    $mahh=$_GET['id'];
    // lấy thông tin mahh đc chọn để update
    $hh=new hanghoa();
    $kq=$hh->getHangHoaID($mahh);
    $tenhh=$kq['tenhh'];
    $maloai=$kq['maloai'];
    $dacbiet=$kq['dacbiet'];
    $slx=$kq['soluotxem'];
    $ngaylap=$kq['ngaylap'];
    $mota=$kq['mota'];
  }
?>
<?php
 $ac=1;
 if(isset($_GET['action']))
 {
  if(isset($_GET['act'])&& $_GET['act']=='insert_action')
  {
    $ac=1;
  }
  else
  {
    $ac=2;
  }
 }
?>
<div class="row col-md-4 col-md-offset-4" >
  <?php
    if($ac==1)
    {
      echo '<form action="index.php?action=hanghoa&act=insert_action" method="post">';
    }
    else
    {
      echo '<form action="index.php?action=hanghoa&act=update_action" method="post">';
    }
  ?>
  
    <table class="table" style="border: 0px;">

      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($mahh)) echo $mahh;?>"  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh" value="<?php if(isset($tenhh)) echo $tenhh;?>" maxlength="100px"></td>
      </tr>
     
      <tr>
        <td>Mã loại</td>
        <td>
          <select name="maloai" class="form-control" style="width:150px;">
            <?php
            $selectedloai=-1;
            if(isset($maloai) && $maloai!=-1)
            {
              $selectedloai=$maloai;
            }
              $loai=new loai();
              $result=$loai->getLoai();
              while($set=$result->fetch()):
            ?>
            <option value="<?php echo $set['maloai'];?>" <?php if($selectedloai==$set['maloai']) echo 'selected';?>><?php echo $set['tenloai'];?></option>
            <?php
             endwhile;
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Đặc biệt</td>
        <td><input type="text" class="form-control" value="<?php if(isset($dacbiet)) echo $dacbiet;?>" name="dacbiet" >
        </td>
      </tr>
      <tr>
        <td>Số lượt xem</td>
        <td><input type="text" class="form-control" value="<?php if(isset($slx)) echo $slx;?>" name="slx" >
        </td>
      </tr>
      <tr>
        <td>Ngày lập</td>
        <td><input type="text" class="form-control" value="<?php if(isset($ngaylap)) echo $ngaylap;?>" name="ngaylap">
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mota)) echo $mota;?>" name="mota">
        </td>
      </tr>
     
      <tr>
        <td colspan="2">
          <input type="submit" value="submit">
          

        </td>
      </tr>

    </table>
  </form>
</div>