<?php
class xacnhandon
{
    function selectTatCaDon()
    {
        $db = new connect();
        $select = "select * from hoadon a, cthoadon b,khachhang c where a.makh=c.makh and a.masohd=b.masohd group by a.masohd ORDER BY 
                   CASE 
                     WHEN b.trangthai = '0' THEN 1
                     WHEN b.trangthai = '4' THEN 2
                     WHEN b.trangthai = '1' THEN 3
                     WHEN b.trangthai = '2' THEN 4
                     WHEN b.trangthai = '5' THEN 5
                     ELSE 6
                   END";
        $result = $db->getList($select);
        return $result;
    }
    function selectLoaiDon($trangthai)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b,khachhang c where a.masohd=b.masohd and a.makh=c.makh and b.trangthai=$trangthai group by a.masohd order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    function selectThongTinKHLSChiTiet($masohd)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b,khachhang c where a.masohd=b.masohd and a.makh=c.makh and b.masohd=$masohd order by a.masohd desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectThongTinHDonLSChiTiet($masohd)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b where a.masohd=b.masohd and b.masohd=$masohd order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    function updateTinhTrang($masohd)
    { {
            $db = new connect();
            $query = "update cthoadon set trangthai=trangthai+1 WHERE masohd=$masohd";
            $db->exec($query);
        }
    }
    function updateHuyDon($masohd)
    { {
            $db = new connect();
            $query = "update cthoadon set trangthai=3 WHERE masohd=$masohd";
            $db->exec($query);
        }
    }
    function selectLoaiDon1($trangthai)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b,khachhang c where a.masohd=b.masohd and a.makh=c.makh and b.trangthai=$trangthai group by a.masohd order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
}
