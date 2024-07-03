<?php
        $act="thankyou";
        if(isset($_GET['act']))
        {
            $act=$_GET['act'];
        }
        switch ($act) {
            case 'thankyou':
                include_once "./View/thankyou.php";
                
                break;
            case 'thanks':
            include_once "./View/thanks.php";
                break;
        }
?>