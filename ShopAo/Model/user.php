<?php
    class user {
        // phương thức kiểm tra trùng user và email
        function checkUsername($user) {
            $db = new connect();
            $select = "SELECT a.username FROM khachhang a where a.username = '$user'";
            $result = $db->getList($select);
            return $result;
        }
        function checkEmail1($email) {
            $db = new connect();
            $select = "SELECT a.email FROM khachhang a where a.email = '$email'";
            $result = $db->getList($select);
            return $result;
        }
        // Phương thức insert vào db
        function insertUser($tenkh, $username, $matkhau, $email, $diachi, $sdt) {
            $db = new connect();
            $query = "INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sdt`)
             VALUES (NULL, '$tenkh', '$username', '$matkhau', '$email', '$diachi', '$sdt')";
             $result = $db->exec($query);
             return $result;
        }
        function loginUser($username, $pass) {
            $db = new connect();
            $select = "SELECT * from khachhang a where a.username = '$username' and a.matkhau='$pass'";
            $result = $db->getInstance($select);
            return $result;
        }
        function logoutUser() {
            session_destroy();
        }
        function checkEmail($email)
        {
            $db=new connect();
            $select="select * from khachhang a
             WHERE a.email='$email'";
            $result=$db->getList($select);
            return $result;
        }
        function updatePassEmail($emailold, $pass) {
            $db = new connect();
            $query = "update khachhang set matkhau = '$pass' where email='$emailold'";
            $db->exec($query);
        }
        function getUser($makh) {
            $db = new connect();
            $select = "SELECT * from khachhang a where makh = $makh";
            $result = $db->getInstance($select);
            return $result;
        }
        function updateUser($makh, $tenkh, $email, $sdt, $diachi) {
            $db = new connect();
            $query = "update khachhang set tenkh = '$tenkh', email = '$email', sdt=$sdt, diachi = '$diachi' where makh=$makh";
            $db->exec($query);
        }
        function changePass($makh, $mkmoi) {
            $db = new connect();
            $query = "update khachhang set matkhau = '$mkmoi' where makh=$makh";
            $db->exec($query);
        }
        function lsgdUser($makh) {
            $db = new connect();
            $select = "SELECT DISTINCT 
                        a.masohd,
                        a.ngaydat,
                        a.tongtien,
                        b.mahh,
                        b.soluongmua,
                        b.thanhtien,
                        c.tensize,
                        d.tenmh,
                        d.dongia
                    FROM 
                        hoadon a
                        INNER JOIN cthoadon b ON a.masohd = b.masohd
                        INNER JOIN size c ON b.size = c.idsize
                        INNER JOIN hanghoa d ON b.mahh = d.mamh
                    WHERE 
                        a.makh = $makh
                    ORDER BY 
                        a.masohd";
            $result = $db->getList($select);
            return $result;

        }
    }
?>