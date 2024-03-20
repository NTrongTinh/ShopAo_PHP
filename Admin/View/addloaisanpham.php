<div class="row mt-5">
  <div class="card h-100 col-md-4 p-0">
        <div class="card-header bg-primary text-center">
           <h4>THÊM LOẠI</h4>
        </div>
        <div class="card-body">
        <form action="index.php?action=loai&act=loai_action" method="post" enctype="multipart/form-data">
              <!-- <div class="form-group">
                <label for="">Mã loại</label>
                <input type="text" readonly name="idloai" placeholder="Không cần nhập mã loại" class="form-control" >
              </div> -->
              <div class="form-group">
                <label for="">Tên loại</label>
                <input type="text" name="tenloai" class="form-control">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
          </form>
        </div>
  </div>
  <div class="col-md-2"></div>
  <div class="col-md-4">
    <h1 class="text-center"><b>Danh sách loại</b></h1>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success">
        <tr>
          <th>Mã loại</th>
          <th>Tên loại</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $loai = new loai();
          $result = $loai->getLoai();
          while ($set=$result->fetch()) :
        ?>
        <tr>
          <td><?php echo $set['idloai']?></td>
          <td><?php echo $set['tenloai']?></td>
          <td><a href="index.php?action=loai&act=delloai&id=<?php echo $set['idloai'] ?>" type="button" class="btn btn-danger">Xóa</a></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>
      
