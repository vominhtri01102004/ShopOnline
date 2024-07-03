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
  include_once "Model/uploadimage.php";
  session_start();
  include_once "Model/class.phpmailer.php";
  set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
  spl_autoload_extensions('.php');
  spl_autoload_register();
  ?>
  <!DOCTYPE html>
  <html lang="en" class="scrollwidthnone">

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




    <!-- click -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>

  <body>
    <?php
    $kn = new connect();
    ?>
    <!-- header -->
    <link rel="shortcut icon" href="Content/imagetourdien/favicon.jpg">
    <title>Shop Của Trí</title>
    <?php
    if (isset($_GET['makh']) && $_GET['makh'] != $_SESSION['makh']) {
      $_GET['makh'] = $_SESSION['makh'];
    }
    include_once "View/headder.php";
    ?>
    <?php if (isset($_SESSION['makh'])) { ?>
      <form action="index.php?action=dangnhap&act=dangxuat" id="offline" method="POST">
      </form>

    <?php } ?>


    <!-- hiên thi noi dung -->

    <div class="container">
      <div class="row">
        <!-- hien thi noi dung đây -->
        <?php
        //khởi tạo trang chủ
        $ctrl = "home";
        // index gọi controller khác nhau
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
    ?>


    <!-- phóng to hình -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        // When an image inside a table cell is clicked
        $('table img, img[name="hinh"]').on('click', function() {
          // Get the source of the clicked image
          var src = $(this).attr('src');
          // Create a modal to display the enlarged image
          var modal = $('<div class="modal">').css({
            background: 'rgba(0, 0, 0, 0.7)',
            position: 'fixed',
            top: 0,
            left: 0,
            right: 0,
            bottom: 0,
            zIndex: 9999,
            display: 'flex',
            justifyContent: 'center',
            alignItems: 'center'
          }).appendTo('body');

          // Add the enlarged image to the modal
          $('<img>').attr('src', src).css({
            maxWidth: '90%',
            maxHeight: '90%',
            borderRadius: '20px',
            boxShadow: '0 0 20px rgba(0, 0, 0, 0.5)'
          }).appendTo(modal);

          // When the modal or the enlarged image is clicked, close the modal
          modal.on('click', function() {
            $(this).remove();
          });
        });
      });
    </script>

    <script>
      //script off nguoi dung

      var idleTime = 0;

      function incrementIdleTime() {
        idleTime += 10;
        console.log(idleTime)
        if (idleTime > 600) {
          var form = document.getElementById('offline');
          form.submit();
        }
      }

      function resetIdleTime() {
        idleTime = 0;
      }

      $(document).on('mousemove mousedown keydown', function() {
        resetIdleTime();
      });

      setInterval(incrementIdleTime, 10000);
    </script>

  </body>

  </html>