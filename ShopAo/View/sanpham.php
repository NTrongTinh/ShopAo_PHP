  <!-- quảng cáo -->
  
  <!-- end quảng cáo -->
  
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
 

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
             
          </div>

      </div>
      <!--Grid row-->
      
               <?php
               $hh = new hanghoa();
               $ac = 1;
                if ( $_GET['action']=='procLoai') {
                    # code...
                    $ac = 1;
                    $result = $hh->getHangHoaLoai($_GET['loai']);
                } else if($_GET['action']=='sanpham') {
                    $ac = 2;
                    $tk = $_POST['txtsearch'];
                    $result = $hh->selectTimKiem($tk);
                }
 //view lấy được dữ liệu là 8 hàng hóa mới nhất
               
               echo('<h1>SẢN PHẨM </h1><div class="row">');
               // đổ dữ liệu lên view
               while ($set = $result->fetch()): // set = array(mahh:24, tenhh:...)
                   ?> 
                        <div class="card col-lg-3 col-md-4 mb-3 text-left">
                            <a href=""><img class="card-img-top" style="width: 265px; height: 265px" src="./Content/img_shopao/<?php echo $set['hinh'] ?>" alt=""></a> 
                            <div class="card-body">
                                <a class="card-title text-dark" href="">
                                    <span><?php echo $set['tenmh'] ?></span></br>
                                </a>
                                <h5 class="my-4 font-weight-bold" ><?php echo number_format($set['dongia']) ?><sup><u>đ</u></sup></br>
                                  </h5>
                            </div>
                        </div>
                <?php endwhile; ?>

        </div>

      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->
  
 
  