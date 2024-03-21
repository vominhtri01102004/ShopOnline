<?php
    class connect{
        //thuộc tính
        var $db=null;
        //hàm tạo
        function __construct(){
            //vì mỗi lần tạo đối tượng từ connect sẽ kết nối tới dữ liệu
            $dsn='mysql:host=localhost;dbname=shopgiay';
            $user='root';
            $pass='';
            try {
                $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
                // echo "Kết nối thành công";
            } catch (\Throwable $th) {
                //throw $th;
                echo "Kết nối không thành công";
                echo $th;
            }
        }
        //phương thức trả về nhiều dòng dữ liệu
        function getList($select){
            $result=$this->db->query($select);
            return $result;
        }
        //phương thức trả về 1 dòng dữ liệu
        function getInstance($select){
            $results=$this->db->query($select);
            //do trả về 1 dòng nên fetch() để lấy dữ liệu dòng đó
            $result=$results->fetch();//result là array
            return $result;//trả về 1 array chứ 1 dòng
        }
        function exec($query){
            $result=$this->db->exec($query);
            return $result;
        }
        //prepare thực thi tất cả
        function execp($query){
            $statement=$this->db->prepare($query);
            return $statement;
        }
    }
?>