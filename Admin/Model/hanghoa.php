<?php
    class hanghoa{
        function getHangHoa()
        {
            $db=new connect();
            $select="select * from hanghoa where trangthai=0";
            $result=$db->getList($select);
            return $result;
        }
        //phương thức insert
        function insertHangHoa($tenhh, $maloai, $dongia, $giamgia, $hinhanh, $mota)
        {
            $db=new connect();
            $query="insert into hanghoa(mamh,tenmh,idloai,dongia,giamgia,hinh,mota) 
            values (Null,'$tenhh', $maloai, $dongia, $giamgia, '$hinhanh', '$mota')";
            $result=$db->exec($query);
            return $result;
        }
        // lấy thông tin 1 sản phẩm
        function getHangHoaID($id)
        {
            $db=new connect();
            $select="select * from hanghoa where mamh=$id";
            $result=$db->getInstance($select);
            return $result;
        }
        // phương thức update
        function updateHangHoa($mamh,$tenmh,$maloai,$dongia,$giamgia,$mota)
        {
            $db=new connect();
            $query="update hanghoa 
            set tenmh='$tenmh',idloai=$maloai, dongia=$dongia, giamgia=$giamgia,mota='$mota' 
            where mamh=$mamh";
            $result=$db->exec($query);
            return $result;
        }
        function getSize()
        {
            $db=new connect();
            $select="select * from size";
            $result=$db->getList($select);
            return $result;
        }
        // phương thức thống kê
        function getThongKe($nam=0)
        {
            $db=new connect();
            if ($nam==0) {
                $select="SELECT b.tenmh,sum(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mamh GROUP by b.tenmh";
            }
            else {
                $select="SELECT b.tenmh,sum(a.soluongmua)as soluong, YEAR(c.ngaydat) as nam 
                FROM cthoadon a,hanghoa b, hoadon c 
                WHERE a.mahh=b.mamh and a.masohd = c.masohd and YEAR(c.ngaydat) = '$nam' 
                GROUP by b.tenmh";
            }
            $result=$db->getList($select);
            return $result;
        }
        function getIDNew() {
            $db = new connect ();
            $select = "SELECT mamh
            FROM hanghoa
            ORDER BY mamh DESC
            LIMIT 1;
            ";
            $result = $db->getInstance($select);
            return $result[0];
        }
        function delHangHoa($mamh) {
            $db = new connect();
            $query = "update hanghoa 
            set trangthai = 1
            where mamh=$mamh";
            $result=$db->exec($query);
            return $result;
        }
    }
?>