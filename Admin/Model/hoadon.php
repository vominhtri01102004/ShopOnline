<?php
class hoadon
{
    function getNam()
    {
        $db = new connect();
        $select = "SELECT DISTINCT YEAR(a.ngaydat) AS nam FROM hoadon a ,cthoadon b where a.masohd=b.masohd and b.trangthai=2 ORDER BY nam ASC";
        $result = $db->getList($select);
        return $result;
    }
    function getThang()
    {
        $db = new connect();
        $select = "SELECT DISTINCT MONTH(a.ngaydat) AS thang FROM hoadon a ,cthoadon b where a.masohd=b.masohd and b.trangthai=2 ORDER BY thang ASC";
        $result = $db->getList($select);
        return $result;
    }
    function getNamTrangThai()
    {
        $db = new connect();
        $select = "SELECT DISTINCT YEAR(a.ngaydat) AS nam FROM hoadon a ,cthoadon b where a.masohd=b.masohd ORDER BY nam ASC";
        $result = $db->getList($select);
        return $result;
    }
    function getThangTrangThai()
    {
        $db = new connect();
        $select = "SELECT DISTINCT MONTH(a.ngaydat) AS thang FROM hoadon a ,cthoadon b where a.masohd=b.masohd ORDER BY thang ASC";
        $result = $db->getList($select);
        return $result;
    }
}
