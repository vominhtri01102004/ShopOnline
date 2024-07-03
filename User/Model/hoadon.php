<?php
class hoadon
{
    function selectSHD()
    {
        $db = new connect();
        $select = "SELECT masohd from hoadon order by masohd desc limit 1";
        $mahd = $db->getInstance($select);
        if (!$mahd) {
            return null;
        } else {
            return $mahd;
        }
    }
    function selectSHDlogin($makh)
    {
        $db = new connect();
        $select = "SELECT a.masohd from hoadon a,khachhang b where a.makh=b.makh and b.makh=$makh";
        $mahd = $db->getInstance($select);
        if (!$mahd) {
            return null;
        } else {
            return $mahd[0];
        }
    }
    function selectThongTinKHHD($makh)
    {
        $db = new connect();
        $select = "SELECT a.tenkh, a.diachi, a.sodienthoai 
        FROM khachhang a  WHERE a.makh = $makh";
        $result = $db->getInstance($select);
        return $result;
    }
    function insertHoaDon($makh, $tongtien, $tienship, $vouchership, $voucherhanghoa, $ghichu, $tenkh, $dc, $sodt)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien,tienship,vouchership,voucherhanghoa,ghichu,tenkh,diachi,sodienthoai) values(Null,$makh,'$ngay',$tongtien,$tienship,$vouchership,$voucherhanghoa,'$ghichu','$tenkh','$dc','$sodt')";
        $db->exec($query);
        $select = "select a.masohd from hoadon a order by a.masohd desc limit 1";
        $masohd = $db->getInstance($select);
        return $masohd[0];
    }

    function insertCTHoaDon($masohd, $mahh, $soluongmua, $mausac, $size, $dongia, $giamgia, $tenloai, $thanhtien, $hinh, $tenhh)
    {
        $db = new connect();
        $query = "insert into cthoadon(masohd,mahh,soluongmua,mausac,size,dongia,giamgia,loai,thanhtien,trangthai,hinh,tenhh)
            values ($masohd,$mahh,$soluongmua,'$mausac','$size',$dongia,$giamgia,'$tenloai',$thanhtien,0,'$hinh','$tenhh')";

        $db->exec($query);
    }
    function selectThongTinHDonLSChiTiet($masohd)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b where a.masohd=b.masohd and b.masohd=$masohd order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    function selectThongTinHDonLSChiTiet1($masohd)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b where a.masohd=b.masohd and b.masohd=$masohd order by a.masohd desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectThongTinSoLuongTon($mahh)
    {
        $db = new connect();
        $select = "select sum(soluongton) as soluongton
        from  cthanghoa 
        WHERE idhanghoa=$mahh and hienthi=0";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectThongTinDaBan($mahh)
    {
        $db = new connect();
        $select = "select sum(soluongmua) as soluongmua
        from cthoadon
        WHERE mahh=$mahh";
        $result = $db->getInstance($select);
        return $result;
    }
    function updateSoLuongTon($mahh, $soluongmua, $mausac, $size)
    {
        $db = new connect();
        $query = "UPDATE cthanghoa AS a
              INNER JOIN sizegiay AS c ON a.idsize = c.idsize
              INNER JOIN mausac AS b ON a.idmau = b.idmau
              SET a.soluongton = a.soluongton - $soluongmua
              WHERE b.mausac='$mausac' and c.size='$size' and a.idhanghoa = $mahh and a.hienthi=0";
        $db->exec($query);
    }
    function checkSLT($mahh, $mausac, $size)
    {
        $db = new connect();
        $select = "select b.soluongton
        from hanghoa a, cthanghoa b,mausac c,sizegiay d
        WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and d.idsize=b.idsize and b.idhanghoa=$mahh and c.mausac='$mausac' and d.size='$size' and b.hienthi=0";
        $result = $db->getInstance($select);
        return $result;
    }
    function updateSoLuongTon0($mahh, $mausac, $size)
    {
        $db = new connect();
        $query = "UPDATE cthanghoa AS a
        INNER JOIN mausac AS b ON a.idmau = b.idmau
        INNER JOIN sizegiay AS c ON a.idsize = c.idsize
        SET a.soluongton = '0'
        WHERE b.mausac='$mausac' and  c.size='$size' and  a.idhanghoa=$mahh and a.hienthi=0";
        $db->exec($query);
    }
    function selectHangHoaLai($masohd)
    {
        $db = new connect();
        $select = "select  a.mahh,b.idmau,c.idsize,a.soluongmua from cthoadon a ,mausac b, sizegiay c where a.mausac=b.mausac and a.size=c.size and a.masohd=$masohd";
        $result = $db->getList($select);
        return $result;
    }
    function updateSoLuongTra($mahh, $idmau, $idsize, $soluongmua)
    {
        $db = new connect();
        $query = "update cthanghoa a
            set a.soluongton=a.soluongton+$soluongmua where a.idhanghoa=$mahh and a.idmau=$idmau and a.idsize=$idsize";
        $result = $db->exec($query);
        return $result;
    }
    function updateSoLuongTraUnDo($mahh, $idmau, $idsize, $soluongmua)
    {
        $db = new connect();
        $query = "update cthanghoa a
            set a.soluongton=a.soluongton-$soluongmua where a.idhanghoa=$mahh and a.idmau=$idmau and a.idsize=$idsize";
        $result = $db->exec($query);
        return $result;
    }
    function updateGhiChu($masohd, $ghichu)
    {
        $db = new connect();
        $query = "update hoadon a set a.ghichu='$ghichu' where a.masohd=$masohd";
        $result = $db->exec($query);
        return $result;
    }
}
