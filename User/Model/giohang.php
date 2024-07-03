<?php
class giohang
{
    function getGioHang($makh)
    {
        $db = new connect();
        $select = "SELECT DISTINCT 
                    a.mahh, 
                    a.soluongmua, 
                    a.idsize, 
                    a.idmau, 
                    b.tenhh,
                    c.dongia, 
                    c.giamgia, 
                    c.hinh,
                    c.soluongton,
                    d.mausac, 
                    s.size
                FROM 
                    giohang a
                    INNER JOIN hanghoa b ON a.mahh = b.mahh
                    INNER JOIN cthanghoa c ON a.mahh = c.idhanghoa AND a.idsize = c.idsize and c.hienthi=0 AND a.idmau = c.idmau
                    INNER JOIN khachhang e ON a.makh = e.makh
                    INNER JOIN mausac d ON a.idmau = d.idmau
                    INNER JOIN sizegiay s ON a.idsize = s.idsize
                WHERE 
                    a.makh = $makh 
                ORDER BY 
                    a.mahh, 
                    a.idsize;
                ";
        $result = $db->getList($select);
        return $result;
    }
    function getGioHangAn($makh)
    {
        $db = new connect();
        $select = "SELECT DISTINCT 
                        a.mahh, 
                        a.soluongmua, 
                        a.idsize, 
                        a.idmau, 
                        b.tenhh,
                        c.dongia, 
                        c.giamgia, 
                        c.hinh,
                        c.soluongton,
                        d.mausac, 
                        s.size
                    FROM 
                        giohang a
                        INNER JOIN hanghoa b ON a.mahh = b.mahh
                        INNER JOIN cthanghoa c ON a.mahh = c.idhanghoa AND a.idsize = c.idsize and c.hienthi=1 AND a.idmau = c.idmau
                        INNER JOIN khachhang e ON a.makh = e.makh
                        INNER JOIN mausac d ON a.idmau = d.idmau
                        INNER JOIN sizegiay s ON a.idsize = s.idsize -- Thêm INNER JOIN với bảng size
                    WHERE 
                        a.makh = $makh 
                    ORDER BY 
                        a.mahh, 
                        a.idsize;
                    ";
        $result = $db->getList($select);
        return $result;
    }
    // phương thức add hàng
    function addHangHoa($mahh, $mausac, $size, $soluong)
    {
        $makh = $_SESSION['makh'];
        $flag = false;
        $giohang = $this->getGioHang($makh);
        foreach ($giohang as $key => $item) {
            # code...
            if ($item['mahh'] == $mahh && $item['idsize'] == $size && $item['idmau'] == $mausac) {
                # code...
                $flag = true;
                $soluong += $item['soluongmua'];
                $this->updateHH($key, $soluong);
            }
        }
        if ($flag == false) {
            $db = new connect();
            $query = "insert into giohang(makh, mahh, idsize,idmau, soluongmua,mavoucher,idship) values($makh, $mahh, $size,$mausac, $soluong,0,1)";
            $db->exec($query);
        }
    }
    // phương thức update Hàng hóa
    function updateHH($index, $soluong)
    {
        $db = new connect();
        $makh = $_SESSION['makh'];
        $giohang = $this->getGioHang($makh)->fetchAll(PDO::FETCH_ASSOC);
        $mahh = $giohang[$index]['mahh'];
        $idsize = $giohang[$index]['idsize'];
        $idmau = $giohang[$index]['idmau'];
        if ($soluong <= 0) {
            $this->delGiohang($makh, $mahh, $idmau, $idsize);
        }
        $query = "UPDATE giohang
                    SET soluongmua= $soluong
                    WHERE makh = $makh and mahh = $mahh and idsize = $idsize and idmau = $idmau";
        $result = $db->exec($query);
        return $result;
        // 'else {
        //     // update là phép gán
        //     $_SESSION['cart'][$index]['soluong'] = $soluong;
        //     if ($_SESSION['cart'][$index]['giamgia'] != 0) {
        //         $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['giamgia'];
        //     }
        //     if ($_SESSION['cart'][$index]['giamgia']  == 0) {
        //         $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
        //     }
        //     $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
        // }
    }
    function delGiohang($makh, $mahh, $idmau, $idsize)
    {
        $db = new connect();
        $query = "DELETE FROM giohang where makh=$makh and mahh=$mahh and idmau=$idmau and idsize=$idsize";
        $db->exec($query);
    }
    // phương thức tính thành tiền
    function getSubTotal()
    {
        $subtotal = 0;
        foreach ($this->getGioHang($_SESSION['makh']) as $key => $item) {
            if ($item['giamgia'] > 0) {
                $subtotal += ($item['soluongmua'] * $item['giamgia']);
            } else {
                $subtotal += ($item['soluongmua'] * $item['dongia']);
            }
        }
        $subtotal = number_format($subtotal);
        // ,2
        return $subtotal;
    }
}
