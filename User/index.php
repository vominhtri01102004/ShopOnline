  <?php
  // unset($_SESSION['cart']);
  // include_once "Model/connect.php";
  // include_once "Model/hanghoa.php";
  // /sql_autoload; là dùng để load lên những file là hướng đối tượng tức là class
  //cách 1:
  // sql_autoload_register('myModelLoader');
  // function myModelLoader($className)
  // {
  //   $path='Model/';
  //   include_once $path.$className.'php';
  // }
  // cách 2
  session_start();
  include_once "Model/class.phpmailer.php";
  set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
  spl_autoload_extensions('.php');
  spl_autoload_register();
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Content/CSS/templatemo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link href="Content/CSS/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="Content/CSS/style.css" rel="stylesheet">
    <link href="Content/CSS/login.css" rel="stylesheet">
    <script src="Content/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>
    <?php
    $kn = new connect();
    ?>
    <!-- header -->
    <?php
    include_once "View/headder.php";
    ?>
    <!-- hiên thi noi dung -->
    <div class="container">
      <div class="row">
        <!-- hien thi noi dung đây -->
        <?php
        //khởi tạo trang chủ
        $ctrl = "home";
        // index gọi controller kahcs nhau
        if (isset($_GET['action'])) {
          $ctrl = $_GET['action']; //sanpham
        }
        include_once "Controller/$ctrl.php";
        ?>
      </div>
    </div>
    <!-- hiên thị footer -->
    <?php
    include_once "View/footer.php";
    // include_once "./View/services.php"
    ?>
  </body>

  </html>