<?php
// unset($_SESSION['cart']);
    // trước khi điều hướng qua View ,
    // thì kiểm tra người dùng có giỏ hàng chưa
    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart']=array();//chữa nhiều hàng, mỗi hàng là 1 object
    }
    $act="giohang";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'giohang':
            include_once "./View/cart.php";
            break;
        
        case 'giohang_action':
            
            // những cái thông tin cần mua
            // nhận được mahh,mausac,size,soluong
            $mahh=0;
            $mausac='';
            $size=0;
            $soluong=0;
            if(isset($_POST['mahh']))
            {
                $mahh= $_POST['mahh'];
                $mausac= $_POST['mymausac'];
                $size= $_POST['size'];
                $soluong= $_POST['soluong'];
                //controller yêu cầu modl add thông tin vào trong giở hàng
                $gh=new giohang();
                $gh->addHangHoa($mahh,$mausac,$size,$soluong);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            }
            break;
            case 'delete_cart':
            // nhận id
            if(isset($_GET['id']))
            {
                $vt=$_GET['id'];
                unset($_SESSION['cart'][$vt]);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            }
            break;
            case 'update_cart':
            // người dùng nhấn submit chuyển thông tin đến server cụ thể là action
            if(isset($_POST['newqty']))
            {   
                $newqty=$_POST['newqty'];
                // dò trong newqty cái nào có số lượng khác với số lượng trong giỏ hàng thì update
                foreach ($newqty as $key => $value){
                    if($_SESSION['cart'][$key]['soluong']!=$value)
                    {
                        $gh=new giohang();
                        $gh->updateHH($key,$value);
                    }
                }
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            break;
    }
    
?>