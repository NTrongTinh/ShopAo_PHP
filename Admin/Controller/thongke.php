<?php
$act = "thongke";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'thongke':
        include_once "./View/thongke.php";
        break;
    case 'thongke_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_SESSION['nam'] = $_POST['nam'];
            // echo "<script>alert($nam)</script>";
            $hh = new hanghoa();
            $thongKeResult = $hh->getThongKe($nam);
            echo '<meta http-equiv=refresh content="0;url=./index.php?action=thongke"/>';
        }
        break;

}
?>