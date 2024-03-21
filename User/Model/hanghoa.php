<?php
class hanghoa
{
    function getHangHoaNew()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,b.soluongton,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia 
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau ORDER by a.mahh DESC limit 8";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result; //lấy đc 8 sản phẩm mới nhất
    }
    function getHangHoaSale()
    {
        //bước 1: kết nối với database
        $db = new connect();
        //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.soluongton,b.hinh,b.dongia,c.mausac, b.giamgia 
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and giamgia!=0 ORDER by a.mahh DESC limit 4";
        //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getList thuộc connect
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaAll()
    {
        // b1: kết nối với database
        $db = new connect();
        //bước 2 cần lấy gì thì truy vấn cái đó
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.soluongton, b.giamgia 
            from hanghoa a,cthanghoa b 
            WHERE a.mahh=b.idhanghoa ORDER by a.mahh DESC ";
            //b3 ai thực thi câu lệnh select
            $result = $db->getList($select);
            return $result;
        }
        function getHangHoaAllSale()
        {
            // b1: kết nối với database
            $db = new connect();
            //bước 2 cần lấy gì thì truy vấn cái đó
            $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.soluongton,b.dongia,c.mausac, b.giamgia 
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and giamgia!=0 ORDER by a.mahh DESC ";
            //b3 ai thực thi câu lệnh select
            $result = $db->getList($select);
            return $result;
        }
        function getHangHoaAllPage($start, $limit)
        {
            //bước 1: kết nối với database
            $db = new connect();
            //bước 2: cần lấy gì thì truy vấn tức là viết lệnh select
            $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.soluongton,b.giamgia
                from hanghoa a,cthanghoa b
                WHERE a.mahh=b.idhanghoa     ORDER by a.mahh DESC limit " . $start . "," . $limit;
            //bước 3: ai thực thi câu lệnh select? query nằm trong getList mà getInstance, maf 2 pt nằmf trong connect
            // class connect, cần tạo ddtuong gọi pt
            $result = $db->getList($select);
            return $result; //lấy đc 14 sản phẩm mới nhất
        }
    function getCountHangHoaAll()
    {
        // b1: kết nối với database
        $db = new connect();
        //bước 2 cần lấy gì thì truy vấn cái đó
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac, b.giamgia 
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.idmau and giamgia=0 ORDER by a.mahh DESC ";
        //b3 ai thực thi câu lệnh select
        $result = $db->getInstance($select);
        return $result[0];
    }
    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia,b.giamgia,b.soluongton
            from hanghoa a,cthanghoa b, mausac c
            WHERE a.mahh=b.idhanghoa and c.idmau=b.idmau and a.mahh=$id";
        $result = $db->getInstance($select);
        return $result; //trả về đúng 1 row dạng array(mahh:24,tenhh: giày...)
    }
    // phương thức lấy thông tin màu trên một sản phẩm
    function getHangHoaMau($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.idmau,b.mausac
            from cthanghoa a, mausac b
            WHERE a.idmau=b.idmau and a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaSize($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.idsize,b.size
            from cthanghoa a, sizegiay b
            WHERE a.idsize=b.idsize and a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    // phương thức để lấy hình của 1 id
    function getHangHoaHinh($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.hinh
            from cthanghoa a
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
            Where a.idmau=b.idmau and a.idsize = c.idsize and a.idhanghoa=$id and b.idmau=$mau and c.size=$size";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức lấy tên màu thông qua id
    function getHangHoaMauIdMau($idmau)
    {
        $db = new connect();
        $select = "select a.mausac from mausac a 
            where a.idmau=$idmau";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức tìm kiếm sản phẩm
    public function getTimKiem($timkiem)
    {
         $db = new connect();
         $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.soluongton,c.mausac,b.giamgia
             from hanghoa a,cthanghoa b, mausac c 
             WHERE a.tenhh like '%$timkiem%' ORDER by a.mahh ";
         $result = $db->getList($select);
         return $result;
    }
}
