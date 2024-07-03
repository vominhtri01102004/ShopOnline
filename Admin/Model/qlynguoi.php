<?php
class qlynguoi
{
    function checkEmail($email)
    {
        $db = new connect();
        $select = "select * from nhanvien a where a.email='$email'";
        $result = $db->getList($select);
        return $result; // trả về array
    }
    function updateEmail($email, $pass)
    {
        $db = new connect();
        $query = "update nhanvien set matkhau='$pass' where email='$email'";
        $db->exec($query);
    }
    function getAdmin($idnv)
    {
        $db = new connect();
        $select = "select * from nhanvien a
        WHERE a.idnv='$idnv'";
        $result = $db->getInstance($select);
        return $result;
    }
    function DoiMatKhau($idnv, $passmoi)
    {
        $db = new connect();
        $query = "update nhanvien set matkhau='$passmoi' where idnv=$idnv";
        $db->exec($query);
    }
    function DoiMatKhauemail($email, $passmoi)
    {
        $db = new connect();
        $query = "update nhanvien set matkhau='$passmoi' where email='$email'";
        $db->exec($query);
    }
    function logNhanVienemail($email, $pass)
    {
        $db = new connect();
        $select = "select * from nhanvien a where a.email='$email' and a.matkhau='$pass'";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectAdmin($user, $pass)
    {
        $db = new connect();
        $select = "select * from nhanvien where username='$user' and matkhau='$pass'";
        $result = $db->getInstance($select);
        return $result;
    }
    function selectAllNhanVien()
    {
        $db = new connect();
        $select = "SELECT * FROM nhanvien ORDER BY 
                   CASE 
                     WHEN chucvu = 'Admin' THEN 1
                     WHEN chucvu = 'Quản Lý' THEN 2
                     WHEN chucvu = 'Nhân Viên' THEN 3
                     ELSE 4
                   END";
        $result = $db->getList($select);
        return $result;
    }

    function selectAllKhachHang()
    {
        $db = new connect();
        $select = "select distinct a.tenkh,a.makh,a.username,a.email,a.avatar,a.sodienthoai,b.chucvu from khachhang a,nhanvien b group by a.makh";
        $result = $db->getList($select);
        return $result;
    }
    function selectKhachHangId($makh)
    {
        $db = new connect();
        $select = "select * from khachhang a where a.makh=$makh";
        $result = $db->getInstance($select);
        return $result;
    }
    function checkKhachHang($user, $email)
    {
        $db = new connect();
        $select = "select a.username,a.email from khachhang a
        WHERE a.username='$user' or a.email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    function insertKhachHang($tenkh, $username, $matkhaumoi, $email, $diachi, $sodienthoai, $hinh)
    {
        $db = new connect();
        $query = "INSERT INTO khachhang (makh, tenkh,username,matkhau,email,diachi,sodienthoai,online,avatar,datho)
        VALUES (NULL, '$tenkh', '$username', '$matkhaumoi', '$email', '$diachi', '$sodienthoai',0,'$hinh',0)";
        $result = $db->exec($query);
        return $result;
    }
    function updateKhachHang($makh, $tenkh, $username, $email, $diachi, $sodienthoai, $hinh)
    {
        $db = new connect();
        $query = "update khachhang a
            set a.tenkh='$tenkh',a.username='$username', a.email='$email', a.diachi='$diachi',a.sodienthoai='$sodienthoai',a.avatar='$hinh'
            where makh=$makh";
        $result = $db->exec($query);
        return $result;
    }
    function deleteKhachHang($makh)
    {
        $db = new connect();
        $query = "DELETE FROM khachhang WHERE `khachhang`.`makh` = $makh";
        $result = $db->exec($query);
        return $result;
    }
    function selectNhanVienId($idnv)
    {
        $db = new connect();
        $select = "select * from nhanvien a where a.idnv=$idnv";
        $result = $db->getInstance($select);
        return $result;
    }
    function checkNhanVien($user, $email)
    {
        $db = new connect();
        $select = "select a.username,a.email from nhanvien a
        WHERE a.username='$user' or a.email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    function insertNhanVien($tennv, $username, $matkhaumoi, $email, $diachi, $sodienthoai, $chucvu)
    {
        $db = new connect();
        $query = "INSERT INTO nhanvien (idnv, tennv,diachi,username,matkhau,email,sodienthoai,chucvu)
        VALUES (NULL, '$tennv', '$diachi', '$username', '$matkhaumoi', '$email', '$sodienthoai','$chucvu')";
        // exec
        $result = $db->exec($query);
        return $result;
    }
    function updateNhanVien($idnv, $tennv, $username, $email, $diachi, $sodienthoai, $chucvu)
    {
        $db = new connect();
        $query = "update nhanvien a
            set a.tennv='$tennv',a.username='$username', a.email='$email', a.diachi='$diachi',a.sodienthoai='$sodienthoai',a.chucvu='$chucvu'
            where a.idnv=$idnv";
        $result = $db->exec($query);
        return $result;
    }
    function deleteNhanVien($idnv)
    {
        $db = new connect();
        $query = "DELETE FROM nhanvien WHERE `nhanvien`.`idnv` = $idnv";
        $result = $db->exec($query);
        return $result;
    }
    function checkNhanVientontai($chucvu, $username)
    {
        $db = new connect();
        $select = "select * from nhanvien a where a.chucvu='$chucvu' and a.username='$username'";
        $result = $db->getList($select);
        return $result;
    }
}
