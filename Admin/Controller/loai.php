<?php
$act="loai";
$loai = new loai();
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'loai':
        include_once "./View/addloaisanpham.php";
        break;
    
    case 'loai_action':
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            // b1: lấy được file từ server về
            // $file=$_FILES['file']['tmp_name'];
            // thay thế các ký tự xEF,xBB,xBF
            // file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
            // b2: mở file
            // $file_open=fopen($file,"r");
            // b3: đọc dữ liệu ra
            // while(($csv=fgetcsv($file_open,1000,","))!==false)
            // {
            //     $maloai=$csv[0];
            //     $tenloai=$csv[1];
            //     $idmenu=$csv[2];
            //     $db=new connect();
            //     $query="insert into loai(maloai,tenloai,idmenu) values($maloai,'$tenloai',$idmenu)";
            //     $db->exec($query);
            // }
            // echo '<script>alert("Import thành công");</script>';
            // echo '<meta http-equiv=refresh content="0;url=../index.php?action=loai"/>';

            $flag = false;
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    # code...
                    echo "<script>alert('Nhập đầy đủ thông tin')</script>";
                    $flag = false;
                } else {
                    $flag = true;
                }
            }
            if ($flag) {
                // insert vào bảng loai
                $check = $loai->insertLoai($_POST['tenloai']);
                echo "<script>alert('Thêm thành công')</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
            }
        }
        break;
        case "delloai":
            if (isset($_GET['id'])) {
                $maloai = $_GET['id'];
                $delLoai = $loai->delLoai($maloai);
                if ($delLoai) {
                    echo "<script>alert('Bạn vừa xóa 1 loại')</script>";
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                } else {
                    echo "<script>alert('Lỗi')</script>";
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                }
            }
            break;
        case 'update':
            if (isset($_GET['id'])) {
                $tenloai = $loai->getLoaiID($_GET['id']);
                $_SESSION['tenloai'] = $tenloai['tenloai'];
                $_SESSION['maloai'] = $tenloai['maloai'];
                include_once "./View/addloaisanpham.php";
            } else {
                echo "<script>Lỗi</script>";
            }
            break;
        case "update_action":
            if (isset($_SESSION['maloai'])) {
                $maloai = $_SESSION['maloai'];
                $tenloai = $_POST['tenloai'];
                $updateLoai = $loai->updateLoai($maloai, $tenloai);
                if ($updateLoai) {
                    echo "<script>alert('Update thành công')</script>";
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                } else {
                    echo "<script>alert('Lỗi')</script>";
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=loai"/>';
                }
            }
            break;
}
?>