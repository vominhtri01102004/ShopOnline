<?php
$act="dangnhap";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
    
    case 'dangnhap_action':
         //gửi thông tin đăng nhập qua đây
         $user='';
         $pass='';
        if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
        {
            $user=$_POST['txtusername'];
            $pass=$_POST['txtpassword'];
            $salfF="G435#";
            $salfL="T34a!&";
            $passnew=md5($salfF.$pass.$salfL);
            //controller yêu cầu kiểm tra xem có người này hay không?
            $kh=new user();
            $logkh=$kh->logKhachHang($user,$passnew);
            if($logkh)
            {
                // nếu đăng nhập thành công thì lưu thông tin vào trong section
                $_SESSION['makh']=$logkh['makh'];
                $_SESSION['tenkh']=$logkh['tenkh'];
                echo '<script> alert("Đăng nhập thành công");</script>';
                if (count($_SESSION['cart']) >0) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
                }
                if (count($_SESSION['cart']) <=0) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                }
                
            }
            else
            {
                echo '<script> alert("Đăng nhập không thành công");</script>';
                // include_once "./View/registration.php";
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
            }
        }
        break;
        case 'dangxuat':
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            break;
}
    
?>