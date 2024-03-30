<?php
// include "Model/connect.php";
// include "Model/hanghoa.php";
// include "Model/loaisanpham.php";
include_once "Model/uploadimage.php";
session_start();
//unset($_SESSION['admin']);
spl_autoload_register("myModelClass");
function myModelClass($classname)
{
    $path="Model/";
    include $path.$classname.'.php';
}
?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- link đăng nhập -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- link đăng nhập -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- end -->
    <!-- end link đăng nhập -->
    <link rel="stylesheet" type="text/css" href="../Content/CSS/Tour.css" />
    <title>Admin Shop đồ Tri</title>
</head>

<body>
<!-- Thanh header tao menu -->
<?php
        if(isset($_SESSION['admin']))
        {
            include "View/headder.php";
        }
            
        ?>
        <!-- end hinh dong -->
        <!-- phan thân -->
        <div class="container">
        <!-- <div class="row"> -->
        <?php
             //load controler
            $ctrl="dangnhap";
            if(isset($_GET['action']))
                $ctrl=$_GET['action'];
            include 'Controller/'.$ctrl.'.php';
            // include 'Controller/'.$ctrl.'.php';

        //end controller
            
        ?>
        <!-- </div> -->
        <!-- end menu right -->
    </div>
    <!-- footer -->
    <?php
    // if(isset($_SESSION['admin']))
    // {
    //     include "View/footer.php";
    // }
    ?>
    <!-- end footer -->
   
</body>

</html>