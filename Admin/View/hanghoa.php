
<div class="row pb-5">
<div  class="col-md-4 col-md-offset-4 mt-5"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12">
<a class="btn btn-primary mb-5" href="index.php?action=hanghoa&act=insert_hanghoa"><h4>Thêm sản phẩm</h4></a>
</div>
<table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Hình ảnh</th>
        <th>Tên hàng</th>
        <th>Mã loại</th>
        <!-- <th>Ngày lập</th> -->
        <th>Mô tả</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $hh = new hanghoa();
        $result = $hh->getHangHoa();
        while ($set=$result->fetch()) :
      ?>
      <tr>
        <td><?php echo $set['mamh'] ?> </td>
        <td style="padding:0; text-align:center;"><img src="../../Shop_Ao/ShopAo/Content/img_shopao/<?php echo $set['hinh'] ?>" alt="" style="width:50px"></td>
        <td><?php echo $set['tenmh'] ?> </td>
        <td><?php echo $set['idloai'] ?> </td>
        <!-- <td><?php echo $set['ngaylap'] ?> </td> -->
        <td><?php echo $set['mota'] ?> </td>
        <td class="text-center"><a class="btn btn-primary" href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mamh']?>">Chỉnh sửa</a></td>
        <td class="text-center"><a class="btn btn-danger" href="index.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set['mamh']?>">Xóa</a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<style>
  .table>tbody>tr>td{
    vertical-align: middle;
  }
</style>