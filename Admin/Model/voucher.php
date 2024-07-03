<?php
class voucher
{
    function checkShip($tenship)
    {
        $db = new connect();
        $select = "select * from loaiship a where a.tenship='$tenship'";
        $result = $db->getList($select);
        return $result; // trả về array
    }
    function insertShip($tenship, $gia)
    {
        $db = new connect();
        $query = "insert into loaiship(idship, tenship, gia) values (Null,'$tenship',$gia)";
        $result = $db->exec($query);
        return $result;
    }

    function selectAllShip()
    {
        $db = new connect();
        $select = "select * from loaiship order by gia";
        $result = $db->getList($select);
        return $result;
    }
    function updateShip($id, $tenship, $gia)
    {
        $db = new connect();
        $query = "update loaiship a set a.tenship='$tenship', a.gia=$gia where a.idship=$id";
        $result = $db->exec($query);
        return $result;
    }
    function selectShipID($idship)
    {
        $db = new connect();
        $select = "select * from loaiship a where a.idship=$idship";
        $result = $db->getInstance($select);
        return $result;
    }
    function delShip($idship)
    {
        $db = new connect();
        $query = "DELETE a.* FROM loaiship a where a.idship=$idship";
        $result = $db->exec($query);
        return $result;
    }
    function checkVoucher($loai, $toithieu, $toida, $gia)
    {
        $db = new connect();
        $select = "select * from voucher a where a.loaivoucher='$loai' and a.toithieu=$toithieu and toida=$toida and a.giatri=$gia";
        $result = $db->getList($select);
        return $result; // trả về array
    }
    function insertVoucher($loai, $dungcho, $soluong, $toithieu, $toida, $batdau, $ketthuc, $gia)
    {
        $db = new connect();
        $query = "insert into voucher(mavoucher,loaivoucher,dungcho,soluongvoucher,toithieu,toida,batdau,ketthuc, giatri) values (Null,'$loai','$dungcho',$soluong,$toithieu,$toida,'$batdau','$ketthuc',$gia)";
        $result = $db->exec($query);
        return $result;
    }

    function selectAllVoucher()
    {
        $db = new connect();
        $select = "select * from voucher order by dungcho";
        $result = $db->getList($select);
        return $result;
    }
    function updateVoucher($mavoucher, $loai, $dungcho, $soluong, $toithieu, $toida, $batdau, $ketthuc, $gia)
    {
        $db = new connect();
        $query = "update voucher a set a.loaivoucher='$loai',a.dungcho='$dungcho',a.soluongvoucher=$soluong,a.toithieu=$toithieu,a.toida=$toida,a.batdau='$batdau',a.ketthuc='$ketthuc',a.giatri=$gia where a.mavoucher=$mavoucher";
        $result = $db->exec($query);
        return $result;
    }
    function selectVoucherID($mavoucher)
    {
        $db = new connect();
        $select = "select * from voucher a where a.mavoucher=$mavoucher";
        $result = $db->getInstance($select);
        return $result;
    }
    function delVoucher($mavoucher)
    {
        $db = new connect();
        $query = "DELETE a.*,b.* FROM voucher a, voucherdaluu b where a.mavoucher=$mavoucher";
        $result = $db->exec($query);
        return $result;
    }
}
