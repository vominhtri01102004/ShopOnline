    <div class="container">
        <div class="col-md-12">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border bg-white">
                        <div class="col-12 d-flex">
                            <div class="col-4 overflow-auto1 p-3 h-635px">
                                <h5>Đoạn Chat</h5>
                                <form action="index.php?action=tinnhan&act=timkiem" method="post">
                                    <div class="icon-container col-12 m-0">
                                        <span class="d-flex border rounded-20px ">
                                            <button class="col-1 bordernone background bgunset" type="submit">
                                                <i class="fa fa-fw fa-search text-dark icon material-icons position-absolute top-20 start-2" ty></i>
                                            </button>
                                            <?php
                                            if (isset($_POST['txtsearch'])) {
                                                $tk = $_POST['txtsearch'];
                                            }
                                            if (isset($_GET['txtsearch'])) {
                                                $tk = $_GET['txtsearch'];
                                            }
                                            ?>
                                            <input class="col-10 h-36px bordernone text-decoration-none unforcus fw-normal" value="<?php echo isset($tk) ? $tk : '' ?>" type="text" name="txtsearch" placeholder="Tìm Kiếm Trên Messenger" autocomplete="off">
                                        </span>
                                    </div>
                                </form>
                                <?php
                                $ac = 1;
                                if (isset($_GET['action'])) {
                                    if (isset($_GET['act']) && $_GET['act'] == 'tinnhan') {
                                        $ac = 1;
                                    } elseif (isset($_GET['act']) && $_GET['act'] == 'timkiem' || $_GET['act'] == 'tinnhantimkiem') {
                                        $ac = 2;
                                    }
                                }
                                $us = new user();
                                $kh = $us->selectTinNhanCuoi($makh);
                                if (!empty($kh)) {
                                    $idtinnhan = $kh['idtinnhan'];
                                    $idnv = $kh['idnv'];
                                    $thoigian2 = $kh['thoigian2'];
                                    $noidung = $kh['noidung'];
                                    $noidung = str_replace('/////', 'Hình Ảnh',  $noidung);
                                } else {
                                    $idtinnhan = 0;
                                    $idnv = -1;
                                    $noidung = '';
                                    $thoigian2 = 0;
                                }
                                $date = new DateTime('now');
                                $ngay = $date->format('Y-m-d');
                                if ($ngay == date('Y-m-d', strtotime($thoigian2))) {
                                    $thoigian = date('H:i', strtotime($thoigian2));
                                } else {
                                    $thoigian =  date('d/m ', strtotime($thoigian2));
                                    $thoigian = str_replace('/', ' Th',  $thoigian);
                                }
                                ?>
                                <?php if ($ac == 1) { ?>
                                    <div class="col-12">
                                        <a href="index.php?action=tinnhan&act=tinnhan&makh=<?php echo $_SESSION['makh'] ?>" class="text-decoration-none">
                                            <div class="d-flex mt-4 hover1 rounded-20px">
                                                <div class="col-2 me-3">
                                                    <img src="Content/imagetourdien/admin.jpg" class="rounded-circle" alt="">
                                                </div>
                                                <div class="col-10">
                                                    <div class="col-12 p-0 d-flex">
                                                        <div class="col-8">
                                                            <h5>
                                                                Tri Shop
                                                            </h5>
                                                        </div>
                                                        <div class="col-4 p-0">
                                                            <span class="badge bgunset text-dark">
                                                                <?php
                                                                if (isset($_GET['makh'])) {
                                                                    $makh = $_GET['makh'];
                                                                } else {
                                                                    $makh = 0;
                                                                }
                                                                $kh = new user();
                                                                $daxem = $kh->selectTinNhanChuaXemID($_SESSION['makh'])->rowCount();
                                                                ?>
                                                                <?php echo $daxem != 0 ? $daxem . ' Tin Nhắn Mới' : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex fw-normal">
                                                        <div class="d-flex col-9">
                                                            <b><?php echo $idnv == 0  ? 'Bạn:' : ($idnv == -1 ? 'Trống' : '') ?></b>
                                                            <div class="col-12  <?php echo $daxem != 0 ? 'fw-bold' : '' ?>">
                                                                <?php
                                                                echo (strlen($noidung) > 29 ? substr($noidung, 0, 29) . '...' : $noidung) ?>
                                                            </div>
                                                        </div>
                                                        <div class="fs-6">
                                                            <b> <?php echo $idnv == -1  ?  '' : $thoigian ?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php } else {
                                    $result = $us->selectTinNhanTimKiem($makh, $tk);
                                    $ketqua = $us->selectTinNhanTimKiem($makh, $tk)->rowCount();
                                    if ($ketqua <= 0) {
                                        echo '<script> alert("Không Có Kết Quả Này");</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=tinnhan&act=tinnhan&makh=' . $makh . '"/>';
                                    }
                                    while ($set = $result->fetch()) :
                                    ?>
                                        <div class="col-12">
                                            <a href="#" onclick="scrollToId('<?php echo $set['idtinnhan']; ?>',event)" class="text-decoration-none">
                                                <div class="d-flex mt-4 hover1 rounded-20px">
                                                    <div class="col-2 me-3">
                                                        <img src="Content/imagetourdien/admin.jpg" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="col-10">
                                                        <div class="col-12 p-0 d-flex">
                                                            <div class="col-8">
                                                                <h5>
                                                                    Tri Shop
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex fw-normal">
                                                            <div class="d-flex col-8">
                                                                <b><?php echo $set['idnv'] == 0  ? 'Bạn:' : ($set['idnv'] == -1 ? 'Trống' : '') ?></b>
                                                                <div class="col-12">
                                                                    <?php
                                                                    echo (strlen($set['noidung']) > 29 ? substr($set['noidung'], 0, 29) . '...' : $set['noidung']) ?>
                                                                </div>
                                                            </div>
                                                            <div class="fs-6 col-4">
                                                                <b> <?php echo $set['thoigian2']; ?></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?php endwhile;
                                } ?>
                            </div>
                            <div class="border-end"></div>
                            <?php if ($makh != 0) { ?>
                                <div class="col-8">
                                    <div class="col-12 border d-flex p-2 background">
                                        <div class="col-1">
                                            <img class="col-8 rounded-circle" src="Content/imagetourdien/admin.jpg" alt="">
                                            <!-- <span class="position-absolute top-14 start-38 rounded-circle wh-20px text-center lh-normal bg-white">
                                                <i class="fa-solid fa-circle fa-2xs online"></i>
                                            </span> -->
                                        </div>
                                        <div class="col-7">
                                            <h5 class="m-0">Tri Shop</h5>
                                            <!-- <p class="m-0 fs-09 fw-normal">Đang Hoạt Động</p> -->
                                        </div>
                                    </div>
                                    <div class="col-12 h-500px overflow-auto">
                                        <?php
                                        $result = $us->selectTinNhan($makh);
                                        while ($set = $result->fetch()) :
                                            $us = new user();
                                            $kh = $us->selectTinNhanID($set['idtinnhan']);
                                            $username = $kh['username'];
                                            $idnvcu = $kh['idnv'];
                                            if ($kh['idnv'] != 0) {
                                                $noidungnhanvien = $kh['noidung'];
                                                $noidung = '';
                                            } else {
                                                $noidung = $kh['noidung'];
                                                $noidungnhanvien = '';
                                            }
                                            $thoigian2 = $kh['thoigian2'];
                                            $date = new DateTime('now');
                                            $ngay = $date->format('Y-m-d');
                                            if ($ngay == date('Y-m-d', strtotime($thoigian2))) {
                                                $thoigian = date('H:i', strtotime($thoigian2));
                                            } else {
                                                $thoigian =  date('d/m . H:i', strtotime($thoigian2));
                                                $thoigian = str_replace('.', 'Lúc', $thoigian);
                                                $thoigian = str_replace('/', ' Th ',  $thoigian);
                                            }
                                            $thoigian1 = $kh['thoigian1'];
                                            $thoigian2 = $kh['thoigian2'];
                                            $thoigian_timestamp = strtotime($thoigian1);
                                            $thoigian2_timestamp = strtotime($thoigian2);
                                            $tg = $thoigian2_timestamp - $thoigian_timestamp;
                                            if ($tg > 600) {
                                                $i = 0;
                                            } else {
                                                $i = 99;
                                            }
                                            $idtinnhancu = $set['idtinnhan'] - 1;
                                            $khcu = $us->selectTinNhanIDCu($idtinnhancu);
                                            if (!empty($khcu)) {
                                                $idnvht = $khcu['idnv'];
                                            } else {
                                                $idnvht = 0;
                                            }
                                        ?>
                                            <div class="col-12 text-center mt-4" <?php echo $tg > 600 ? '' : 'hidden' ?>>
                                                <h6 class="fs-09 m-0"><?php echo $thoigian; ?></h6>
                                            </div>
                                            <?php if ($noidungnhanvien != ''  || $noidungnhanvien == '/////') { ?>
                                                <div class="d-flex ps-3 pt-0 col-12">
                                                    <div class="col-05 align-content-sm-end me-2">
                                                        <img class="col-12 rounded-circle" src="Content/imagetourdien/admin.jpg" alt="" <?php echo $tg > 600 || $idnvht != $idnvcu || $noidungnhanvien == '/////' ? '' : 'hidden' ?>>
                                                    </div>
                                                    <div class="col-11">
                                                        <?php if ($noidungnhanvien == '/////') { ?>
                                                            <div class="mb-2">
                                                                <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" name="hinh" alt="" class="w-250px rounded-20px">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="col-12" <?php echo $tg > 600 ? '' : 'hidden' ?>>
                                                                <p class="offset-05 mb-0 fs-09"><?php echo $set['username']; ?></p>
                                                            </div>
                                                            <div class="mw820 text-break col-5 p-2 pe-4 ps-4 background mb-1 rounded-20px <?php echo $i == 0 || $idnvht != $idnvcu ? 'borderradiusbottomleftnone' : 'borderradiustopleftnone' ?> border wfit-content" id="<?php echo $set['idtinnhan'] ?>">
                                                                <p class="mb-0 fs-messenger fw-normal"><?php echo $noidungnhanvien; ?></p>

                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } else if ($noidungnhanvien == '' || $noidung == '/////') { ?>
                                                <div class="d-flex ps-3 pt-0 col-12 justify-content-end float-end">

                                                    <?php if ($noidung == '/////') { ?>
                                                        <div class="mb-2">
                                                            <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" name="hinh" alt="" class="w-250px rounded-20px">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="mw820 text-break col-6 p-2 pe-4 ps-4 background mb-1 rounded-20px border wfit-content bg-mes" id="<?php echo $set['idtinnhan'] ?>">
                                                            <p class="mb-0 fs-messenger fw-normal"><?php echo $set['noidung']; ?></p>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        <?php
                                            $i++;
                                        endwhile;
                                        echo '<div id="bottom"></div>';
                                        ?>
                                    </div>
                                    <div class="border">
                                        <div class="col-12 p-3 d-flex">
                                            <div class="col-2 align-content-end pe-4 pt-1 d-flex justify-content-end">
                                                <form id="submithinh" action="index.php?action=tinnhan&act=nhantinhinh&makh=<?php echo $makh ?>" class="rounded-circle border1 col-3 hover1 d-flex align-items-center ps-2" method="post" enctype="multipart/form-data">
                                                    <i class="fa-regular fa-image fa-lg icon" id="fileInputTrigger"></i>
                                                    <input type="file" id="fileInput" class="d-none" name="image">
                                                </form>
                                            </div>
                                            <div class="col-10">
                                                <form action="index.php?action=tinnhan&act=nhantin&makh=<?php echo $makh ?>" class="col-12 d-flex" method="post">
                                                    <input class="col-1105 rounded-20px h-36px border background unforcus p-3" required autocomplete="off" name="tinnhan" type="text" placeholder="Aa">
                                                    <div class="text-center col-05 align-content-center">
                                                        <button class="col-2 bordernone background disabledorder" type="submit" name="submit">
                                                            <i class="fa-regular fa-paper-plane fa-lg col-12 offset-2"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .container {
            padding: 0px !important;
        }

        .hover1:hover {
            background: #F0F0F0 !important;

        }
    </style>
    <script>
        document.getElementById("fileInputTrigger").addEventListener("click", function() {
            document.getElementById("fileInput").click();
        });
        document.addEventListener("DOMContentLoaded", function() {
            var bottomElement = document.getElementById("bottom");
            var overflowContainer = document.querySelector(".overflow-auto");
            if (bottomElement && overflowContainer) {
                overflowContainer.scrollTop = overflowContainer.scrollHeight;

            }
        });

        function scrollToId(id, event) {
            event.preventDefault();
            var element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'end'

                });
                element.style.backgroundColor = 'rgb(205, 198, 193) ';

            }
        }

        document.getElementById("fileInput").addEventListener("change", function() {
            submitForm();
        });

        function submitForm() {
            var form = document.getElementById('submithinh');
            form.submit();
        }
    </script>