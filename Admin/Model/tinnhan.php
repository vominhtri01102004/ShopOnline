<?php
class tinnhan
{
    function insertTinNhan($makh, $idnv, $thoigian1, $thoigian2, $noidung, $hinh)
    {
        $db = new connect();
        $query = "INSERT INTO tinnhan (idtinnhan,makh,idnv,thoigian1,thoigian2,noidung,hinh,daxem)
            VALUES (Null,$makh, $idnv,'$thoigian1','$thoigian2','$noidung','$hinh',0)";
        // exec
        $result = $db->exec($query);
        return $result;
    }
    function selectAllTinNhan()
    {
        $db = new connect();
        $select = "select a.*,b.username,b.avatar from tinnhan a,khachhang b where a.makh=b.makh group by a.makh order by a.idtinnhan desc";
        $result = $db->getList($select);
        return $result;
    }
    function selectTinNhanCuoi($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username,b.avatar,b.online from tinnhan a, khachhang b where a.makh=b.makh and a.makh=$makh order by a.idtinnhan desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhanID($idtinnhan)
    {
        $db = new connect();
        $select = "select a.*,b.username,b.avatar from tinnhan a, khachhang b where a.makh=b.makh and a.idtinnhan=$idtinnhan order by a.idtinnhan desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhanIDCu($idtinnhan)
    {
        $db = new connect();
        $select = "select a.idnv from tinnhan a, khachhang b where a.makh=b.makh and a.idtinnhan=$idtinnhan order by a.idtinnhan desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhan($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username,b.avatar from tinnhan a, khachhang b where a.makh=b.makh and b.makh=$makh order by a.idtinnhan asc";
        $result = $db->getList($select);
        return $result;
    }
    function selectTinNhanChuaXem()
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and a.idnv=0 and daxem=0 order by a.idtinnhan asc";
        $result = $db->getList($select);
        return $result;
    }
    function selectTinNhanChuaXemID($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and a.idnv=0 and a.makh=$makh and daxem=0 order by a.idtinnhan asc";
        $result = $db->getList($select);
        return $result;
    }
    function updateTinNhanDaXem($makh)
    {
        $db = new connect();
        $query = "update tinnhan a set a.daxem=1 where a.idnv=0 and a.makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
    function selectTinNhanTimKiem($tk, $ac, $makh)
    {
        $db = new connect();
        if ($ac == 2) {
            $select = "select a.*,b.username,b.avatar from tinnhan a, khachhang b where a.makh=b.makh and a.noidung like '%$tk%' order by a.idtinnhan desc";
        }
        if ($ac == 3) {
            $select = "select a.*,b.username,b.avatar from tinnhan a, khachhang b where a.makh=b.makh and a.noidung like '%$tk%' order by  case 
            when a.makh= $makh Then 1
            else 2
            end,a.idtinnhan desc";
        }
        $result = $db->getList($select);
        return $result;
    }
}
