<?php
class voucher
{
    function selectAllVoucher()
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $select = "SELECT distinct * from voucher a where a.soluongvoucher>0 and a.ketthuc >= '$ngay'";
        $result = $db->getList($select);
        return $result;
    }
    function selectAllVouCherDaLuu($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $select = "SELECT distinct * from voucher a,voucherdaluu b where a.ketthuc >= '$ngay' and a.mavoucher=b.mavoucher and b.makh=$makh";
        $result = $db->getList($select);
        return $result;
    }
    function selectVouCherDaLuu($makh, $mavoucher)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $select = "SELECT distinct b.mavoucher,b.makh from voucher a,voucherdaluu b where a.ketthuc >='$ngay' and a.mavoucher=b.mavoucher and b.makh=$makh and b.mavoucher=$mavoucher";
        $result = $db->getInstance($select);
        return $result;
    }
    function insertVoucher($makh, $mavoucher)
    {
        $db = new connect();
        $query = "insert into voucherdaluu(makh,mavoucher) values ($makh,$mavoucher)";
        $query1 = "update voucher set soluongvoucher=soluongvoucher-1 where mavoucher=$mavoucher";
        $db->exec($query);
        $db->exec($query1);
    }
    function selectVouCherSuDung($mavoucher)
    {
        $db = new connect();
        $select = "select * from voucher a, voucherdaluu b where a.mavoucher=b.mavoucher and b.mavoucher=$mavoucher";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectShipSuDung($idship)
    {
        $db = new connect();
        $select = "select * from loaiship a where a.idship=$idship";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectAllShip()
    {
        $db = new connect();
        $select = "select * from loaiship order by gia asc";
        $result = $db->getList($select);
        return $result;
    }
    function selectVoucherDangSuDung($makh)
    {
        $db = new connect();
        $select = "select mavoucher from giohang where makh=$makh";
        $result = $db->getInstance($select);
        return $result;
    }
    function updateSuDungVoucher($makh, $mavoucher)
    {
        $db = new connect();
        $query = "UPDATE giohang SET mavoucher= $mavoucher
        WHERE makh = $makh ";
        $result = $db->exec($query);
        return $result;
    }
    function selectShipDangSuDung($makh)
    {
        $db = new connect();
        $select = "select idship from giohang where makh=$makh";
        $result = $db->getInstance($select);
        return $result;
    }
    function updateSuDungShip($makh, $idship)
    {
        $db = new connect();
        $query = "UPDATE giohang SET idship= $idship
        WHERE makh = $makh";
        $result = $db->exec($query);
        return $result;
    }
    function updateLaiVouCherOrder($makh)
    {
        $db = new connect();
        $query = "UPDATE giohang SET mavoucher= 0 where makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
    function deleteVoucherDaSuDung($makh, $mavoucher)
    {
        $db = new connect();
        $query = "DELETE FROM voucherdaluu where makh=$makh and mavoucher=$mavoucher";
        $db->exec($query);
    }
}
