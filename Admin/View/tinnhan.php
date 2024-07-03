    <div class="col-md-12 p-0">
        <div class="row mb-5">
            <div class="col-md-12 p-0">
                <div class="border bg-white">
                    <div class="col-12 d-flex p-0">
                        <div class="col-4 overflow-auto1 p-3 h-635px">
                            <h4 class="p-2">Đoạn Chat</h4>
                            <form action="index.php?action=tinnhan&act=timkiem" method="post">
                                <div class="icon-container col-12 m-0">
                                    <span class="d-flex border rounded-20px ">
                                        <button class="col-1 bordernone background bgunset" type="submit">
                                            <i class="fa fa-fw fa-search text-dark icon material-icons position-absolute top-20 start-2" ty></i>
                                        </button>
                                        <?php
                                        if (isset($_POST['txtsearch'])) {
                                            $tk = $_POST['txtsearch'];
                                        } else if (isset($_GET['txtsearch'])) {
                                            $tk = $_GET['txtsearch'];
                                        } else {
                                            $tk = '';
                                        }
                                        ?>
                                        <input class="col-10 h-36px bordernone text-decoration-none unforcus fw-normal" required value="<?php echo isset($tk) ?  $tk : '' ?>" type="text" name="txtsearch" placeholder="Tìm Kiếm Trên Messenger" autocomplete="off">
                                    </span>
                                </div>
                            </form>
                            <?php
                            $ac = 1;
                            if (isset($_GET['action'])) {
                                if (isset($_GET['act']) && $_GET['act'] == 'tinnhan') {
                                    $ac = 1;
                                } elseif (isset($_GET['act']) && $_GET['act'] == 'timkiem') {
                                    $ac = 2;
                                } elseif (isset($_GET['act']) && $_GET['act'] == 'tinnhantimkiem') {
                                    $ac = 3;
                                }
                            }
                            if (isset($_POST['makh'])) {
                                $makh = $_POST['makh'];
                            } else if (isset($_GET['makh'])) {
                                $makh = $_GET['makh'];
                            } else {
                                $makh = -1;
                            }
                            $ql = new qlynguoi;
                            $us = new tinnhan();

                            if ($ac == 2 || $ac == 3) {
                                $result = $us->selectTinNhanTimKiem($tk, $ac, $makh);
                                $ketqua = $us->selectTinNhanTimKiem($tk, $ac, $makh)->rowCount();
                                if ($ketqua <= 0) {
                                    $tk = '';
                                    echo '<script> alert("Không Có Kết Quả Này");</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=tinnhan&act=tinnhan"/>';
                                }
                            } else if ($ac == 1) {
                                $result = $us->selectAllTinNhan();
                            }
                            while ($set = $result->fetch()) :
                                $kt1 = $us->selectTinNhanCuoi($set['makh']);
                                if (!empty($kt1)) {
                                    $idtinnhan = $kt1['idtinnhan'];
                                    $idnv = $kt1['idnv'];
                                    $noidung = $kt1['noidung'];
                                    $thoigian2 = $kt1['thoigian2'];
                                    $online1 = $kt1['online'];

                                    $noidung = str_replace('/////', 'Hình Ảnh',  $noidung);
                                } else {
                                    $idtinnhan = 0;
                                    $idnv = -1;
                                    $noidung = '';
                                    $online = -1;
                                }
                                $date = new DateTime('now');
                                $ngay = $date->format('Y-m-d');
                                if ($ngay == date('Y-m-d', strtotime($thoigian2))) {
                                    $thoigian = date('H:i', strtotime($thoigian2));
                                } else {
                                    $thoigian =  date('d/m', strtotime($thoigian2));
                                    $thoigian = str_replace('/', ' Th',  $thoigian);
                                }



                            ?>
                                <div class="col-12 p-0">
                                    <?php if ($ac == 1) { ?>
                                        <a href="index.php?action=tinnhan&act=tinnhan&makh=<?php echo $set['makh'] ?>" class="text-decoration-none">
                                        <?php } else if ($makh == $set['makh']) { ?>
                                            <a href="#" onclick="scrollToId('<?php echo $set['idtinnhan']; ?>',event)" class="text-decoration-none">
                                            <?php } else { ?>
                                                <a href="index.php?action=tinnhan&act=tinnhantimkiem&makh=<?php echo $set['makh'] ?>&txtsearch=<?php echo $tk ?>" class="text-decoration-none">
                                                <?php } ?>
                                                <div class="d-flex mt-4 hover1 rounded-20px">
                                                    <div class="col-2 me-3 p-0">
                                                        <img src="Content/imagetourdien/<?php echo $set['avatar'] ?>" class="rounded-circle wh-56px" alt="">
                                                        <span class="position-absolute <?php echo $ac == 1 ? 'top-67' : 'top-50' ?> start-49 rounded-circle wh-17px text-center align-content-center background-white">
                                                            <i class="fa-solid fa-circle fa-2xs <?php echo $online1 == 0 ? 'offline' : 'online' ?>"></i>
                                                        </span>
                                                    </div>
                                                    <div class="col-10 p-0">
                                                        <div class="col-12 p-0 d-flex">
                                                            <div class="col-8">
                                                                <h5>
                                                                    <?php echo $set['username']; ?>
                                                                </h5>
                                                            </div>
                                                            <div class="col-4 p-0">
                                                                <span class="badge bgunset text-dark">
                                                                    <?php
                                                                    $kh = new tinnhan();
                                                                    $daxem = $kh->selectTinNhanChuaXemID($set['makh'])->rowCount();
                                                                    ?>
                                                                    <?php echo $daxem != 0 ? $daxem . ' Tin Nhắn Mới' : '' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex fw-normal p-0">
                                                            <div class="d-flex col-9 <?php echo $daxem != 0 ? 'fw-bold' : '' ?>">
                                                                <?php
                                                                if ($ac == 1) {
                                                                    echo $idnv != 0  ? 'Bạn:' : ($idnv == -1 ? 'Trống' : '');
                                                                } else {
                                                                    echo $set['idnv'] != 0  ? 'Bạn:' : ($idnv == -1 ? 'Trống' : '');
                                                                } ?>

                                                                <div class="col-12 p-0">
                                                                    <?php
                                                                    if ($ac == 1) {
                                                                        echo (strlen($noidung) > 29 ? substr($noidung, 0, 29) . '...' : $noidung);
                                                                    } else {
                                                                        echo $set['noidung'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="p-0">
                                                                <b class="fw-normal"><?php echo $ac == 1 ? $thoigian : $set['thoigian2']; ?></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                </div>
                            <?php endwhile;
                            if (isset($_GET['makh'])) {
                                $makh = $_GET['makh'];
                            } else {
                                $makh = 0;
                            }
                            if ($makh != 0) {
                                $kh = $ql->selectKhachHangId($makh);
                                if (!empty($kh)) {
                                    $username = $kh['username'];
                                    $avatar = $kh['avatar'];
                                    $online = $kh['online'];
                                } else {
                                    $username = '';
                                } ?>
                        </div>
                        <div class="border-end"></div>
                        <div class="col-8 p-0">
                            <div class="col-12 border d-flex p-2 background">
                                <div class="col-1 p-0">
                                    <img class="col-8 rounded-circle p-0 wh-52px" name="hinh" src="Content/imagetourdien/<?php echo $avatar ?>" alt="">
                                    <span class="position-absolute top-70 start-45 rounded-circle wh-17px text-center align-content-center background-white">
                                        <i class="fa-solid fa-circle fa-2xs <?php echo $online == 0 ? 'offline' : 'online' ?>"></i>
                                    </span>
                                </div>
                                <div class="col-9 p-0 mt-2">
                                    <h5 class="m-0 fs-20">
                                        <?php
                                        echo $username;
                                        ?>
                                    </h5>
                                    <p class="m-0 fs-55 fw-normal text-start">
                                        <?php echo $online == 0 ? 'offline' : 'Đang Hoạt Động' ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 h-520px overflow-auto p-0">
                                <?php
                                $result = $us->selectTinNhan($makh);
                                while ($set = $result->fetch()) :
                                    $us = new tinnhan();
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
                                        $idnvht = 1;
                                    }
                                ?>
                                    <div class="col-12 text-center mt-4 p-0" <?php echo $tg > 600 ? '' : 'hidden' ?>>
                                        <p class="fs-5 m-0 fw-bold"><?php echo $thoigian; ?></p>
                                    </div>
                                    <?php if ($noidungnhanvien != '' || $noidungnhanvien == '/////') { ?>
                                        <div class=" ps-3 pt-0 col-12 justify-content-end d-flex">
                                            <?php if ($noidungnhanvien == '/////') { ?>
                                                <div class="mb-2">
                                                    <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" name="hinh" alt="" class="w-250px rounded-20px">
                                                </div>
                                            <?php } else { ?>
                                                <div class="mw820 text-break col-5 p-3 pe-4 ps-4 background mb-1 rounded-20px border wfit-content bg-mes" id="<?php echo $set['idtinnhan'] ?>">
                                                    <p class="mb-0 fs-4 fw-normal"><?php echo $noidungnhanvien; ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } else if ($noidungnhanvien == ''  || $noidung == '/////') { ?>
                                        <div class="d-flex ps-3 pt-0 col-12 d-flex float-end">
                                            <div class="col-05 align-content-sm-end me-2">
                                                <img class="col-12 rounded-circle p-0 wh-38px" src="Content/imagetourdien/<?php echo $set['avatar'] ?>" alt="" name="hinh" <?php echo $tg > 600 || $idnvht != $idnvcu || $noidung == '/////' ? '' : 'hidden' ?>>
                                            </div>
                                            <?php if ($noidung == '/////') { ?>
                                                <div class="mb-2">
                                                    <img src="Content/imagetourdien/<?php echo $set['hinh']; ?>" name="hinh" alt="" class="w-250px rounded-20px">
                                                </div>
                                            <?php } else { ?>

                                                <div class="col-1105 d-flex float-end">
                                                    <div class="col-12 p-0">
                                                        <p class="offset-05 mb-0 fs-5 text-start" <?php echo $tg > 600 ? '' : 'hidden' ?>><?php echo $set['username']; ?></p>
                                                        <div class="mw820 text-break col-5 p-3 mb-1 pe-4 ps-4 background rounded-20px <?php echo $i == 0 || $idnvht != $idnvcu ? 'borderradiusbottomleftnone' : 'borderradiustopleftnone' ?> border wfit-content" id="<?php echo $set['idtinnhan'] ?>">
                                                            <p class="mb-0 fs-4 fw-normal"><?php echo $set['noidung']; ?></p>
                                                        </div>
                                                    </div>
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
                                <div class="col-12 p-4 d-flex">
                                    <div class="col-2 align-content-end pe-4 pt-1 d-flex justify-content-end">
                                        <form id="submithinh" action="index.php?action=tinnhan&act=nhantinhinh&makh=<?php echo $makh ?>" class="rounded-circle border1 col-3 hover1 d-flex align-items-center ps-2" method="post" enctype="multipart/form-data">
                                            <i class="fa-regular fa-image fa-lg icon" id="fileInputTrigger"></i>
                                            <input type="file" id="fileInput" class="d-none" name="image">
                                        </form>
                                    </div>
                                    <div class="col-10 p-0">
                                        <form action="index.php?action=tinnhan&act=nhantin&makh=<?php echo $makh ?>" class="col-12 d-flex p-0" method="POST">
                                            <input class="col-1105 rounded-20px h-36px border background unforcus p-3" required autocomplete="off" name="tinnhan" type="text" placeholder="Aa">
                                            <div class="text-center col-05 align-content-center">
                                                <button class="col-2 bordernone background disabledorder" type="submit" name="submit">
                                                    <i class="fa-regular fa-paper-plane fa-lg col-12 offset-2 p-0"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .container {
            padding: 0px !important;
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