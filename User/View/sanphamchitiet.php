<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="card">
            <div class="container-fliud">
                <form method="post" action="index.php?action=giohang&act=giohang_action" onsubmit="return check(index)">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="active">
                                <?php
                                // điều hướng qua view chi tiết, đông thời cũng truyền id
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    //view đòi hỏi cần có thông tin của sản phẩm mà id=24?model
                                    $hh = new hanghoa();
                                    $sp = $hh->getHangHoaId($id); // array(mahh:24,tenhh: giày...)
                                    $tenhh = $sp['tenhh'];
                                    $mota = $sp['mota'];
                                    $dongia = $sp['dongia'];
                                    $giamgia = $sp['giamgia'];
                                    $soluongton = $sp['soluongton'];
                                }
                                ?>
                                <?php
                                $ac = 1;
                                if (isset($_GET['action'])) {
                                    if (isset($_GET['act']) && $giamgia == 0) {
                                        $ac = 2;
                                    }
                                    if (isset($_GET['act']) && $giamgia != 0) {
                                        $ac = 1;
                                    }
                                }
                                ?>
                                <?php
                                $hinh = $hh->getHangHoaHinh($id);
                                $set = $hinh->fetch(); // lấy ra thông tin của dòng đầu
                                ?>
                                <div class="tab-pane active">
                                    <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" id="main-image">
                                </div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <?php
                                $hinh1 = $hh->getHangHoaHinh($id);
                                $count = $hinh1->rowCount(); // Đếm số lượng hình

                                if ($count > 1) {
                                    while ($img = $hinh1->fetch()) :
                                ?>
                                        <li class="">
                                            <a data-target="#pic-1" data-toggle="tab" href="#<?php echo $img['hinh']; ?>">
                                                <img src="<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>" class="preview-thumbnail" id="thumb-<?php echo $img['hinh']; ?>" onmouseover="changeImage('Content/imagetourdien/<?php echo $img['hinh']; ?>')">
                                            </a>
                                        </li>
                                <?php
                                    endwhile;
                                }
                                ?>
                                <i class="fa-regular fa-heart heart"></i>
                            </ul>
                        </div>
                        <div class="details col-md-6">
                            <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                            <h3 class="product-title UPPERCASE">
                                <?php echo $tenhh; ?>
                            </h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">999 reviews</span>
                            </div>
                            <!-- // trang thai -->
                            <?php
                            if ($ac == 1) {
                                echo ' <small class="text-muted">Giá cũ:<strike class="trikechitiet">
                                <strong class="product-pricemauchitiet">' . (number_format($dongia)) . '
                                </strong></strike><s><span></span></s></small>';
                                echo '   <h4 class="price">Giá hiện tại: ' . (number_format($giamgia)) . '</h4> ';
                            }
                            if ($ac == 2) {
                                echo '   <h4 class="price">Giá hiện tại: ' . (number_format($dongia - $giamgia)) . '</h4> ';
                            }
                            ?>
                            <?php
                            if ($soluongton > 0) {
                                echo '  <p class="product-description">Số Lượng Tồn: ' . ($soluongton) . '</p> ';
                            }
                            if ($soluongton <= 0) {
                                echo '<span class="viewhethangchitiet">Hết Hàng</span>';
                            }
                            ?>
                            <p class="product-description">
                                <?php echo $mota; ?>
                            </p>

                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy
                                    tín</strong>!
                            </p>
                            <h5 class="sizes">sizes:
                                <input type="hidden" name="size" id="size" value="0" />
                                <?php
                                $size = $hh->getHangHoaSize($id);
                                while ($set = $size->fetch()) :
                                ?>
                                    <button type="button" name="" onclick="chonsize(<?php echo $set['size']; ?>)" class="btn nhannhan btn-default-xanh btn-circle" id="hong" value="<?php echo $set['idsize']; ?>">
                                        <?php echo $set['size']; ?>
                                    </button>
                                <?php
                                endwhile;
                                ?>
                            </h5>
                            <br>
                            <!-- mở test -->
                            <h5 class="colors">Màu:
                                <input type="hidden" name="mymausac" id="mausac" value="0" />
                                <?php
                                $mau = $hh->getHangHoaMau($id);
                                while ($set = $mau->fetch()) :
                                ?>
                                    <button type="button" name="" onclick="chonmau('<?php echo $set['idmau']; ?>')" class="btn-active nhannhan btn btn-default-hong btn-circle" id="xanh" value="<?php echo $set['idmau']; ?>">
                                        <?php echo $set['mausac']; ?>
                                    </button>
                                <?php
                                endwhile;
                                ?>
                            </h5>
                            <div class="form-group">
                                <label for="soluong">Số lượng đặt mua:</label>
                                <input type="number" id="soluong" name="soluong" min="1" max="1000" value="1" size="10" />
                            </div>
                            <div class="action">

                                <?php
                                if ($soluongton <= 0) {
                                    echo '<button class="btn btn-default-hong btn-circle muangay" type="submit" data-toggle="modal"
                                    data-target="#myModal" disabled>MUA NGAY
                                </button>';
                                }
                                if ($soluongton > 0) {
                                    echo '<button class="btn btn-circle muangay" type="submit" id="mot" data-toggle="modal"
                                     data-target="#myModal" >MUA NGAY
                                </button>';
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
</main>
<script type="text/javascript">
    const checkbutton = document.getElementById("mot");
    checkbutton.onclick = function() {
        if (document.getElementById("size").value === "0") {
            alert("Hãy Chọn Size");
            return false;
        }
        if (document.getElementById("mausac").value === "0") {
            alert("Hãy Chọn Màu");
            return false;
        }
    };

    function chonsize(a) {
        document.getElementById("size").value = a;

    }

    function chonmau(b) {
        document.getElementById("mausac").value = b;
    }


    var buttons = document.querySelectorAll('.btn-default-hong');
    var buttonss = document.querySelectorAll('.btn-default-xanh');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            toggleRedColor(this, buttons);
        });
    });

    buttonss.forEach(function(button) {
        button.addEventListener('click', function() {
            toggleRedColor(this, buttonss);
        });
    });

    function toggleRedColor(clickedButton, buttonGroup) {
        buttonGroup.forEach(function(button) {
            button.classList.remove('red-button');
            button.classList.remove('blue-button');
        });

        clickedButton.classList.add(clickedButton.classList.contains('btn-default-hong') ? 'red-button' : 'blue-button');
    }
    // chuyển hình
    function changeImage(imageSrc) {
        document.getElementById('main-image').src = imageSrc;
    }
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popperjs/popper.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom script - Các file js do mình tự viết -->
<script src="../assets/js/app.js"></script>