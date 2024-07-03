<?php
class binhluan
{
    function insertBinhLuan($idkh, $idhanghoa, $content, $diem)
    {
        $db = new connect();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = new DateTime('now');
        $timebl = $date->format('Y-m-d H:i:s');
        $query = "insert into comment(idcomment, idkh, idhanghoa, content, diem, thoigian,thich) values(null,$idkh, $idhanghoa, '$content', $diem, '$timebl',0)";
        $db->exec($query);
    }

    function selectBinhLuan($idhanghoa)
    {
        $db = new connect();
        $select = "SELECT distinct a.username,a.avatar, b.content, b.thoigian, b.diem,b.idcomment,b.thich,b.idhanghoa from khachhang a, comment b where a.makh = b.idkh and b.idhanghoa = $idhanghoa order by b.thoigian desc";
        $result = $db->getList($select);
        return $result;
    }
    function selectBinhLuanDaThich($makh, $idcomment)
    {
        $db = new connect();
        $select = "SELECT distinct  * from commentthich a where a.idcomment=$idcomment and a.makh=$makh";
        $result = $db->getInstance($select);
        return $result;
    }
    function updateBinhLuan($idcomment, $thich, $makh)
    {
        $db = new connect();
        $query = "insert into commentthich(idcomment,makh) values ($idcomment,$makh)";
        $query1 = "update comment set thich=$thich WHERE idcomment=$idcomment";
        $db->exec($query);
        $db->exec($query1);
    }
    function updateBoBinhLuan($idcomment, $makh)
    {
        $db = new connect();
        $query = "DELETE FROM commentthich where idcomment=$idcomment and makh=$makh";
        $query1 = "update comment set thich=thich-1 WHERE idcomment=$idcomment";
        $db->exec($query);
        $db->exec($query1);
    }
}
