<?php
    class size{
        function getSize() {
            $db = new connect();
            $select = "select * from sizegiay";
            $result = $db->getList($select);
            return $result;
        }
        function insertSize($size) {
            $db = new connect();
            $query = "insert into sizegiay(Idsize,size) values (NULL, '$size')";
            $result = $db->exec($query);
            return $result;
        }
        function delSize($id) {
            $db = new connect();
            $query = "DELETE FROM sizegiay WHERE `sizegiay`.`Idsize` = $id";
            $result = $db->exec($query);
            return $result;
        }
    }

?>