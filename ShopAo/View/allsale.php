
<?php
// b1 lấy toognr số sản phẩm
$hh = new hanghoa();
$count = $hh->getCountHangHoaSaleAll();
// b2 xác định giới hạn của trang
$limit = 4;
// b3 xác định có bao nhiêu trang và sản sản phẩm đầu tiên của trang đó
$trang = new page();
$page = $trang->findPage($count, $limit);
// b4 lấy start
$start = $trang->findStart($limit);
echo $count;
?>
<!-- sản phẩm khuyến mãi -->
<section id="examples" class="text-center">

<!-- Heading -->
<div class="row">
  <div class="col-lg-4"></div>
    <div class="col-lg-4 text-right">
        <h3 class="mb-5 font-weight-bold text-center" style="color: red">SẢN PHẨM KHUYẾN MÃI</h3>
    </div>
    <div class="col-lg-4 text-right mt-4">
        <!-- <a href="index.php?action=allsale">
            <span style="color: gray;">Xem chi tiết</span></div>
    </a> -->


</div>
<!--Grid row-->
<div class="row">
   
<?php
$hh = new hanghoa();
$result = $hh->getAllHangHoaSalePage($start, $limit); //view lấy được dữ liệu là 8 hàng hóa mới nhất
// đổ dữ liệu lên view
while ($set = $result->fetch()): // set = array(mahh:24, tenhh:...)
    ?> 
                <!--Grid column-->
                <div class="col-lg-3 col-md-4 mb-3 text-left" style="display:block;">

                    <div class="view overlay z-depth-1-half">
                        <img style="width: 265px; height: 265px" src="./Content/img_shopao/<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
                        <div class="mask rgba-white-slight"></div>
                    </div>

                    <h5 class="my-4 font-weight-bold">
                        <font color="red"><?php echo number_format($set['dongia'] - ($set['giamgia'] / 100 * $set['dongia'])); ?><sup><u>đ</u></sup></font>
                        <strike><?php echo number_format($set['dongia']); ?></strike><sup><u>đ</u></sup>
                    </h5>

                    <a href="index.php?action=sanphamchitiet&id=<?php echo $set['mamh']; ?>">
                        <span><?php echo $set['tenmh'] ?></span></br>
                    </a>
                    <button class="btn btn-danger" id="may4" value="lap 4">Sale</button>

                </div>
        <?php endwhile; ?>
</div>
<!--Grid row-->

</section>
<div class="row">
<div class="col-md-6 div col-md-offset-3">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $page; $i++) {
                        ?>
                        <li ><a href="index.php?action=allsale&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php } ?>
                </ul>
</div>

</div>

<!-- end sản phẩm khuyến mãi -->