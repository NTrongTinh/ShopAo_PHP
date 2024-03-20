
<!--Section: Examples-->
<section id="examples" class="text-center">

<!-- Heading -->
<div class="row">
  <div class="col-lg-4"></div>
    <div class="col-lg-4 text-right">
        <h3 class="mb-5 font-weight-bold text-center" style="color: red">SẢN PHẨM MỚI NHẤT</h3>
    </div>
    <div class="col-lg-4 text-right mt-4">
        <!-- <a href="index.php?action=allnew">
            <span style="color: gray;">Xem chi tiết</span></div>
    </a> -->


</div>
<!--Grid row-->
<div class="row">
         <?php
         $hh = new hanghoa();
         $result = $hh->getHangHoaNew(); //view lấy được dữ liệu là 8 hàng hóa mới nhất
         // đổ dữ liệu lên view
         while ($set = $result->fetch()): // set = array(mahh:24, tenhh:...)
             ?> 
            <!--Grid column-->
            <div class="col-lg-3 col-md-4 mb-3 text-left">

                <div class="view overlay z-depth-1-half">
                    <img style="width: 265px; height: 265px" src="./Content/img_shopao/<?php echo $set['hinh'] ?>" class="img-fluid" alt="">
                    <div class="mask rgba-white-slight"></div>
                </div>

                <h5 class="my-4 font-weight-bold" style="color: red;"><?php echo number_format($set['dongia']) ?><sup><u>đ</u></sup></br>
                </h5>
                <a href="">
                    <span><?php echo $set['tenmh'] ?></span></br></a>
                <button class="btn btn-danger" id="may4" value="lap 4">New</button>

            </div>
          <?php endwhile; ?>
</div>

<!--Grid row-->

</section>