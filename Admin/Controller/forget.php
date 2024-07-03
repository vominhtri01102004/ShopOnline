<?php
$act = 'forget';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forget':
        include_once "./View/forgetpassword.php";
        break;

    case 'forget_action':
        if (isset($_POST['submit_email'])) {
            $email = $_POST['email']; //lequocanh40029081@gmail.com
            // tạo mảng lưu thông tin email và passnew
            $_SESSION['emailrepass'] = $email;
            $_SESSION['email'] = array();
            // kiểm tra xem email có tồn tại trong database không
            $kh = new qlynguoi();
            $checkuser = $kh->checkEmail($email)->rowCount();
            if ($checkuser > 0) {
                // cấp mã code ngẫu nhiên, hay pass mới
                $code = random_int(1000, 1000000); //34567
                $_SESSION['code_creation_time'] = time();
                // tạo đối tượng
                $item = array(
                    'id' => $code,
                    'email' => $email,
                );
                // add vào session
                $_SESSION['email'][] = $item; //$_SESSION['email]=array(id:187796,email:lequocanh40029081@gmail.com)
                // tiến hành gửi mail
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // GMAIL username to:
                // $mail->Username = "php22023@gmail.com";//
                $mail->Username = "vominhtri01102004@gmail.com"; //
                // GMAIL password
                // $mail->Password = "php22023ngoc";
                $mail->Password = "yoxs nqbp hsba ttxm"; //Phplytest20@php
                $mail->SMTPSecure = "tls";  // ssl
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = "587"; // 465
                $mail->From = 'vominhtri01102004@gmail.com';
                $mail->FromName = 'Tri';
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($email, 'reciever_name');
                $mail->Subject = 'Email Đổi Mặt Khẩu';
                $mail->IsHTML(true);
                $mail->Body = 'Cấp lại mã code ' . $code . '';
                if ($mail->Send()) {
                    echo '<script> alert("Check Your Email and Click on the 
                        link sent to your email");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=resetpassword"/>';
                    break;
                } else {
                    echo "Mail Error - >" . $mail->ErrorInfo;
                    include "./View/forgetpassword.php";
                    break;
                }
                // include "./View/resetpw.php";
            } else {
                echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                include "./View/forgetpassword.php";
                break;
            }
        }
        break;
    case 'resetpassword':
        include_once "./View/resetpw.php";
        break;

    case 'resetpass':
        if (isset($_SESSION['code_creation_time']) && (time() - $_SESSION['code_creation_time']) > 90) {
            echo '<script> alert("Mã Code đã hết hạn. Vui lòng yêu cầu lại mã.");</script>';
            include "./View/forgetpassword.php";
            break;
        }
        //nhận pass new mà người dùng nhập vào
        if (isset($_POST['submit_password'])) {
            $pass = $_POST['password'];
            $email = $_POST['email'];
            //dò lại trong session, đối tượng nào có pass giống với pass đó
            foreach ($_SESSION['email'] as $key => $item) {
                if ($item['id'] == $pass) {
                    $salfF = "G435#";
                    $salfL = "T34a!&";
                    $passnew = md5($salfF . $pass . $salfL);
                    //với id đó lấy lại email của người gửi email
                    $emailold = $item['email'];
                    $kh = new qlynguoi();
                    $kh->updateEmail($emailold, $passnew);
                    include "./View/doimatkhau.php";
                    break;
                } else {
                    echo '<script> alert("Mã Code Khfffông Hợp Lệ");</script>';
                    include "./View/resetpw.php";
                    break;
                }
            }
        }
        break;
    case 'doimatkhau':
        include_once "./View/doimatkhau.php";
        break;
    case 'doimatkhauemail':
        include_once "./View/doimatkhau.php";
        break;
    case 'doimatkhau_action':
        if (isset($_POST['doimatkhau'])) {
            $passcu = $_POST['passcu'];
            $passmoi = $_POST['passmoi'];
            $passmoi1 = $_POST['passmoi1'];
            $salfF = "G435#";
            $salfL = "T34a!&";
            $kh = new qlynguoi();
            $checkmkhau = $kh->getAdmin($idnv);
            if (md5($salfF . $passcu . $salfL) == $checkmkhau['matkhau']) {
                $passmoi = md5($salfF . $passmoi1 . $salfL);
                $kh->DoiMatKhau($idnv, $passmoi);
                echo '<script> alert("Đổi Mật Khẩu Thành Công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                break;
            } else {
                echo '<script> alert("Mật Khẩu Cũ Không Đúng");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=doimatkhau"/>';
                break;
            }
        }
        break;
    case 'doimatkhau_actionemail':
        if (isset($_POST['doimatkhau'])) {
            $email = $_SESSION['emailrepass'];
            $pass = $_POST['passcuemail'];
            $passmoi = $_POST['passmoi'];
            $salfF = "G435#";
            $salfL = "T34a!&";
            $passold = md5($salfF . $pass . $salfL);
            $kh = new qlynguoi();
            $logkhemail = $kh->logNhanVienemail($email, $passold);
            if ($logkhemail) {
                $passnew = md5($salfF . $passmoi . $salfL);
                $kh->DoiMatKhauemail($email, $passnew);
                echo '<script> alert("Đổi Mật Khẩu Thành Công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
                break;
            } else {

                echo '<script> alert("Đổi Mật Khẩu Không Thành Công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=doimatkhauemail"/>';
                break;
            }
        } else {
            echo '<script> alert("Lỗi");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            break;
        }
}
