<?php
class giohang
{
    function getGioHang($makh)
    {
        $db = new connect();
        $select = "SELECT DISTINCT 
                    a.mamh, 
                    a.soluongmua, 
                    a.size, 
                    s.tensize, -- Thêm cột tensize
                    b.tenmh,
                    b.dongia, 
                    b.giamgia, 
                    b.hinh,
                    c.soluongton 
                FROM 
                    giohang a
                    INNER JOIN hanghoa b ON a.mamh = b.mamh
                    INNER JOIN cthanghoa c ON a.mamh = c.mamh AND a.size = c.idsize
                    INNER JOIN khachhang e ON a.makh = e.makh
                    INNER JOIN size s ON a.size = s.idsize -- Thêm INNER JOIN với bảng size
                WHERE 
                    a.makh = $makh
                ORDER BY 
                    a.mamh, 
                    a.size;
                ";
        $result = $db->getList($select);
        return $result;
    }
    function addCart($mamh, $size, $soluong, $soluongton)
    {
        // con thieu hinh, ten, don gia, thanh tien
        $sanpham = new hanghoa();
        $sp = $sanpham->getHangHoaId($mamh);
        $tenmh = $sp['tenmh'];
        $dongia = $sp['dongia'];
        $giamgia = $sp['giamgia'];
        // lay hinh
        $hinh = $sanpham->getHangHoaIdSize($mamh, $size);
        $tensize = $hinh['tensize'];
        $img = $hinh['hinh'];
        $total = $soluong * $dongia;
        $flag = false;
        $makh = $_SESSION['makh'];
        $giohang = $this->getGioHang($makh);
        // truoc khi dua hang hoa vao gio hang thi kiem tra xem da co trong gio hang chua
        foreach ($giohang as $key => $item) {
            # code...
            if ($item['mamh'] == $mamh && $item['size'] == $size) {
                # code...
                $flag = true;
                $soluong += $item['soluongmua'];
                $this->updateHH($key, $soluong);
            }
        }
        if ($flag == false) {
            $db = new connect();
            $query = "insert into giohang(makh, mamh, size, soluongmua) values($makh, $mamh, $size, $soluong)";
            $db->exec($query);
            // $_SESSION['cart'][] = $item;
        }
        // dem doi tuong vao gio hang a[]
    }
    // phuong thuc tinh tong thanh tien
    function getSubTotal()
    {
        $subTotal = 0;
        foreach ($this->getGioHang($_SESSION['makh']) as $key => $item) {
            $subTotal += ($item['soluongmua']*$item['dongia']);
        }
        $subTotal = number_format($subTotal);
        return $subTotal;
    }
    // phuong thuc update
    function updateHH($index, $soluong)
    {
        // cap nhat, tuc la phep gan
        $db = new connect();
        $makh = $_SESSION['makh'];
        $giohang=$this->getGioHang($makh)->fetchAll(PDO::FETCH_ASSOC);
        $mamh = $giohang[$index]['mamh'];
        $size= $giohang[$index]['size'];
        $query = "UPDATE giohang
                    SET soluongmua= $soluong
                    WHERE makh = $makh and mamh = $mamh and size = $size";
        $result = $db->exec($query);
        return $result;
    }
    function delGiohang($makh,$mamh) {
        $db = new connect();
        $query = "DELETE FROM giohang where makh=$makh and mamh=$mamh";
        $db->exec($query);
    }
}
?>