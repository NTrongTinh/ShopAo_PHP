
<div class="table-responsive">
  
    <?php
      $gh = new giohang();
      $giohang = $gh->getGioHang($_SESSION['makh']);
      if (count($giohang->fetchAll())>0) {
    ?>

    <form action="index.php?action=giohang&act=update_gh" method="post">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center bg-success"><th colspan="7"><h2 style="color: black; font-weight: bold">THÔNG TIN GIỎ HÀNG</h2></th></tr>
          <tr class="table-success text-center">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Tạm tính</th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
            <?php  
              $gh = new giohang();
              $giohang = $gh->getGioHang($_SESSION['makh']);
              // var_dump($giohang);
              foreach($giohang as $key =>$item):
            ?>
            <tr>
              <td><?php echo $key+1?></td>
              <td style="vertical-align: middle;"><img width="50px" height="50px" src="Content/img_shopao/<?php echo $item['hinh']?>">
              <?php echo $item['tenmh']; ?> </td>
              <td style="vertical-align: middle; text-align:center;">Size: <?php echo $item['tensize']?></td>
              <td style="vertical-align: middle; text-align:center;"><?php echo number_format($item['dongia']);?><sup><u>đ</u></sup></td>
              <td style="vertical-align: middle; text-align:center;">
                Số Lượng:<input type="number" min="1" max="<?php echo $item['soluongton'] ?>" name="newqty[<?php echo $key?>]" value="<?php echo $item['soluongmua']?>" style="width: 75px" />
                <p> Số lượng tồn: <?php echo $item['soluongton']?></p></td>
              <td style="vertical-align: middle; text-align:center;">
                <?php echo number_format($item['soluongmua']*$item['dongia'])?><sup><u>đ</u></sup>
              </td>
              <td style="vertical-align: middle; text-align:center;"><a href="index.php?action=giohang&act=giohang_xoa&id=<?php echo $item['mamh']?>"><button type="button" class="btn btn-danger" >Xóa</button></a>

              </td>
            </tr>
              <?php endforeach?>
          <tr>
            <td colspan="7"  style="vertical-align: middle; text-align:right;" >
              <h3>Tổng tiền 
                <?php
                  $gh = new giohang();
                  echo $gh->getSubTotal();
                ?>  
              <sup><u>đ</u></sup></h3>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="text-right">
              <a class="btn btn-primary bg-primary" href="index.php?action=thanhtoan">Thanh toán</a>
              <button type="submit" class="btn btn-success">Sửa</button>
      </div>
    </form>
        <?php
          } else {
            echo '
            <div class="text-center" style="margin: 9% 0">
              <h1 class="text-center">Giỏ hàng của bạn trống</h1>
              <a href="index.php" type="button" class="btn btn-primary">ĐI MUA NGAY</a>
            </div>
            ';
          }
        ?>
</div>
</div>