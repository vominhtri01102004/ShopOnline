<?php
// include "Model/connect.php";
// include "Model/hanghoa.php";
// include "Model/loaisanpham.php";
include_once "Model/uploadimage.php";
session_start();

include_once "Model/class.phpmailer.php";
spl_autoload_register("myModelClass");
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
function myModelClass($classname)
{
    $path = "Model/";
    include $path . $classname . '.php';
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="Content/CSS/Tour.css" rel="stylesheet">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- end -->
    <!-- end link đăng nhập -->
    <link rel="stylesheet" type="text/css" href="../Content/CSS/Tour.css" />
    <title>Admin Shop đồ Tri</title>
</head>

<body>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Xác Nhận Xóa Hàng Hóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa hàng hóa này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="khongxoa">Xác Nhận Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Thanh header tao menu -->
    <?php
    $hd = new xacnhandon();
    $us = new qlynguoi();
    if (isset($_GET['makh'])) {
        $kh = $us->selectKhachHangId($_GET['makh']);
        if (empty($kh)) {
            $result = $us->selectAllKhachHang();
            while ($set = $result->fetch()) :
                $makh = $set['makh'];
            endwhile;
            $_GET['makh'] = $makh;
        }
    }
    if (isset($_GET['masohd'])) {
        $kh = $hd->selectThongTinKHLSChiTiet($_GET['masohd']);
        if (empty($kh)) {
            $result = $hd->selectTatCaDon();
            while ($set = $result->fetch()) :
                $masohd = $set['masohd'];
            endwhile;
            $_GET['masohd'] = $masohd;
        }
    }
    if (isset($_GET['action']) && $_GET['action'] != 'dangnhap' && $_GET['action'] != 'forget') {
        include "View/headder.php";
    }

    ?>
    <div class="confirmation-container d-noneimpt " id="form1">
        <div class="confirmation-box">
            <h2 class="mb-4">Bạn Có Chắc Muốn Xóa Chứ ?</h2>
            <div class="col-12 d-flex mt-7">
                <button class="rounded-10px col-5 mt-5 bg-rbg" id="xacnhanxoa">
                    <p class="m-0 p-2">Xóa</p>
                </button>
                <div class="col-1"></div>
                <button class="rounded-10px col-5 mt-5 bg-huydon" id="khongxoa">
                    <p class="m-0 p-2">Hủy</p>
                </button>
            </div>
        </div>
    </div>
    <div class="container whcontainer pe-0 ps-0 mt-5">
        <!-- <div class="row"> -->
        <?php
        //load controler
        $ctrl = "dangnhap";
        if (isset($_GET['action']))
            $ctrl = $_GET['action'];
        include 'Controller/' . $ctrl . '.php';
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
    <script>
        function showConfirmation(link) {
            var form1 = document.getElementById('form1');
            var xacnhanxoa = document.getElementById('xacnhanxoa');
            var khongxoa = document.getElementById('khongxoa');
            form1.style.display = 'flex';
            var url = link.href;
            event.preventDefault();

            form1.onclick = function() {
                form1.style.display = 'none';
            };
            khongxoa.onclick = function() {
                form1.style.display = 'none';
            };
            xacnhanxoa.onclick = function() {
                form1.style.display = 'none';
                window.location.href = url;
            };


        }

        // function confirmDelete() {
        //     // Your delete logic here
        //     console.log('Item deleted');
        //     var form1 = document.getElementById('form1');
        //     form1.style.display = 'none';
        //     var link = document.getElementById('link');

        //     // Lấy URL từ thuộc tính href
        //     var url = link.href;

        //     console.log(url);

        //     window.location.href = url;
        // }

        // function cancelDelete() {
        //     var form1 = document.getElementById('form1');
        //     form1.style.display = 'none';
        // }
    </script>
    <!-- <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa hàng này?");
        }
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var textInputs = document.querySelectorAll('input[type="text"]');
            textInputs.forEach(function(input) {
                input.setAttribute('pattern', '[a-zA-ZÀ-Ỹà-ỹ0-9, ]+');
            });
        });
    </script>

    <!-- phóng to hình -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // When an image inside a table cell is clicked
            // $('table img').on('click', function() {
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

    <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
    var textInputs = document.querySelectorAll('input[type="text"]');
    textInputs.forEach(function(input) {
        input.setAttribute('pattern', '^[a-zA-ZÀ-Ỹà-ỹ0-9_]+\\.(jpg|jpeg|png|gif)$');
    });
});
</script> -->
    <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        var textInputs = document.querySelectorAll('input[type="text"]');
        textInputs.forEach(function(input) {
            input.setAttribute('pattern', '([a-zA-ZÀ-Ỹà-ỹ0-9 ]+(\\.jpg|\\.png|\\.jpeg|\\.gif)?)');
        });
    });
</script> -->
</body>

</html>