<?php
    class cthanghoa{
        function insertCTHangHoa($idhanghoa,$idsize,$soluongton)
        {
            $db=new connect();
            $query="insert into cthanghoa(idhanghoa, idsize, soluongton) values ($idhanghoa,$idsize,$soluongton)";
            $result=$db->exec($query);
            return $result;
        }
    }
?>