<?php
    $act="loai";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'loai':
            include_once "./View/addloaisanpham.php";
            break;
        
        case 'loai_action':
            if(isset($_POST['submit']))
            {
                // b1: lấy đc file, lấy từ server, cụ thể $_FILES
                $file=$_FILES['file']['tmp_name'];
                // lấy về vì nó là file csv nên có thểm các ký tự đặc biệt xBB,xEF,xBF
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                // b2: thực hiện mở file ra
                $file_open=fopen($file,"r");
                //b3: đọc nội dung trong file
                while(($csv=fgetcsv($file_open,1000,","))!==false)
                {
                    $maloai=$csv[0];
                    $tenloai=$csv[1];
                    $idmenu=$csv[2];
                    $db=new connect();
                    $query="insert into loai (maloai,tenloai,idmenu) values($maloai,'$tenloai',$idmenu)";
                    $db->exec($query);
                }
                fclose($file_open);
                echo '<script>alert("Import thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=loai"/>';
            }
            break;
    }
?>