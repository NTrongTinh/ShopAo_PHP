<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
     <?php
     foreach ($_SESSION['email'] as $key => $item) {
      # code...
      var_dump($item);
      if ($item['id'] == $pass) {
          # code...
          $saltF = 'TX024@';
          $passnew = md5($saltF.$pass);
          $emailold = $item['email'];
          $kh = new user();
          $kh->updatePassEmail($emailold,$passnew);
      }
      else {
          // echo "<script>alert('Loi')</script>";
      }
  }
     ?>
      
        <form  action="index.php?action=forget&act=resetpass" class="login-form" method="post">
        
            <input type="hidden" name="email" value="">
            <p>Nhập mật khẩu mới vừa cấp ở mail của bạn</p>
            <input type="password" name="password">
            <input type="submit" name="submit_password">

        </form>
        </div>
      </div>
    </div>
</section>