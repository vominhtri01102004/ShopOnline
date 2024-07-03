<?php
class Page
{
    // phương thức tính số trang dựa vào tổng số sp và limit
    function findPage($count, $limit)
    {
        $page = (($count % $limit) == 0 ? $count / $limit : ceil($count / $limit));
        return $page; //2
    }
    //phương thức tính start bắt đầu caanf lấy giá trị trong sql
    // dựa vào curent_page trên URL, thông qua biến tự đặt tên là page

    function  findStart($limit)
    {
        if (!isset($_GET['page']) || $_GET['page'] == 1) {
            $start = 0;
        } else {
            $start = ($_GET['page'] - 1) * $limit;
        }
        return $start; //8
    }




    // function findPagesale($count, $limit)
    // {
    //     $page = (($count % $limit) == 0 ? $count / $limit : ceil($count / $limit));
    //     return $page; //2
    // }
    // function  findStartsale($limit)
    // {
    //     if (!isset($_GET['page']) || $_GET['page'] == 1) {
    //         $start = 0;
    //     } else {
    //         $start = ($_GET['page'] - 1) * $limit;
    //     }
    //     return $start; //8
    // }
}
