<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
    <?php
    if (isset($_GET['id'])) {
        # code...
        $id = $_GET['id'];
    }
    $hh = new hanghoa();
    $sp = $hh->getSanPhamChiTiet($id);
    ?>
    <!-- <p>Home>Sản phẩm chi tiết</p> -->
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div></div>

    </div>
        

    <div class="colorlib-product">
  <div class="container">
    <div class="row row-pb-lg product-detail-wrap">
      <div class="col-sm-6">
        <div class="owl-carousel">
          <div class="item">
            <div class="">
              <!-- <a href="#"> -->
                <img class="text-center" src="./Content/img_shopao/<?php echo $sp['hinh'] ?>" style="width: 75%; height:75%" class="img-fluid"
                  alt="Free html5 bootstrap 4 template">
              <!-- </a> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="product-desc">
          <form action="index.php?action=giohang&act=giohang_action" method="post">
            <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
            <h1><?php echo $sp['tenmh'] ?></h1>
            <?php
              if ($sp['giamgia']) {
            ?>
            <input type="hidden" name="giamgia" value="<?php echo $id; ?>" />
            <h2 class="my-4 font-weight-bold">
                <font><?php echo number_format($sp['dongia'] - ($sp['giamgia'] / 100 * $sp['dongia'])); ?><sup><u>đ</u></sup></font>
                <strike><?php echo number_format($sp['dongia']); ?></strike><sup><u>đ</u></sup>
            </h2>
            <?php } else {?>
                <h2 class="my-4 font-weight-bold">
                    <font><?php echo number_format($sp['dongia']); ?><sup><u>đ</u></sup></font> 
                </h2>
            <?php }?>
            <h2>Thông tin sản phẩm: </h2>
            <p>
              <?php echo $sp['mota'] ?>
            </p>
            <div class="size-wrap">
              <div class="block-26 mb-2">
                <!-- <select name="size" id=""> -->
                  <?php
                  $size = $hh->getSize($id);
                  if ($size->rowCount()>0) {
                    echo "
                    <h2>Size</h2>";
                  }
                  while ($set = $size->fetch()):
                  ?>
                  <input type="radio" name="size" value="<?php echo $set['idsize']; ?>" id="<?php echo $set['idsize']; ?>" style="font-size: 14px" <?php if($set['soluongton']<=0) echo "disabled"; ?>>
                    <label for="<?php echo $set['idsize']; ?>"><?php echo $set['tensize']; ?></label>
                    <?php
                      if ($set['soluongton']>0) {
                        echo "<span>Còn: ".$set['soluongton']."</span>";
                      } else {
                        echo "<span class='text-danger'>Size này đã hết hàng</span>";
                      }
                    ?>
                    
                  </input>
                  <input type="hidden" name="soluongton<?php echo $set['idsize']; ?>" value="<?php echo $set['soluongton'] ?>">
                  <br>
                  <?php endwhile; ?>
                <!-- </select> -->
              </div>
              <?php
                if ($size->rowCount() <= 0) { ?>
                <p class="text-danger">Đã hết hàng</p>
                <?php } ?>
              <div class="form-group mb-4">
                <h2>Số lượng</h2>
                <input type="number" name="soluong" style="width: 50%; font-size:16px" class="form-control"
                 min="1" value=1>
              </div>
              <div class="row" *ngIf="CommonService.isLog">
                <div class="col-sm-12 text-center">
                  <p style="color: white;" class="addtocart">
                    <input type="submit" name="submit" class="btn btn-primary btn-addtocart" value="Thêm vào giỏ hàng" <?php if( $sp['soluongton']<=0) echo "disabled"; ?>>
                  </p>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- bình luận -->
<div>        
            <?php
            if (isset($_SESSION['makh'])):
                ?>     
                                <p class="float-left"><b>BÌnh luận </b></p>
                            <form action="index.php?action=binhluan" method="post">
                            <div class="row">
              
                                    <input type="hidden" name="txtmahh" value="<?php echo $id; ?>" />
                                    <img src="Content/imagetourdien/people.png" width="50px" height="50px"; />
                                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                                    <input type="submit" class="btn btn-primary"  id="submitButton" style="float: right;" value="Bình Luận" />
                                
                            </div>
            
                            </form>
                            <?php
                            $bl = new binhluan();
                            $noidung = $bl->selectBinhLuan($id);
                            while ($set = $noidung->fetch()):
                                ?>
                                            <div class="col-12">
                                                <div class="row">
                                                    <img src="Content/imagetourdien/people.png" alt="" width="30px" height="30px">
                                                    <p>
                                                        <?php echo '<b>' . $set['username'] . '</b>:' . $set['content']; ?>
                                                    </p>
                                                </div>
                                            </div>
                            <?php endwhile ?>
                            <div class="row">
                               <br/>
                            </div>
                            <?php
            endif;
            ?>
        </div>
<style>
  input[type="radio"] {
    display: none;
    
  }
  label {
    width: 30px;
    height: 30px;
    text-align: center;
    border: 0.5px blue solid;
    border-radius:50%
  }
  input[type="radio"]:checked + label {
    background-color: aqua;
  }
</style>