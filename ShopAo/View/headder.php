<style>
    .dropdown:hover>.dropdown-menu {
  display: block;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>

<header class="bg-white text-dark py-4 sticky-top header-shadow mb-5" id="myHeader">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-2">
          <h1 class="display-4">TINHXU</h1>
        </div>
        <div class="col-md-10 text-right">
          <nav>
            <ul class="list-inline mb-0">
              <li class="list-inline-item"><form class="form-inline my-2 my-lg-0" action="index.php?action=sanpham" method="post" >
                        <input class="form-control mr-sm-2 mb-0" type="text"  style="width:200px" placeholder="Tìm kiếm" name="txtsearch">
                        <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Tìm kiếm</button>
                    </form></li>
              <li class="list-inline-item"><a href="index.php" class="text-dark">Home</a></li>
              <li class="list-inline-item"><a href="#" class="text-dark">Giới thiệu</a></li>
              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <?php
                            $loai = new hanghoa();
                            $result = $loai->getLoai();
                            while ($set = $result->fetch()) :
                        ?>
                        <h5><a class="dropdown-item" href="index.php?action=procLoai&loai=<?php echo $set['idloai'] ?>"><?php echo $set['tenloai']?></a></h5>
                        <?php endwhile; ?>
                        
                    </div>
                </li>
              
              <?php
                            if (isset($_SESSION['makh'])) {
                                # code...
                                echo '
                                <li class="list-inline-item"><a href="index.php?action=giohang" class="nav-link "><img src="./Content/img_shopao/cartx2.png" width="30px" height="30px" alt=""></a></li>
                                    <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Xin chào '.$_SESSION['tenkh'].'</a>
                                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                                          <h5><a class="dropdown-item" href="index.php?action=user&act=thongtincanhan"">Thông tin</a></h5>
                                          <h5><a class="dropdown-item" href="index.php?action=user&act=lsgd"">Đơn đã mua</a></h5>
                                          <h5><a class="dropdown-item" href="index.php?action=dangnhap&act=dangxuat">Đăng xuất</a></h5>
                                      </div>
                                    </li>';
                            } else {
                                echo '<li class="list-inline-item">
                                        <a class="nav-link text-dark" href="index.php?action=dangky">Đăng ký</a>
                                    </li>
                                    <li class="list-inline-item">
                                    <a class="nav-link text-dark" href="index.php?action=dangnhap">Đăng nhập</a>
                                    </li>';
                            }
                        ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>