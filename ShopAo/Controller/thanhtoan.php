<?php
    $act = 'thanhtoan';
    $hd = new hoadon();
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        # code...
    }
    switch($act) {
        case 'thanhtoan':
            if (isset($_SESSION['makh'])) {
                # code...
                $makh = $_SESSION['makh'];
                // Controller yeu cau model insert vao bang hoa don truoc de ra mshoadon roi moi duoc insert vao bang ct hoadon
                $sohd = $hd->selectSHD();
                if ($sohd==null) {
                    # code...
                    $sohd = 0;
                } else {
                    $sohd = $sohd[0]+1;
                }
                // echo "<script>alert('$sohd')</script>";
                $kh = $hd->selectThongTinKHHD($makh);
                $date = new DateTime('now');
                $ngay = $date->format('Y-m-d');
                $tongtien =0;
                $item = array(
                    'makh'=>$makh,
                    'masohd'=>$sohd,
                    'tenkh'=>$kh['tenkh'],
                    'ngaydat'=>$ngay,
                    'diachi'=>$kh['diachi'],
                    'sdt'=>$kh['sdt'],
                    'tongtien'=>$tongtien
                );
                $_SESSION['order'][]=$item;
                $_SESSION['masohd'] = $sohd;
            }
            include_once "./View/order.php";
            break;
            case 'thanhtoan_action':
                if (isset($_POST['submit'])) {
                    $sohd = $_SESSION['masohd'];
                    $makh = $_POST['makh'];
                    $ngay = $_POST['ngay'];
                }
                include_once 'View/home.php';
                $total = 0;
                $hd->insertHoadon($sohd,$makh,$ngay);
        // luc nay da co ma hoa don duoc them vao thi duoc them vao cthoadon
        // cthoadon luc nay lay tu gio hang
        $gh = new giohang();
        $giohang = $gh->getGioHang($_SESSION['makh']);
        foreach ($giohang as $key => $item) {
            # code...
            // controller yeu cau model insert vao cthoadon
            $hd->insertCTHoadon($sohd, $item['mamh'],$item['soluongmua'],$item['size'], $item['soluongmua']*$item['dongia']);
            $total+=$item['soluongmua']*$item['dongia'];
            // ham cap nhat so luong theo ma hang
            // update so luongTonhh
            // kiểm tra nếu số lượng mua lớn hơn số lượng tồn thì báo
            $hh = new hanghoa();
            $soluongton = $hh->selectSoLuongTon($item['mamh'],$item['size']);
            if ($item['soluongmua']>$soluongton) {
                # code...
                echo "<script>Số lượng mặt hàng còn lại không đủ, hiện tại còn $soluongton</script>";
            } else {
                $hd->updateSoLuongTon($item['soluongmua'],$item['mamh'],$item['size']);
            }
            
        }
        // // sau khi insert vao bang cthoadon thi update tong thanh tien tro lai hoa don
        
        $hd->updateHoaDonTongTien($sohd, $makh, $total);
        $gh->delGiohang($makh);
        unset($_SESSION['order']);
        echo "<script>Mua thành công</script>";
    }
?>