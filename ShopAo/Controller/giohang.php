<?php

$gh = new giohang();
if (!isset ($_SESSION['makh'])) {
    echo '<script>alert("Vui lòng đăng nhập")</script>
          <meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
} else {
    $act = 'giohang';
    if (isset ($_GET['act'])) {
        # code...
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'giohang':
            # code...
            include_once './View/cart.php';
            break;

        case 'giohang_action':
            $id = 0;
            $size = 0;
            $soluong = 0;
            if (isset ($_POST['mahh']) && $_POST['size'] != null && $_POST['soluong'] != null) {
                # code...
                $id = $_POST['mahh'];
                $size = $_POST['size'];
                $soluong = $_POST['soluong'];
                $soluongton = $_POST['soluongton' . $size];
                $gh = new giohang();
                $gh->addCart($id, $size, $soluong, $soluongton);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';

            } else {
                echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script><meta http-equiv="refresh" content="0;url=./index.php?action=sanphamchitiet&id=' . $_POST['mahh'] . '"/>';
            }
            break;
        case 'giohang_xoa':
            if (isset ($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                unset($_SESSION['cart'][$id]);
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            break;
        case 'update_gh':
            if (isset ($_POST['newqty'])) {
                $newqty = $_POST['newqty'];
                $giohang = $gh->getGioHang($_SESSION['makh'])->fetchAll(PDO::FETCH_ASSOC);
                // duyet qua gio hang neu san pham nao thay doi thi cap nhat
                foreach ($newqty as $key => $value) {
                    if ($value == '' || $value == null) {
                        echo '<script>alert("Số lượng không để trống")</script><meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
                    } else if ($giohang[$key]['soluongmua'] != $value) {
                        $gh = new giohang();
                        $check = $gh->updateHH($key, $value);
                    }
                    // else {
                    //     echo '<script>alert("Lỗi'.$key.$value.'")</script><meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
                    //     break;
                    // }
                }
            } else {
                echo '<script>alert("Vui lòng nhập số lượng")</script><meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            }
            break;
    }
}
?>