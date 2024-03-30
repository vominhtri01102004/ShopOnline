<?php
    class hanghoa{
        function getHangHoa()
        {
            $db=new connect();
            $select="select * from hanghoa a, cthanghoa b where a.mahh=b.idhanghoa ";
            $result=$db->getList($select);
            return $result;
        }
        //phương thức insert
        function insertHangHoa($tenhh, $maloai, $dongia, $giamgia, $hinhanh, $mota)
        {
            $db=new connect();
            $query="insert into hanghoa(mahh,tenhh,idloai,dongia,giamgia,hinh,mota) 
            values (Null,'$tenhh', $maloai, $dongia, $giamgia, '$hinhanh', '$mota')";
            $result=$db->exec($query);
            return $result;
        }
        // lấy thông tin 1 sản phẩm
        function getHangHoaID($id)
        {
            $db=new connect();
            $select="select * from hanghoa a,cthanghoa b where a.mahh=b.idhanghoa and mahh=$id";
            $result=$db->getInstance($select);
            return $result;
        }
        // phương thức update
        function updateHangHoa($mahh,$tenhh,$maloai,$dongia,$giamgia,$mota)
        {
            $db=new connect();
            $query="update hanghoa a,cthanghoa b
            set a.tenhh='$tenhh',a.maloai=$maloai, b.dongia=$dongia, b.giamgia=$giamgia,a.mota='$mota' 
            where mahh=$mahh";
            $result=$db->exec($query);
            return $result;
        }
        function getSize()
        {
            $db=new connect();
            $select="select * from size";
            $result=$db->getList($select);
            return $result;
        }
        function getMau()
        {
            $db=new connect();
            $select="select * from mausac";
            $result=$db->getList($select);
            return $result;
        }
        // phương thức thống kê
        function getThongKe($nam=0)
        {
            $db=new connect();
            if ($nam==0) {
                $select="SELECT b.tenhh,sum(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
            }
            else {
                $select="SELECT b.tenhh,sum(a.soluongmua)as soluong, YEAR(c.ngaydat) as nam 
                FROM cthoadon a,hanghoa b, hoadon c 
                WHERE a.mahh=b.mahh and a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' 
                GROUP by b.tenhh";
            }
            $result=$db->getList($select);
            return $result;
        }
        function getThongKeThang($thang=0)
        {
            $db=new connect();
            if ($thang==0) {
                $select="SELECT b.tenhh,sum(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
            }
            else {
                $select="SELECT b.tenhh,sum(a.soluongmua)as soluong, MONTH(c.ngaydat) as thang 
                FROM cthoadon a,hanghoa b, hoadon c 
                WHERE a.mahh=b.mahh and a.masohd = c.masohd and MONTH(c.ngaydat) = '$thang' 
                GROUP by b.tenhh";
            }
            $result=$db->getList($select);
            return $result;
        }
        function getIDNew() {
            $db = new connect ();
            $select = "SELECT mahh
            FROM hanghoa
            ORDER BY mahh DESC
            LIMIT 1;
            ";
            $result = $db->getInstance($select);
            return $result[0];
        }
        function delHangHoa($mahh) {
            $db = new connect();
            $query = "DELETE FROM hanghoa WHERE `hanghoa`.`mahh` = $mahh";
            $result=$db->exec($query);
            return $result;
        }
        function getHangHoaAllPage($start,$limit)
    {
        $db=new connect();
        $select="select * from hanghoa a, cthanghoa b where a.mahh=b.idhanghoa  limit ".$start.",".$limit;
        $result=$db->getList($select);
        return $result;
    }
    }
?>