<?php
    class hoadon {
        function insertHoadon($sohd, $makh, $ngay)  {
            $db = new connect();
            $query = "INSERT INTO hoadon(masohd,makh,ngaydat,tongtien) values($sohd,$makh,'$ngay',0)";
            $db->exec($query);
            // insert xong thi can ly ra ma hoa donvua insert
           
        }
        // phương thúc lấy shd
        function selectSHD() {
            $db = new connect();
            $select = "SELECT masohd from hoadon order by masohd desc limit 1";
            $mahd = $db->getInstance($select);
            if (!$mahd) {
                return null;
            } else {
               return $mahd;
            }
        }
        function insertCTHoadon($masohd, $mamh, $soluongmua, $size, $thanhtien){
            $db = new connect();
            $query = "INSERT INTO cthoadon(masohd,mahh,soluongmua,size,thanhtien,tinhtrang) values($masohd, $mamh,$soluongmua,$size,$thanhtien,0)";
            $db->exec($query);

        }
        // phuong thuc update tong tien vao lai ban hoa don
        function updateHoaDonTongTien($masohd,$makh,$tongtien){
            $db = new connect();
            $query = "update hoadon set tongtien = $tongtien where masohd=$masohd and makh=$makh";
            $db->exec($query);
        }
        // phương thức hiển thị thông tin khách hàng dựa vào mã hóa đơn
        function selectThongTinKHHD($makh) {
            $db = new connect();
            $select = "SELECT a.tenkh, a.diachi, a.sdt 
            FROM khachhang a  WHERE a.makh = $makh";
            $result = $db->getInstance($select);
            return $result;
        }
        function selectThongTinHHID($mshd){
            $db= new connect();
            $select = "a.tenmh, d.tensize, a.dongia, c.soluongmua FROM hanghoa a, cthanghoa b, cthoadon c, size d WHERE a.mamh = b.mamh AND a.mamh=c.mahh	AND c.masohd=$mshd and c.size=d.idsize";
            $result = $db->getList($select);
            return $result;
        }
        function updateSoLuongTon($soluong, $mamh, $size) {
            $db = new connect();
            $query = "update cthanghoa set soluongton = soluongton - $soluong where idsize = $size and mamh=$mamh";
            $db->exec($query);
        }
    }

?>