<?php
    class connect {
        // tạo thuộc tính
        var $db=null;
        //hàm tạo được gọi khi new 1 dối tượng
        function __construct() {
            $dsn = 'mysql:host=localhost;dbname=shopao';
            $user = 'root';
            $pass = ''; //nếu xài xamp wamp laragon thí $pass = '';
            
            // kết nối dựa vào class PDO
            try {
                $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
                // echo 'Kết nối thành công';
            } catch (\Throwable $th) { //nén lỗi vào biến th
                //throw $th;
                echo 'Kết nối thất bại';
                echo $th;
            }
        }

        function getList($select) {
            $result = $this->db->query($select); //$this->db->(select * from hanghoa);
            return $result;    
        }

        function getInstance($select) {
            $results = $this->db->query($select);
            $result = $results->fetch(); // $result là array chỉ chứa 1 dòng [mahh:1, tenhh:giày...]
            return $result;
        }

        // câu lệnh insert. update, delete do exec làm
        function exec($query) {
            $results = $this->db->exec($query);
            return $results;
        }

        //  dùng prepare
        function execp($query) {
            $statement = $this->db->prepare($query);
            return $statement;
        }
    }

?>