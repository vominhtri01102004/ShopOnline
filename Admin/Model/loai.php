<?php
    class loai{
        function getLoai()
        {
            $db=new connect();
            $select="select * from loai ";
            $result=$db->getList($select);
            return $result;
        }
        function insertLoai($tenloai) {
            $db = new connect();
            $query = "insert into loai(maloai, tenloai) values (NULL, '$tenloai')";
            $result = $db->exec($query);
            return $result;
        }
        function delLoai($id) {
            $db = new connect();
            $query = "DELETE FROM loai WHERE `loai`.`maloai` = $id";
            $result = $db->exec($query);
            return $result;
        }
        function updateLoai($id, $tenloai) {
            $db = new connect();
            $query = "update loai set tenloai = '$tenloai' where maloai=$id";
            $result = $db->exec($query);
            return $result;
        }
        function getLoaiID($id) {
            $db=new connect();
            $select="select * from loai where maloai = $id";
            $result=$db->getInstance($select);
            return $result;
        }
    }
?>