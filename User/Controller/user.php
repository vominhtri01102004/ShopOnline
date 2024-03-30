<?php
    $act = "user";  
    $makh = $_SESSION['makh'];
    $user = new user();
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case "lichsumuahang":
                include_once "./View/lichsumuahang.php";
            break;
    }

?>