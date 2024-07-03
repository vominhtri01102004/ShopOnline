<?php
class Mau
{
    function getMau()
    {
        $db = new connect();
        $select = "select * from mausac";
        $result = $db->getList($select);
        return $result;
    }
    function insertMau($mau)
    {
        $db = new connect();
        $query = "insert into mausac(Idmau,mausac) values (NULL, '$mau')";
        $result = $db->exec($query);
        return $result;
    }
    function delMau($id)
    {
        $db = new connect();
        $query = "DELETE FROM mausac WHERE `mausac`.`Idmau` = $id";
        $result = $db->exec($query);
        return $result;
    }
    function checkmau($mausac)
    {
        $db = new connect();
        $select = "select * from mausac a where a.mausac='$mausac'";
        $result = $db->getList($select);
        return $result; // trả về array
    }
}
