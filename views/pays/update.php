<h2>Cập nhật chi tiêu</h2>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="masp">Nhập mã sản phẩm</label>
        <input type="text" name="masp" readonly
               value="<?php echo isset($_POST['MaSP']) ? $_POST['MaSP'] : $pay['MaSP'] ?>"
               class="form-control" id="title"/>
    </div>
  <div class="form-group">
       <label for="giatiennhap">Giá tiền nhập mới</label>
        <input type="number" name="giatiennhap"
               value="<?php echo isset($_POST['GiaTienNhap']) ? $_POST['GiaTienNhap'] : $pay['GiaTienNhap'] ?>"
               class="form-control" id="title"/>
    </div>
  <!-- <div class="form-group">
       <label for="soluongnhap">Số lượng nhập cũ</label>
        <input type="number" name="soluongnhap"
               value="<?php echo isset($_POST['SoLuongNhap']) ? $_POST['SoLuongNhap'] : $pay['SoLuongNhap'] ?>"
               class="form-control" id="title"/>
    </div> -->
    <div class="form-group">
       <label for="soluongnhap">Số lượng nhập</label>
        <input type="number" name="soluongnhap"
               value="<?php echo isset($_POST['SoLuongNhap']) ? $_POST['SoLuongNhap'] : $pay['SoLuongNhap'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
       <label for="nguoinhap">Người nhập</label>
        <input type="text" name="nguoinhap"
               value="<?php echo isset($_POST['NguoiNhap']) ? $_POST['NguoiNhap'] : $pay['NguoiNhap'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=chitieu&action=index" class="btn btn-default">Back</a>
    </div>
</form>