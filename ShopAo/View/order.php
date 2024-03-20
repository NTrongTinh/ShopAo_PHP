<style>
    /* CSS để làm mờ và vô hiệu hóa màu nền của input disabled */
    input[disabled] {
      background-color: transparent !important;
      border: none !important;
      opacity: 0.7; /* Điều chỉnh độ mờ nếu cần */
    }
    h5 {
      display: inline;
    }
  </style>
<div class="table-responsive">
    <?php
        // var_dump($_SESSION['masohd']);
        
      if (!isset($_SESSION['makh'])) :
        # code...
        echo '<script>alert("Ban chua dang nhap")</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
    ?>
    <?php else: ?>
    <form action="index.php?action=thanhtoan&act=thanhtoan_action" method="post">
      <table class="table table-bordered" border="0">
     <?php
      if (isset($_SESSION['masohd'])) {
        # code...
        $mshd = $_SESSION['masohd'];
        $makh = $_SESSION['makh'];
        // $hd = new hoadon();
        // $kh = $hd->selectThongTinKHHD($mshd);
        $ngay = $_SESSION['order'][0]['ngaydat'];
        $tenkh = $_SESSION['order'][0]['tenkh'];
        $diachi = $_SESSION['order'][0]['diachi'];
        $sdt = $_SESSION['order'][0]['sdt'];
      }
     ?>
        <input type="hidden" name="makh" value="<?php echo $makh?>">
        <input type="hidden" name="sohd" value="<?php echo $sohd?>">
        <input type="hidden" name="ngay" value="<?php echo $ngay?>">
       <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN</h2>
            <h5>Số Hóa đơn: <input type="text" disabled value="<?php echo $mshd; ?>"></h5>
            <h5 class="float-right"> Ngày lập: <input type="text"  disabled value="<?php echo $ngay; ?>"></h5>
          </td>
        </tr>
       <tr>
          <td >Họ và tên: <input type="text" disabled name="tenkh" value="<?php echo $tenkh; ?>"></td>
        </tr>
       <tr>
          <td >Địa chỉ: <input type="text" disabled name="diachi" value="<?php echo $diachi; ?>">  </td>
        </tr>
        <tr>
          <td >Số điện thoại: <input type="text" disabled name="sdt" value="<?php echo $sdt; ?>"> </td>
        </tr>
        ?>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $j = 0;
            // $sp = $hd->selectThongTinHHID($mshd);
            $gh = new giohang();
            $giohang = $gh->getGioHang($makh);
            foreach($giohang as $key=> $item):
              # code...
            $j++
          ?>

            <tr>
              <td><?php echo $j ?></td>
              <td><?php echo $item['tenmh']?></td>
              <td>Size: <?php echo $item['tensize'] ?> </td>
              <td>Đơn Giá:<?php echo number_format($item['dongia']) ?>  - Số Lượng: <?php echo $item['soluongmua'] ?> <br />
              </td>
            </tr>
              <?php endforeach;?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền
                
              </b>
            </td>
            <td style="float: right;">
              <b><?php
                  $gh = new giohang();
                  echo $gh->getSubTotal(); 
                ?> <sup><u>đ</u></sup></b>
            </td>
           
          </tr>
        </tbody>

      </table>
      
      <button type="submit" name="submit" class="btn btn-primary float-right">Mua Hàng</button>
    </form>
  <?php endif?>
</div>
</div>