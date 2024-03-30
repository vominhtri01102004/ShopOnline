<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="nav-icon position-relative text-decoration-none" href="index.php?action=services">
            <ul class="chudau h1">
                <li class="bachudau"><i class="fa-sharp fa-solid fa-t fa-sm"></i></li>
                <li class="bachudau"><i class="fa-sharp fa-solid fa-r fa-lg"></i></li>
                <li class="bachudau"><i class="fa-sharp fa-solid fa-i fa-2xl"></i></li>
            </ul>
        </a>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=home">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=lienhe">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=sanpham&act=sanpham">Hàng Hóa </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=services">Dịch Vụ</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <form action="index.php?action=sanpham&act=timkiem" method="post">
                    <a class="icon-container">
                        <i class="fa fa-fw fa-search text-dark mr-2 icon material-icons"></i>
                        <input type="text" class="input-field" name="txtsearch" placeholder="Tìm Kiếm..." autocomplete="off">
                        <button type="submit" id="btsearch" class="input-button">Tìm</button>
                    </a>
                </form>
                <a class="nav-icon position-relative text-decoration-none" href="index.php?action=giohang">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>

                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            echo count($_SESSION['cart']);
                        }
                        if (!isset($_SESSION['cart'])) {
                            echo '0';
                        }
                        ?>
                    </span>
                </a>
                <div class="yt-spec-button-shape-next__icon" aria-hidden="true">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-10 left-10 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    <div class="sub-table">
                        <?php
                        if (!isset($_SESSION['makh'])) {
                            echo '<ul class="ba"> 
                            <li class="bon" ><a class="sub-link" href="index.php?action=dangnhap"><i class="fa-solid fa-right-to-bracket fa-rotate-180 fa-lg"></i>Đăng Nhập</a></li> 
                            
                            </ul>';
                        }
                        if (isset($_SESSION['makh'])) {
                            $makh = $_SESSION['makh'];
                            $us = new user();
                            $kh = $us->selectThongTinK($makh);
                            $tenkh = $kh['tenkh'];
                            $username = $kh['username'];
                            $email = $kh['email'];
                            $sodt = $kh['sodienthoai'];
                            $dchi = $kh['diachi'];
                            echo '
                              <div>
                              ' . ($username) . '</div><div>' . ($email) . '
                              </div>
                              <hr>
        
        <ul class="ba">
        <li class="bon" ><a class="sub-link" href="index.php?action=dangnhap&act=dangxuat"><i class="fa-solid fa-right-to-bracket fa-rotate-180 fa-lg"></i>Đăng Xuất</a></li>
        <li class="bon" ><a class="sub-link" href="index.php?action=lienhe"><i class="fa-solid fa-right-to-bracket fa-rotate-180 fa-lg"></i>Gửi ý Kiến Phản Hồi</a></li>
        <li class="bon" ><a class="sub-link" href="index.php?action=forget&act=doimatkhau"><i class="fa-solid fa-right-to-bracket fa-rotate-180 fa-lg"></i>Đổi mật Khẩu</a></li>
        <li class="bon" ><a class="sub-link" href="index.php?action=user&act=lichsumuahang"><i class="fa-solid fa-right-to-bracket fa-rotate-180 fa-lg"></i>Lịch Sử Mua Hàng</a></li>
    </ul>';
                        }
                        // }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</nav>
<!-- end menu -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!-- end model -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="Content/jmgquan/54.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success mot"><b class="text">Tri</b> <b class="text">Shop</b></h1>
                            <h3 class="h2"> Đa dạng mẫu mã, chất lượng và phong cách</h3>
                            <p>
                                Cửa hàng quần áo của chúng tôi là nơi bạn có thể tìm thấy sự <strong>đa dạng</strong> về <strong>mẫu mã</strong>,
                                <strong>chất lượng</strong> và <strong>phong cách</strong>. Chúng tôi <strong>cung cấp</strong> một loạt các sản phẩm từ
                                các nhà thiết kế <strong>nổi tiếng</strong>,
                                đáp ứng mọi <strong>nhu cầu </strong>từ công việc hàng ngày đến những <strong> sự kiện</strong> đặc biệt.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid1" src="Content/jmgquan/56.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success hai"><b class="text">Tri </b> <b class="text">Shop</b></h1>
                            <h3 class="h2">Không gian mua sắm thoải mái và dễ chịu</h3>
                            <p>
                                Với một không gian mua sắm <strong>thoải mái</strong> và <strong>dễ chịu</strong>, cửa hàng của chúng tôi mang đến cho bạn
                                <strong>trải nghiệm</strong> mua sắm <strong>tuyệt vời</strong> . Đội ngũ nhân viên <strong>chuyên nghiệp</strong> và thân thiện của chúng tôi
                                sẽ giúp bạn tìm thấy những món đồ <strong>hoàn hảo </strong>phù hợp với <strong>phong cách</strong> và cá nhân của bạn.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid2" src="Content/jmgquan/1.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success ba"><b class="text">Tri </b> <b class="text">Shop</b></h1>
                            <h3 class="h2">Không chỉ là một nơi mua sắm, mà còn là một trải nghiệm </h3>
                            <p>
                                Cửa hàng quần áo <strong>trực tuyến </strong>của chúng tôi không chỉ là một nơi mua sắm,
                                mà còn là một <strong>trải nghiệm</strong> . Chúng tôi <strong>cung cấp</strong> một loạt các sản phẩm thời trang từ các
                                nhà thiết kế <strong>hàng đầu</strong>, với một loạt các lựa chọn về <strong>màu sắc</strong>, <strong>kiểu dáng </strong>và <strong>kích cỡ</strong> .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid3" src="Content/jmgquan/38.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success bon"><b class="text">Tri </b> <b class="text">Shop</b></h1>
                            <h3 class="h2">Cung cấp dịch vụ giao hàng nhanh chóng và tiện lợi </h3>
                            <p>
                                Ngoài ra, chúng tôi còn <strong>cung cấp</strong> dịch vụ giao hàng <strong>nhanh chóng </strong>và <strong>tiện lợi</strong>,
                                giúp bạn có thể nhận được sản phẩm ngay tại nhà mình chỉ sau <strong>vài ngày</strong> đặt hàng.
                                Với chính sách <strong>đổi trả</strong> linh hoạt, chúng tôi <strong>đảm bảo</strong> rằng bạn sẽ <strong>hài lòng </strong>với
                                mỗi lần <strong>mua sắm </strong>tại cửa hàng của chúng tôi. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>