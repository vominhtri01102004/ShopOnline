<?php
class user
{
    // phương thức kiểm tra user và email có tồn tại hay không
    function checkUser($user, $email)
    {
        $db = new connect();
        $select = "select a.username,a.email from khachhang a
        WHERE a.username='$user' or a.email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    // thực hiện insert vào database
    function insertKhachHang($tenkh, $username, $matkhau, $email, $diachi, $sodt, $hinh)
    {
        $db = new connect();
        $query = "INSERT INTO khachhang (makh, tenkh,username,matkhau,email,diachi,sodienthoai,online,avatar)
        VALUES (NULL, '$tenkh', '$username', '$matkhau', '$email', '$diachi', '$sodt',0, '$hinh')";
        // exec
        $result = $db->exec($query);
        return $result;
    }
    // phương thức đăng nhập
    function logKhachHang($user, $pass)
    {
        $db = new connect();
        $select = "select a.makh,a.tenkh,a.username from khachhang a where a.username='$user' and a.matkhau='$pass'";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectHoatDong($makh)
    {
        $db = new connect();
        $select = "select a.online from khachhang a where a.makh='$makh'";
        $result = $db->getInstance($select);
        return $result;
    }
    function updateOnline($makh)
    {
        $db = new connect();
        $query = "update khachhang set online=1 where makh='$makh' ";
        $db->exec($query);
    }
    function updateOffline($makh)
    {
        $db = new connect();
        $query = "update khachhang set online=0 where makh='$makh' ";
        $db->exec($query);
    }
    function logKhachHangemail($email, $pass)
    {
        $db = new connect();
        $select = "select * from khachhang a where a.email='$email' and a.matkhau='$pass'";
        $result = $db->getInstance($select);
        return $result;
    }
    //phương thức kiểm tra email có tồn tại hay không
    function checkEmail($email)
    {
        $db = new connect();
        $select = "select * from khachhang a where a.email='$email'";
        $result = $db->getList($select);
        return $result; // trả về array
    }
    function updateEmail($email, $pass)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$pass' where email='$email'";
        $db->exec($query);
    }
    function getUser($makh)
    {
        $db = new connect();
        $select = "select * from khachhang a
        WHERE a.makh='$makh'";
        $result = $db->getInstance($select);
        return $result;
    }
    function DoiMatKhau($makh, $passmoi)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$passmoi' where makh=$makh";
        $db->exec($query);
    }
    function DoiMatKhauemail($email, $passmoi)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$passmoi' where email='$email'";
        $db->exec($query);
    }
    function LichSuMuaHang($makh)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b where a.masohd=b.masohd and a.makh=$makh order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    function LichSuMuaHang1($makh)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b where a.masohd=b.masohd and a.makh=$makh order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    function selectLoaiDon($makh, $trangthai)
    {
        $db = new connect();
        $select = "select distinct * from hoadon a, cthoadon b where a.masohd=b.masohd and b.trangthai=$trangthai and a.makh=$makh order by a.masohd desc";
        $result = $db->getList($select);
        return $result;
    }
    function updateKH($makh, $tenkh, $username, $email, $diachi, $sodienthoai, $hinh)
    {
        $db = new connect();
        $query = "update khachhang a
            set a.tenkh='$tenkh',a.username='$username', a.email='$email', a.diachi='$diachi',a.sodienthoai='$sodienthoai',a.avatar='$hinh'
            where makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
    function updateHuyDon($masohd)
    {
        $db = new connect();
        $query = "update cthoadon set trangthai=3 WHERE masohd=$masohd";
        $db->exec($query);
    }

    function updateTinhTrang($masohd)
    {
        $db = new connect();
        $query = "update cthoadon set trangthai=trangthai+1 WHERE masohd=$masohd";
        $db->exec($query);
    }

    function updateTrangHang($masohd)
    {
        $db = new connect();
        $query = "update cthoadon set trangthai=4 WHERE masohd=$masohd";
        $db->exec($query);
    }

    function updateHuyTrangHang($masohd)
    {
        $db = new connect();
        $query = "update cthoadon set trangthai=0 WHERE masohd=$masohd";
        $db->exec($query);
    }
    function insertTinNhan($makh, $thoigian1, $thoigian2, $noidung, $hinh)
    {
        $db = new connect();
        $query = "INSERT INTO tinnhan (idtinnhan,makh,idnv,thoigian1,thoigian2,noidung,hinh,daxem)
            VALUES (Null,$makh, 0,'$thoigian1','$thoigian2','$noidung','$hinh',0)";
        // exec
        $result = $db->exec($query);
        return $result;
    }
    function selectTinNhanCuoi($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and a.makh=$makh order by a.idtinnhan desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhanCuoinv($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and a.makh=$makh and a.idnv !=0 order by a.idtinnhan desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhanID($idtinnhan)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and a.idtinnhan=$idtinnhan order by a.idtinnhan desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhanIDCu($idtinnhan)
    {
        $db = new connect();
        $select = "select a.idnv from tinnhan a, khachhang b where a.makh=b.makh and a.idtinnhan=$idtinnhan order by a.idtinnhan desc";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhan($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and b.makh=$makh order by a.idtinnhan asc";
        $result = $db->getList($select);
        return $result;
    }
    function selectNhanVienId($idnv)
    {
        $db = new connect();
        $select = "select * from nhanvien a where a.idnv=$idnv";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectTinNhanChuaXem($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and a.idnv!=0 and a.makh=$makh and daxem=0 order by a.idtinnhan asc";
        $result = $db->getList($select);
        return $result;
    }
    function selectTinNhanChuaXemID($makh)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and a.idnv!=0 and a.makh=$makh and daxem=0 order by a.idtinnhan asc";
        $result = $db->getList($select);
        return $result;
    }
    function updateTinNhanDaXem($makh)
    {
        $db = new connect();
        $query = "update tinnhan a set a.daxem=1 where idnv!=0 and makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
    function updateSuDung($makh, $stt)
    {
        $db = new connect();
        $query = "update khachhang a set a.datho=$stt where a.makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
    function delThongTIn($stt, $makh)
    {
        $db = new connect();
        $query = "DELETE FROM khachhangdatho where stt=$stt and makh=$makh";
        $db->exec($query);
    }
    function selectTinNhanTimKiem($makh, $tk)
    {
        $db = new connect();
        $select = "select a.*,b.username from tinnhan a, khachhang b where a.makh=b.makh and b.makh=$makh and a.noidung like '%$tk%' order by a.idtinnhan asc";
        $result = $db->getList($select);
        return $result;
    }
    function selectAllDiaChi($makh)
    {
        $db = new connect();
        $select = "select a.* from khachhangdatho a where a.makh=$makh and a.tenkh=''and a.sodienthoai='' ";
        $result = $db->getList($select);
        return $result;
    }
    function selectDiaChiId($makh, $stt)
    {
        $db = new connect();
        $select = "select a.* from khachhangdatho a where a.makh=$makh and a.stt=$stt";
        $result = $db->getInstance($select);
        return $result;
    }
    function checkDiaChiMoi($makh, $diachi)
    {
        $db = new connect();
        $select = "select a.* from khachhangdatho a where a.makh=$makh and a.diachi='$diachi'";
        $result = $db->getList($select);
        return $result;
    }
    function insertDiaChiMoi($makh, $diachi)
    {
        $db = new connect();
        $tenkh = '';
        $sodienthoai = '';
        $query = "INSERT INTO khachhangdatho (stt,makh,tenkh,diachi,sodienthoai)
            VALUES (NUll,$makh, '$tenkh','$diachi','$sodienthoai')";
        $result = $db->exec($query);
        return $result;
    }
    function selectAllDatHo($makh)
    {
        $db = new connect();
        $select = "select a.* from khachhangdatho a where a.makh=$makh and a.tenkh!=''and a.sodienthoai!='' ";
        $result = $db->getList($select);
        return $result;
    }
    function checkDatho($makh, $tenkh, $diachi, $sodienthoai)
    {
        $db = new connect();
        $select = "select a.* from khachhangdatho a where a.makh=$makh and a.diachi='$diachi' and a.tenkh='$tenkh' and a.sodienthoai='$sodienthoai'";
        $result = $db->getList($select);
        return $result;
    }
    function insertDatHo($makh, $tenkh, $diachi, $sodienthoai)
    {
        $db = new connect();
        $query = "INSERT INTO khachhangdatho (stt,makh,tenkh,diachi,sodienthoai)
            VALUES (NUll,$makh, '$tenkh','$diachi','$sodienthoai')";
        $result = $db->exec($query);
        return $result;
    }
    function updateLaiDatHo($makh)
    {
        $db = new connect();
        $query = "UPDATE khachhang SET datho= 0 where makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
}
