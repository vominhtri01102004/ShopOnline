<?php
class hoadon
{
    function insertHoaDon($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien) values(Null,$makh,'$ngay',0)";
        $db->exec($query);
        $select = "select a.masohd from hoadon a order by a.masohd desc limit 1";
        $masohd = $db->getInstance($select);
        return $masohd[0];
    }
    function insertCTHoaDon($masohd, $mahh, $soluongmua, $mausac, $size, $thanhtien)
    {
        $db = new connect();
        $query = "insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien,tinhtrang)
            values ($masohd,$mahh,$soluongmua,'$mausac',$size,$thanhtien,0)";
        $db->exec($query);
    }
    function updateTongTien($masohd, $makh, $tongtien)
    {
        $db = new connect();
        $query = "update hoadon set tongtien=$tongtien WHERE masohd=$masohd and makh=$makh";
        $db->exec($query);
    }
    function selectThongTinKH($masohd)
    {
        $db = new connect();
        $select = "select a.masohd,b.username,b.email,b.tenkh,b.diachi,b.sodienthoai,a.ngaydat
            from hoadon a,khachhang b WHERE a.makh=b.makh and a.masohd=$masohd";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectThongTinHoaDon($masohd)
    {
        $db = new connect();
        $select = "select DISTINCT a.tenhh,c.mausac,c.size,b.dongia,c.soluongmua,b.giamgia
        from hanghoa a, cthanghoa b, cthoadon c
        WHERE a.mahh=b.idhanghoa and a.mahh=c.mahh and c.masohd=$masohd";
        $result = $db->getList($select);
        return $result;
    }
    function updateSoLuongTon($mahh, $soluongmua)
    {
        $db = new connect();
        $query = "update cthanghoa set soluongton=soluongton-$soluongmua WHERE idhanghoa=$mahh;";
        $db->exec($query);
    }

}
?>