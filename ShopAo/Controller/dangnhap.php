<?php
    $act = "dangnhap";
    if (isset($_GET['act'])) {
        # code...
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            include_once './View/login.php';
            break;
        
        case 'dangnhap_action':
            # code...
            $user = '';
            $pass = '';
            if (isset($_POST['txtusername'])&&isset($_POST['txtpassword'])) {
                # code...
                $user = $_POST['txtusername'];
                $pass = $_POST['txtpassword'];
                $saltF = 'TX024@';
                $passnew = md5($saltF.$pass);
                // controller yêu cầu model truy vấn xem có user đo shay không
                $kh = new user();
                $login = $kh ->loginUser($user, $passnew);
                if ($login) {
                    # code...
                    //nếu đăng nhập thành công thì tạo session để lưu thông tin kh
                    $_SESSION['makh'] = $login['makh'];
                    $_SESSION['tenkh'] = $login['tenkh'];
                    echo '<script>alert("Đăng nhập thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                } else {
                    
                    echo '<script>alert("Đăng nhập thất bại")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
                }
                
            }
            break;
        case 'dangxuat':
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    }
?>