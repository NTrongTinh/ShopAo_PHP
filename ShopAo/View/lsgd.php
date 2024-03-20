<?php
    $kh = new user();
    $lsgd = $kh->lsgdUser($_SESSION['makh']);


?>
<h1 class="text-center">Lịch sử mua hàng</h1>
<table class="table table-bordered table-striped table-hover w-100">
    <thead class="bg-primary">
        <tr>
            <th>Mã hóa đơn</th>
            <th>Ngày mua</th>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($set = $lsgd->fetch()) :
        ?>
        <tr>
            <td><?php echo $set['masohd'] ?></td>
            <td><?php echo $set['ngaydat'] ?></td>
            <td><?php echo $set['tenmh'] ?></td>
            <td><?php echo $set['tensize'] ?></td>
            <td><?php echo $set['soluongmua'] ?></td>
            <td><?php echo $set['dongia'] ?></td>
            <td><?php echo $set['thanhtien'] ?></td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>