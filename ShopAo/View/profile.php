<?php
    $kh = new user();
    $user = $kh->getUser($_SESSION['makh']);
?>
<h1 class="text-center">Thông tin cá nhân</h1>
<form action="index.php?action=user&act=update_user" method="post">
    <div class="form-group">
        <label for="">Tên khách hàng</label>
        <input type="text" style="font-size: 14px" name="tenkh" id="" class="form-control" value="<?php echo $user['tenkh'] ?>">
        <label for="">Email</label>
        <input type="text" style="font-size: 14px" name="email" id="" class="form-control" value="<?php echo $user['email'] ?>">
        <label for="">Số điện thoại</label>
        <input type="text" style="font-size: 14px" name="sdt" id="" class="form-control" value="<?php echo $user['sdt'] ?>">
        <label for="">Địa chỉ</label>
        <input type="text" style="font-size: 14px" name="diachi" id="" class="form-control" value="<?php echo $user['diachi'] ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Lưu">
</form>