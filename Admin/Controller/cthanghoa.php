<?php
     $act="cthanghoa";
     if(isset($_GET['act']))
     {
         $act=$_GET['act'];
     }
     switch ($act) {
        case 'cthanghoa':
            include_once "./View/cthanghoa.php";
            break;
        
        case 'cthanghoa_action':
            if(isset($_POST['submit']))
            {
                $mahh=$_POST['mahh'];
                $mamau=$_POST['mamau'];
                $masize=$_POST['masize'];
                $dongia=$_POST['dongia'];
                $slt=$_POST['slt'];
                $hinh=$_FILES['image']['name'];
                $giamgia=$_POST['giamgia'];
                // đưa vào trong database
                $ct=new cthanghoa();
                $checkinsert=$ct->insertCTHangHoa($mahh,$mamau,$masize,$dongia,$slt,$hinh,$giamgia);
                if($checkinsert!==false)
                {
                    uploadImage();
                    echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=cthanghoa"/>';
                }
            }
            break;
     }
?>