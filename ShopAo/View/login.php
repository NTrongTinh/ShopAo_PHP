<section class="login-block">
  <div class="container">
    <!-- <div class="row">
      <div class="col-md-4 login-sec">
        <h3 class="text-center"><b>Login Now</b></h3>
        <form  action="index.php?action=dangnhap&act=dangnhap_action" class="login-form" method="post">
        
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Username</label>
            <input type="text" class="form-control" name="txtusername" placeholder="">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
            <input type="password" class="form-control" name="txtpassword" placeholder="">
          </div>


          <div class="form-check">
            <button class="btn btn-primary float-right" type="submit"> Đăng Nhập</button> 
            
          </div>

        </form>
        <div class="copy-text">Shop Giày <i class="fa fa-heart"></i> <a href="index.php?action=forget">Quên mật khẩu</a></div>
      </div> -->
      


    <div class="bg-light" style="padding-top: 10%; padding-bottom: 10%;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                  <form action="index.php?action=dangnhap&act=dangnhap_action" method="post">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                            <h1>Đăng nhập</h1>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                                  <input class="form-control" type="text" name="txtusername" placeholder=" Email" required="">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1" class="text-uppercase">Password</label>
                                  <input class="form-control" type="password" name="txtpassword" placeholder="Password" required="">
                                </div>
                                <button  class="btn btn-primary float-right" type="submit">Đăng nhập</button>
                            </form>
                            <div class="copy-text">
                              <a href="index.php?action=dangky" style="color: blue">Bạn chưa có tài khoản? Đăng kí</a> <br>
                              <a href="index.php?action=forget" style="color: blue">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
</section>