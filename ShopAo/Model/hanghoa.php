<?php
    class hanghoa{
        // Phương thức hiển thị sản phẩm new
        function getHangHoaNew() {
            // B1 kết nối với csdl
            $db = new connect();
            // Truy vấn theo yêu cầu
            $select = "select DISTINCT a.giamgia, a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize from hanghoa a,cthanghoa b, size c 
            WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.trangthai=0 group by a.mamh ORDER by a.mamh DESC LIMIT 8";
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;;
        }
        function getAllHangHoaNew() {
            // B1 kết nối với csdl
            $db = new connect();
            // Truy vấn theo yêu cầu
                $select = "select DISTINCT a.giamgia, a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize from hanghoa a,cthanghoa b, size c 
                WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.giamgia=0 and a.trangthai=0 ORDER by a.mamh DESC";
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;;
        }
        function getHangHoaSale() {
            // B1 kết nối với csdl
            $db = new connect();
            // Truy vấn theo yêu cầu
            $select = "select DISTINCT a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize, a.giamgia from hanghoa a,cthanghoa b, size c 
            WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.giamgia>0 and a.trangthai=0 group by a.mamh ORDER by a.giamgia DESC LIMIT 8";
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;;
        }
        function getAllHangHoaSale() {
            // B1 kết nối với csdl
            $db = new connect();
            // Truy vấn theo yêu cầu
            $select = "select DISTINCT a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize, a.giamgia from hanghoa a,cthanghoa b, size c 
            WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.giamgia>0 and a.trangthai=0 ORDER by a.giamgia DESC";
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;;
        }
        function getHangHoaLoai($loai) {
            // B1 kết nối với csdl
            $db = new connect();
            // Truy vấn theo yêu cầu
            $select = "select a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize, a.giamgia, d.tenloai from hanghoa a,cthanghoa b, size c, loai d
            WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.idloai=d.idloai and a.idloai=$loai and a.trangthai=0";
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;
        }
        // phương thức lấy loại
        function getLoai()  {
            $db = new connect();
            // Truy vấn theo yêu cầu
            $select = "SELECT * FROM `loai` where trangthai=0 ";
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;;
        }

        function getCountHangHoaAll() {
            $db = new connect();
            $select = "SELECT count(DISTINCT a.mamh) from hanghoa a, cthanghoa b, size c WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.giamgia=0 and a.trangthai=0 ORDER by a.mamh DESC";
            $result = $db->getInstance($select);
            return $result[0];
            
     
        }
        function getCountHangHoaSaleAll() {
            $db = new connect();
            $select = "SELECT count(DISTINCT a.mamh) from hanghoa a, cthanghoa b, size c WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.giamgia>0 and a.trangthai=0 ORDER by a.mamh DESC";
            $result = $db->getInstance($select);
            return $result[0];
        }
        // phương thức phân trang
        function getAllHangHoaNewPage($start, $limit) {
            // B1 kết nối với csdl
            $db = new connect();
            // Truy vấn theo yêu cầu
            $select = "select DISTINCT a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize, a.giamgia from hanghoa a,cthanghoa b, size c 
            WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.giamgia=0 and a.trangthai=0 GROUP BY a.mamh ORDER by a.giamgia DESC limit ".$start.",".$limit;
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;
        }
        function getAllHangHoaSalePage($start, $limit) {
            // B1 kết nối với csdl
            $db = new connect();
            // Truy vấn theo yêu cầu
            $select = "select DISTINCT a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize, a.giamgia from hanghoa a,cthanghoa b, size c 
            WHERE a.mamh=b.mamh and b.idsize=c.idsize and a.giamgia>0 and a.trangthai=0 GROUP BY a.mamh ORDER by a.giamgia DESC limit ".$start.",".$limit;
            // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
            $result = $db->getList($select);
            return $result;
        }
        function getSanPhamChiTiet($id) {
            $db = new connect();
            $select="SELECT DISTINCT a.mamh, a.tenmh, a.dongia, a.giamgia, a.hinh, a.mota, b.tensize, c.soluongton from hanghoa a, size b, cthanghoa c where a.mamh = c.mamh and b.idsize = c.idsize and a.mamh=$id";
            $result = $db->getInstance($select);
            return $result;
        }
        function getSize($id) {
            $db = new connect();
            $select="SELECT a.mamh, a.soluongton, a.idsize, b.tensize FROM cthanghoa a, size b WHERE a.idsize = b.idsize and a.mamh=$id and b.trangthai=0";
            $result = $db->getList($select);
            return $result;
        }
        function getHangHoaId($id) {
            $db = new connect();
            $select = "SELECT DISTINCT mamh, tenmh, dongia, giamgia from hanghoa
            WHERE mamh=$id";
            $result = $db->getInstance($select);
            return $result;
        }
        function getHangHoaIdSize($id,$size) {
            $db = new connect();
            $select = "SELECT DISTINCT a.hinh, c.tensize from hanghoa a, cthanghoa b, size c
            WHERE a.mamh=b.mamh and b.idsize = c.idsize and a.mamh=$id and c.idsize = $size";
            $result = $db->getInstance($select);
            return $result;
        }
        function getHangHoaSize($id) {
            $db = new connect();
            $select = "select DISTINCT b.idsize, b.tensize from cthanghoa a, size b where a.idsize = b.idsize and a.mact=1";
            $result = $db->getList($select);
            return $result;
        }
        function selectTimKiem($tenmh) {
             // B1 kết nối với csdl
             $db = new connect();
             // Truy vấn theo yêu cầu
             $select = "select a.mamh,a.tenmh,a.hinh,a.dongia, c.tensize, a.giamgia from hanghoa a,cthanghoa b, size c 
             WHERE a.mamh=b.mamh and a.trangthai=0 and b.idsize=c.idsize and a.tenmh like '%$tenmh%' ORDER by a.mamh DESC ";
             // B3 dùng query thực thi câu lệnh select, pt này nằm trong connect
             $result = $db->getList($select);
             return $result;
        }
        function selectSoLuongTon($mamh, $size) {
            $db = new connect();
            $select = "select soluongton from cthanghoa where mamh = $mamh and idsize = $size";
            $result = $db->getInstance($select);
            return $result[0];
        }
    }
?>