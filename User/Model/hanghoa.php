<?php
class hanghoa
{
    function getCountHangHoaAll()
    {
        // b1: kết nối với database
        $db = new connect();
        //bước 2 cần lấy gì thì truy vấn cái đó
        $select = "SELECT COUNT( DISTINCT a.mahh) FROM hanghoa a, cthanghoa b
            WHERE a.mahh=b.idhanghoa and b.hienthi=0 ";
        //b3 ai thực thi câu lệnh select
        $result = $db->getInstance($select);
        return $result[0];
    }
    function getCountHangHoaKhuyenMai()
    {
        $db = new connect();
        $select = "SELECT COUNT(DISTINCT a.mahh) FROM hanghoa a, cthanghoa b WHERE a.mahh = b.idhanghoa AND b.giamgia != 0 and b.hienthi=0";
        $result = $db->getInstance($select);
        return $result[0];
    }

    function getHangHoaKhuyenMaiPage($start, $limit)
    {
        $db = new connect();
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, b.soluongton, b.giamgia
               FROM hanghoa a, cthanghoa b
               WHERE a.mahh = b.idhanghoa AND b.giamgia != 0 and b.hienthi =0
               ORDER BY a.mahh DESC
               LIMIT $start, $limit";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaNew()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,b.soluongton,a.soluotxem,b.hinh,b.dongia,b.giamgia 
            from hanghoa a,cthanghoa b
            WHERE a.mahh=b.idhanghoa and b.hienthi=0 group by a.mahh ORDER by a.soluotxem DESC limit 8";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result; //lấy đc 8 sản phẩm mới nhất
    }
    function getHangHoaSale()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,b.giamgia 
            from hanghoa a,cthanghoa b
            WHERE a.mahh=b.idhanghoa and giamgia!=0 and b.hienthi=0 group by a.mahh ORDER by a.mahh DESC limit 4";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaAllSale($start_sale, $limit)
    {
        // b1: kết nối với database
        $db = new connect();
        //bước 2 cần lấy gì thì truy vấn cái đó
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.soluongton,b.dongia,b.giamgia 
            from hanghoa a,cthanghoa b
            WHERE a.mahh=b.idhanghoa AND giamgia!=0 and b.hienthi=0 group by a.mahh ORDER by a.mahh DESC limit " . $start_sale . "," . $limit;
        //b3 ai thực thi câu lệnh select
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaAll($start, $limit)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select distinct a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.soluongton,b.giamgia
                from hanghoa a,cthanghoa b
                WHERE a.mahh=b.idhanghoa and b.hienthi=0 group by a.mahh ORDER by a.mahh DESC limit " . $start . "," . $limit;
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result; //lấy đc 14 sản phẩm mới nhất
    }
    function getHangHoaLoai($loai)
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select distinct a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.soluongton,b.giamgia
                from hanghoa a,cthanghoa b,loai c
                WHERE a.mahh=b.idhanghoa and a.maloai=c.maloai and b.hienthi=0 and c.maloai=$loai group by a.mahh";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
        // class connect, cần tạo ddtuong gọi pt
        $result = $db->getList($select);
        return $result; //lấy đc 14 sản phẩm mới nhất
    }
    function getHangHoaId2($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia,b.giamgia,c.idmau,b.soluongton,d.tenloai,a.soluotxem
            from hanghoa a,cthanghoa b, mausac c, loai d
            WHERE a.mahh=b.idhanghoa and c.idmau=b.idmau and a.mahh=$id and a.maloai=d.maloai and b.hienthi=0";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaId1($id, $th)
    {
        $db = new connect();
        if ($th != 2) {
            $query = "update hanghoa set soluotxem=soluotxem+1 WHERE mahh=$id";
            $db->exec($query);
        }
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia,b.giamgia,c.idmau,b.soluongton,sum(b.soluongton) as tongsoluongton,d.tenloai,a.soluotxem,e.idsize
            from hanghoa a,cthanghoa b, mausac c, loai d,sizegiay e
            WHERE a.mahh=b.idhanghoa and c.idmau=b.idmau and e.idsize=b.idsize and a.mahh=$id and a.maloai=d.maloai and b.hienthi=0";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaId($id, $mausac, $size)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia,b.giamgia,c.idmau,b.soluongton,sum(b.soluongton) as tongsoluongton,d.tenloai,a.soluotxem,e.idsize
            from hanghoa a,cthanghoa b, mausac c, loai d,sizegiay e
            WHERE a.mahh=b.idhanghoa and b.idmau=$mausac and b.idsize=$size and a.mahh=$id and a.maloai=d.maloai and b.hienthi=0";
        $result = $db->getInstance($select);
        return $result; //trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }
    function getSoLuongTon($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.soluongton
            from cthanghoa a
            WHERE a.idhanghoa=$id and a.hienthi=0";
        $result = $db->getList($select);
        return $result; //trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }
    // phương thức lấy thông tin màu trên một sản phẩm
    function getHangHoaMau($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.idmau,b.mausac,a.soluongton
            from cthanghoa a, mausac b
            WHERE a.idmau=b.idmau and a.idhanghoa=$id and a.hienthi=0 group by b.idmau";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaSize($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.idsize,b.size,a.soluongton
            from cthanghoa a, sizegiay b
            WHERE a.idsize=b.idsize and a.idhanghoa=$id and a.hienthi=0 group by b.idsize";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaHinh($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.hinh
            from cthanghoa a
            WHERE a.idhanghoa=$id and a.hienthi=0";
        $result = $db->getList($select);
        return $result;
    }
    function getComment($id)
    {
        $db = new connect();
        $select = "select a.diem
            from comment a
            WHERE a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    // lấy hình đựa vào id,mau,size
    function getHangHoaHinhMauSize($id, $mau, $size)
    {
        $db = new connect();
        $select = "select DISTINCT a.hinh
            from cthanghoa a,mausac b, sizegiay c
            Where a.idmau=b.idmau and a.idsize=c.idsize and a.idhanghoa=$id and b.idmau=$mau and c.idsize=$size and a.hienthi=0";
        // and a.idsize = c.idsize 
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức tìm kiếm sản phẩm
    public function getTimKiem($timkiem)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.soluongton,b.giamgia
            from hanghoa a,cthanghoa b
            WHERE a.mahh=b.idhanghoa and b.hienthi=0 and a.tenhh like '%$timkiem%' group by a.mahh ORDER by a.mahh ";
        $result = $db->getList($select);
        return $result;
    }
    function getLoai()
    {
        $db = new connect();
        $select = "select distinct a.maloai,a.tenloai from loai a, hanghoa b, cthanghoa c where a.maloai=b.maloai and b.mahh=c.idhanghoa and c.soluongton>0 and c.hienthi=0";
        $result = $db->getList($select);
        return $result;
    }
    function selectHangHoa($mahh, $idmau, $idsize)
    {
        $db = new connect();
        $select = "select distinct a.tenloai,b.tenhh,c.dongia,c.giamgia,c.hinh from loai a,hanghoa b,cthanghoa c where a.maloai = b.maloai and b.mahh=c.idhanghoa and c.idmau=$idmau and c.idsize=$idsize and b.mahh=$mahh";
        $result = $db->getInstance($select);
        return $result;
    }
    function GetHangHoaDanhGia($id, $makh)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b, khachhang c, comment d WHERE a.masohd = b.masohd and d.idkh=c.makh and d.idhanghoa=b.mahh and c.makh=$makh and b.mahh = $id";
        $result = $db->getInstance($select);
        return $result;
    }
    function GetHangHoaDaMua($id, $makh)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b, khachhang c WHERE a.masohd = b.masohd and c.makh=$makh and b.mahh = $id";
        $result = $db->getInstance($select);
        return $result;
    }
    //phailam
}
