
<style>
    a>span:hover{
       color: #007aff;
    }
    .nav-item>.active{
        text-decoration: underline;
    }
    .nav-link.active {
    text-decoration: underline;
    /* position: relative; */
}



</style>
      <!-- Heading -->
      
  
    <p>Home</p>
      <div class="container">
    <div class="text-center">
        <ul class="nav mt-5 justify-content-center d-inline-flex flex-wrap">
            <li class="nav-item">
                <a href="#new" class="nav-link active" data-toggle="tab"><h1>New Poducts</h1></a>
            </li>
            <li class="nav-item">
                <a href="#sale" class="nav-link" data-toggle="tab"><h1>Sale Products</h1></a>
            </li>
        </ul>
    </div>
</div>

      <!--Grid row-->

  <div class="tab-content">
    <div class="tab-pane active" id="new">
        <!-- <h3 class="mb-5 font-weight-bold text-center" style="color: red">SẢN PHẨM MỚI NHẤT</h3> -->
        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-md product">
                    <?php
                    $hh = new hanghoa();
                    $result = $hh->getHangHoaNew();
                    while ($set = $result->fetch()):
                    ?> 
                    <div class="col-lg-3 mb-5 text-center">
                        <div class="product-entry border-hover">
                            <a href="index.php?action=sanphamchitiet&id=<?php echo $set['mamh']; ?>" class="prod-img">
                                <img src="./Content/img_shopao/<?php echo $set['hinh'] ?>" style="height: 253px;" class="img-fluid" alt="">
                                <div class="desc">
                                <h2><a href="index.php?action=sanphamchitiet&id=<?php echo $set['mamh']; ?>"><?php echo $set['tenmh'] ?></a></h2>
                                <?php
                                    if ($set['giamgia']) {
                                ?>
                                <h5 class="my-4 font-weight-bold">
                                    <font><?php echo number_format($set['dongia'] - ($set['giamgia'] / 100 * $set['dongia'])); ?><sup><u>đ</u></sup></font>
                                    <strike><?php echo number_format($set['dongia']); ?></strike><sup><u>đ</u></sup>
                                </h5>
                                <?php } else {?>
                                    <h5 class="my-4 font-weight-bold">
                                        <font><?php echo number_format($set['dongia']); ?><sup><u>đ</u></sup></font> 
                                    </h5> <?php }?>
                                <p class="border">NEW</p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><a href="index.php?action=allnew" class="btn btn-primary btn-lg">XEM CHI TIẾT</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="sale">
        <!-- <h3 class="mb-5 font-weight-bold text-center" style="color: red">SẢN PHẨM KHUYẾN MÃI</h3> -->
        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-md product">
                    <?php
                    $hh = new hanghoa();
                    $result = $hh->getHangHoaSale();
                    while ($set = $result->fetch()):
                    ?> 
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border-hover">
                            <a href="index.php?action=sanphamchitiet&id=<?php echo $set['mamh']; ?>" class="prod-img">
                                <img src="./Content/img_shopao/<?php echo $set['hinh'] ?>" style="height: 253px;" class="img-fluid" alt="">
                            </a>
                            <div class="desc">
                                <h2><a href="index.php?action=sanphamchitiet&id=<?php echo $set['mamh']; ?>"><?php echo $set['tenmh'] ?></a></h2>
                                <h5 class="my-4 font-weight-bold">
                                    <font><?php echo number_format($set['dongia'] - ($set['giamgia'] / 100 * $set['dongia'])); ?><sup><u>đ</u></sup></font>
                                    <strike><?php echo number_format($set['dongia']); ?></strike><sup><u>đ</u></sup>
                                </h5>
                                <p class="border">SALE <?php echo $set['giamgia'] ?>%</p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><a href="index.php?action=allsale" class="btn btn-primary btn-lg">XEM CHI TIẾT</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-hover:hover {
      transition: transform 0.4s ease-in-out;
      transform: scale(1.05);
      border: 2px solid #007bff
    }

    .border-hover {
      border: 1px solid #bababa;
    }
  </style>