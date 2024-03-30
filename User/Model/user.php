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
    function insertKhachHang($tenkh, $username, $matkhau, $email, $diachi, $sodt)
    {
        $db = new connect();
        $query = "INSERT INTO khachhang (makh, tenkh,username,matkhau,email,diachi,sodienthoai)
        VALUES (NULL, '$tenkh', '$username', '$matkhau', '$email', '$diachi', '$sodt')";
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
        return $result; // trả về array
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
    function selectThongTinK($makh)
    {
        $db = new connect();
        $select = "select a.username,a.email,a.tenkh,a.diachi,a.sodienthoai
            from khachhang a WHERE a.makh=$makh";
        $result = $db->getInstance($select);
        return $result;
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
    function LichSuMuaHang($makh)
    {
        $db = new connect();
        $select = "select distinct a.masohd,a.ngaydat,b.soluongmua,a.tongtien,b.mausac,b.size,c.tenhh,d.dongia from hoadon a, cthoadon b,hanghoa c,cthanghoa d where a.masohd=b.masohd and b.mahh=c.mahh and c.mahh=d.idhanghoa and a.makh=$makh";
        $result = $db->getList($select);
        return $result;
    }
    function selectThongTinKH($makh)
    {
        $db = new connect();
        $select = "select *
            from khachhang a where a.makh=$makh";
        $result = $db->getInstance($select);
        return $result;
    }
}
