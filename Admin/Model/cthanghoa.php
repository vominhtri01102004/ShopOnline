<?php
class cthanghoa
{
    function updateAnHangHoaAll($id)
    {
        $db = new connect();
        $query = "update cthanghoa a set a.hienthi=1 where a.idhanghoa=$id";
        $result = $db->exec($query);
        return $result;
    }
    function updateHienHangHoaAll($id)
    {
        $db = new connect();
        $query = "update cthanghoa a set a.hienthi=0 where a.idhanghoa=$id";
        $result = $db->exec($query);
        return $result;
    }
    function updateHienHangHoa($id, $idmau, $idsize)
    {
        $db = new connect();
        $query = "update cthanghoa a set a.hienthi=0 where a.idmau=$idmau and a.idsize=$idsize and a.idhanghoa=$id";
        $result = $db->exec($query);
        return $result;
    }
    function updateAnHangHoa($id, $idmau, $idsize)
    {
        $db = new connect();
        $query = "update cthanghoa a set a.hienthi=1 where a.idmau=$idmau and a.idsize=$idsize and a.idhanghoa=$id";
        $result = $db->exec($query);
        return $result;
    }
    function KiemTrahangHoa($mahh, $idmau, $idsize)
    {
        $db = new connect();
        $select = "select * from cthanghoa a WHERE a.idmau=$idmau and a.idsize = $idsize and a.idhanghoa=$mahh";
        $result = $db->getInstance($select);
        return $result;
    }
    function insertCTHangHoa($idhanghoa, $idmau, $idsize, $dongia, $soluongton, $hinh, $giamgia)
    {
        $db = new connect();
        $hinh1 = preg_replace('/\s+/', '', $hinh);
        $query = "insert into cthanghoa(idhanghoa, idmau, idsize, dongia, soluongton, hinh, giamgia) values ($idhanghoa,$idmau,$idsize,$dongia,$soluongton,'$hinh1',$giamgia)";
        $result = $db->exec($query);
        return $result;
    }
}
