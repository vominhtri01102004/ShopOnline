<?php
    function uploadImage()
    {
        // B1: tạo được được đường dẫn chứa hình
        $target_dir="../../DuAnMau/Content/imagetourdien/";
        // b2: lấy tên hình từ server về gán vào trong đường dẫn trên
        //$target_file="../../DuAnMau/Content/imagetourdien/hinh1.jpg";
        $target_file=$target_dir.basename($_FILES['image']['name']);
        // cần kiểm tra xem hình có được uplen server hay không
        $upload=1;
        if(isset($_POST['submit']))
        {
            $check=getimagesize($_FILES['image']['tmp_name']);
            // $check=$_FILES['image']['size']
            if($check!==false)
            {
                $upload=1;
            }
            else
            {
                $upload=0;
            }
        }
        // kiểm tra xem hình có tồn tại hay chưa
        if(file_exists($target_file))
        {
            echo '<script>alert("Hình đã tồn tại");</script>';
            $upload=0;
        }
        // kiểm tra xem hình lấy từ server về có vượt quá dung lượng hay không
        // 500kb=500000b
        if($_FILES['image']['size']>500000)
        {
            echo '<script>alert("Hình vượt quá dung lượng");</script>';
            $upload=0;
        }
        // có phải hình hay không, lấy phần mở rộng
        $imagefileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imagefileType!="jpg"&& $imagefileType!="jpeg"&& $imagefileType!="png"&& $imagefileType!="gif")
        {
            echo '<script>alert("Ko phải hình");</script>';
            $upload=0;
        }
        // tiến hành upload
        if($upload==1)
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
            {
                echo '<script>alert("Upload hình thành công");</script>';
            }
            else
            {
                echo '<script>alert("Upload hình ko thành công");</script>';
            }
        }
    }
?>