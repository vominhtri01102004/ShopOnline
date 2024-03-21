<?php
    $act="dangnhap";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            include_once "./View/dangnhap.php";
            break;
        case 'dangnhap_action':
            # truyen thông tin admin, 123456
            // kiểm tra if(isset($_POST['txtusername']) && isset($_POST['txtpassword']))
            // cachs if(isset($_POST['login']))
            if($_SERVER['REQUEST_METHOD']=="POST")
            {
                $user=$_POST['txtusername'];
                $pass=$_POST['txtpassword'];
                // dem so sánh trong database có hay không
                $nv=new nhanvien();
                $check=$nv->getAdmin($user,$pass);// check[admin,123456];
                if($check!==false)
                {
                    $_SESSION['admin']=$check['username'];
                    echo '<script>alert("Đăng nhập thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
                }
                else
                {
                    echo '<script>alert("Đăng nhập ko thành công");</script>';
                    include_once "./View/dangnhap.php";
                }
            }
            break;
       
    }
   
?>