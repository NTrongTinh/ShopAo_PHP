<?php
if (isset($_SESSION['makh'])) {
    # code...
    $makh = $_SESSION['makh'];
    $masp = $_POST['txtmahh'];
    $cmt = $_POST['comment'];
    $bl = new binhluan();
    $bl->insertBinhLuan($makh,$masp,$cmt);
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanphamchitiet&id='.$masp.'"/>';


}
?>