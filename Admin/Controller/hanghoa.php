<?php
$act="hanghoa";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;
    
    case 'insert_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'insert_action':
        // nhận thông tin về
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $mahh=$_POST['mahh'];
            $tenhh=$_POST['tenhh'];
            $maloai=$_POST['maloai'];
            $dacbiet=$_POST['dacbiet'];
            $slx=$_POST['slx'];
            $ngaylap=$_POST['ngaylap'];
            $mota=$_POST['mota'];
            // đem vào insert database$_POST['mahh'];
            $hh=new hanghoa();
            $check=$hh->insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
            if($check!==false)
            {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
            }
            else
            {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }

        }
        break;
    case 'update_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case "update_action":
        // nhận thông tin
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $mahh=$_POST['mahh'];
            $tenhh=$_POST['tenhh'];
            $maloai=$_POST['maloai'];
            $dacbiet=$_POST['dacbiet'];
            $slx=$_POST['slx'];
            $ngaylap=$_POST['ngaylap'];
            $mota=$_POST['mota'];
            // đem vào insert database$_POST['mahh'];
            $hh=new hanghoa();
             $check=$hh->updateHangHoa($mahh,$tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
            if($check!==false)
            {
                echo '<script>alert("Update liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
            }
            else
            {
                echo '<script>alert("Update dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }

        }
        break;
}

?>