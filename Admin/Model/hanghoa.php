<?php
class hanghoa
{
    function getHangHoa()
    {
        $db = new connect();
        $select = "select * from hanghoa a, cthanghoa b where a.mahh=b.idhanghoa group by a.mahh";
        $result = $db->getList($select);
        return $result;
    }
    function GetHienThi($mahh)
    {
        $db = new connect();
        $select = "select a.hienthi,a.idhanghoa from cthanghoa a where a.idhanghoa=$mahh";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaID($id)
    {
        $db = new connect();
        $select = "select * from hanghoa a, loai b where a.maloai=b.maloai and mahh=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    //phương thức insert
    function insertHangHoa($tenhh, $maloai, $mota)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $slxem = 0;
        $query = "insert into hanghoa(mahh,tenhh,maloai,soluotxem,ngaylap,mota) 
            values (Null,'$tenhh', $maloai, $slxem, '$ngay', '$mota')";
        $result = $db->exec($query);
        return $result;
    }
    function insertHangHoaChiTiet($tenhh, $maloai, $mota)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');
        $slxem = 0;
        $query = "insert into hanghoa(mahh,tenhh,maloai,soluotxem,ngaylap,mota) 
            values (Null,'$tenhh', $maloai, $slxem, '$ngay', '$mota')";
        $result = $db->exec($query);
        return $result;
    }
    // lấy thông tin 1 sản phẩm
    function getHangHoaChiTietID($id, $idmau, $idsize)
    {
        $db = new connect();
        $select = "select * from hanghoa a,cthanghoa b,mausac c,sizegiay d where b.idmau=c.idmau and b.idsize=d.idsize and a.mahh=b.idhanghoa and b.idhanghoa=$id and b.idmau=$idmau and b.idsize=$idsize";
        $result = $db->getInstance($select);
        return $result;
    }
    function KiemTrahangHoa($tenhh)
    {
        $db = new connect();
        $select = "select * from hanghoa a WHERE a.tenhh='$tenhh' ";
        $result = $db->getList($select);
        return $result;
    }
    // phương thức update
    function updateHangHoa($mahh, $tenhh, $maloai, $mota)
    {
        $db = new connect();
        $query = "update hanghoa a set a.tenhh='$tenhh',a.mota='$mota',a.maloai=$maloai where a.mahh=$mahh";
        $result = $db->exec($query);
        return $result;
    }
    function updateHangHoaChiTiet($mahh, $dongia, $giamgia, $hinh, $idmau, $idsize, $soluong)
    {
        $db = new connect();
        $hinh1 = preg_replace('/\s+/', '', $hinh);
        $query = "update cthanghoa b
            set b.dongia=$dongia, b.giamgia=$giamgia,b.hinh='$hinh1',b.soluongton=$soluong
            where b.idhanghoa=$mahh and b.idmau=$idmau and b.idsize=$idsize";
        $result = $db->exec($query);
        return $result;
    }
    function getSize()
    {
        $db = new connect();
        $select = "select * from size";
        $result = $db->getList($select);
        return $result;
    }
    function getMau()
    {
        $db = new connect();
        $select = "select * from mausac";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaMau($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.idmau,b.mausac,a.soluongton
            from cthanghoa a, mausac b
            WHERE a.idmau=b.idmau and a.idhanghoa=$id group by b.idmau";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaSize($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.idsize,b.size,a.soluongton
            from cthanghoa a, sizegiay b
            WHERE a.idsize=b.idsize and a.idhanghoa=$id group by b.idsize";
        $result = $db->getList($select);
        return $result;
    }
    function getThongKeSanPham($nam = 0, $thang = 0)
    {
        $db = new connect();
        if ($nam == 0 && $thang == 0) {
            $select = "SELECT a.tenhh,sum(a.soluongmua) as soluong FROM cthoadon a where a.trangthai=2 GROUP by a.tenhh";
        } else if ($thang == 0 && $nam != 0) {
            $select = "SELECT a.tenhh, sum(a.soluongmua) as soluong, YEAR(c.ngaydat) as nam 
                FROM cthoadon a, hoadon c 
                WHERE  a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' and a.trangthai=2
                GROUP by a.tenhh";
        } else if ($thang != 0 && $nam != 0) {
            $select = "SELECT a.tenhh, sum(a.soluongmua) as soluong, CONCAT(YEAR(c.ngaydat), '-', MONTH(c.ngaydat)) AS nam
            FROM cthoadon a, hoadon c 
            WHERE  a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' and Month(c.ngaydat) = '$thang' and a.trangthai=2
            GROUP by a.tenhh";
        } else if ($thang != 0 && $nam == 0) {
            $select = "SELECT a.tenhh, sum(a.soluongmua) as soluong, Month(c.ngaydat) as nam 
                FROM cthoadon a, hoadon c 
                WHERE  a.masohd = c.masohd and Month(c.ngaydat) = '$thang' and a.trangthai=2
                GROUP by a.tenhh";
        }
        $result = $db->getList($select);
        return $result;
    }


    function getThongKeDonHang($nam = 0, $thang = 0)
    {
        $db = new connect();
        if ($thang == 0 && $nam == 0) {
            $select = "SELECT a.trangthai,sum(a.soluongmua) as soluong FROM cthoadon a GROUP by a.trangthai";
        } else if ($thang == 0 && $nam != 0) {
            $select = "SELECT a.trangthai, sum(a.soluongmua) as soluong, YEAR(c.ngaydat) as nam 
                FROM cthoadon a, hoadon c 
                WHERE  a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' 
                GROUP by a.trangthai";
        } else if ($thang != 0 && $nam != 0) {
            $select = "SELECT a.trangthai, sum(a.soluongmua) as soluong, CONCAT(YEAR(c.ngaydat), '-', MONTH(c.ngaydat)) AS nam
            FROM cthoadon a, hoadon c 
            WHERE  a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' and Month(c.ngaydat) = '$thang'
            GROUP by a.trangthai";
        } else if ($thang != 0 && $nam == 0) {
            $select = "SELECT a.trangthai, sum(a.soluongmua) as soluong, Month(c.ngaydat) as nam 
                FROM cthoadon a, hoadon c 
                WHERE  a.masohd = c.masohd and Month(c.ngaydat) = '$thang'
                GROUP by a.trangthai";
        }
        $result = $db->getList($select);
        return $result;
    }
    function getThongKeDoanhThu($nam = 0, $thang = 0)
    {
        $db = new connect();
        if ($nam == 0 && $thang == 0) {
            $select = "SELECT b.tenkh as tenhh,sum(b.tongtien) as soluong FROM cthoadon a,hoadon b where a.trangthai=2 and a.masohd=b.masohd GROUP by b.tenkh";
        } else if ($thang == 0 && $nam != 0) {
            $select = "SELECT c.tenkh as tenhh, sum(c.tongtien) as soluong, YEAR(c.ngaydat) as nam 
                FROM cthoadon a, hoadon c 
                WHERE  a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' and a.trangthai=2
                GROUP by c.tenkh";
        } else if ($thang != 0 && $nam != 0) {
            $select = "SELECT c.tenkh as tenhh, sum(c.tongtien) as soluong, CONCAT(YEAR(c.ngaydat), '-', MONTH(c.ngaydat)) AS nam
            FROM cthoadon a, hoadon c 
            WHERE  a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' and Month(c.ngaydat) = '$thang' and a.trangthai=2
            GROUP by c.tenkh";
        } else if ($thang != 0 && $nam == 0) {
            $select = "SELECT c.tenkh as tenhh, sum(c.tongtien) as soluong, Month(c.ngaydat) as nam 
                FROM cthoadon a, hoadon c 
                WHERE  a.masohd = c.masohd and Month(c.ngaydat) = '$thang' and a.trangthai=2
                GROUP by c.tenkh";
        }
        $result = $db->getList($select);
        return $result;
    }
    function getIDNew()
    {
        $db = new connect();
        $select = "SELECT mahh
            FROM hanghoa
            ORDER BY mahh DESC
            LIMIT 1;
            ";
        $result = $db->getInstance($select);
        return $result[0];
    }
    function delHangHoa($mahh)
    {
        $db = new connect();
        $query = "DELETE a.* from hanghoa a where a.mahh=$mahh";
        $result = $db->exec($query);
        return $result;
    }
    function delAllHangHoaChiTiet($mahh)
    {
        $db = new connect();
        $query = "DELETE a.* from cthanghoa a where a.idhanghoa=$mahh ";
        $result = $db->exec($query);
        return $result;
    }
    function delHangHoaChiTiet($mahh, $idmau, $idsize)
    {
        $db = new connect();
        $query = "DELETE a.* from cthanghoa a where a.idhanghoa=$mahh and a.idmau=$idmau and a.idsize=$idsize";
        $result = $db->exec($query);
        return $result;
    }
    function getHangHoaAllPage($start, $limit)
    {
        $db = new connect();
        $select = "select * from hanghoa a, cthanghoa b,mausac c,sizegiay d,loai e where b.idmau=c.idmau and b.idsize=d.idsize and a.maloai=e.maloai group by a.mahh order by a.mahh asc  limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaChiTiet($id)
    {
        $db = new connect();
        $select = "select DISTINCT *
            from hanghoa a,cthanghoa b, mausac c, loai d,sizegiay e
            WHERE a.mahh=b.idhanghoa and c.idmau=b.idmau and e.idsize=b.idsize and a.mahh=$id and a.maloai=d.maloai order by b.idmau desc";
        $result = $db->getList($select);
        return $result;
    }
    public function getTimKiem($timkiem)
    {
        $db = new connect();
        $select = "select * from hanghoa a, cthanghoa b,mausac c,sizegiay d,loai e where a.mahh=b.idhanghoa and b.idmau=c.idmau and b.idsize=d.idsize and a.maloai=e.maloai and a.tenhh like '%$timkiem%'  group by a.mahh ORDER by a.mahh ";

        $result = $db->getList($select);
        return $result;
    }
}
