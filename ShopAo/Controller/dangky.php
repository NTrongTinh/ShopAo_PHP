<?php
    $act = "dangky";
    if (isset($_GET['act'])) {
        # code...
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'dangky':
            include_once "./View/registration.php";
            break;
        
        case 'dangky_action':
            $tenkh ='';
            $diachi ='';
            $sdt ='';
            $user ='';
            $email ='';
            $pass ='';
            if (isset($_POST['submit'])) {
                $tenkh =$_POST['txttenkh'];
                $diachi =$_POST['txtdiachi'];
                $sdt =$_POST['txtsodt'];
                $user =$_POST['txtusername'];
                $email =$_POST['txtemail'];
                $pass =$_POST['txtpass'];
                // mã hóa pass
                $saltF = 'TX024@';
                $passnew = md5($saltF.$pass);
                $kh = new user();
                $checkusername = $kh->checkUsername($user)->rowCount();
                $checkemail = $kh->checkEmail1($email)->rowCount();
                if ($checkusername >= 1) {
                    echo '<script>alert("Tên người dùng đã tồn tại")</script>';
                    echo '<meta http-equiv="refresh>" content="0;url=./index.php?action=dangky"';
                    
                } elseif($checkemail>=1) {
                    echo '<script>alert("Email đã tồn tại")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"';
                } else {
                    $insert = $kh->insertUser($tenkh, $user, $passnew, $email, $diachi, $sdt);
                    if ($insert) {
                        echo '<script>alert("Đăng ký thành công")</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php"';
                    } else {
                        echo '<script>alert("Đăng ký không thành công")</script>';
                        // include_once "./View/registration.php";
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"';
                    }
                }
            }
            break;
    }

?>