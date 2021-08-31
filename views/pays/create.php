<h2>Thêm mới chi tiêu </h2>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="masp">Nhập mã sản phẩm</label>
        <input type="text" name="masp" value="<?php echo isset($_POST['masp']) ? $_POST['masp'] : '' ?>"
               class="form-control" id="title"/>
    </div>
  <div class="form-group">
        <label for="giatiennhap">Giá tiền nhập</label>
        <input type="number" name="giatiennhap" value="<?php echo isset($_POST['giatiennhap']) ? $_POST['giatiennhap'] : '' ?>"
               class="form-control" id="amount"/>
    </div>
	 <div class="form-group">
        <label for="soluong">Số lượng nhập</label>
        <input type="number" name="soluongnhap" value="<?php echo isset($_POST['soluongnhap']) ? $_POST['soluongnhap'] : '' ?>"
               class="form-control" id="amount"/>
    </div>
    <div class="form-group">
        <label for="nguoinhap">Người nhập</label>
        <input type="text" name="nguoinhap" value="<?php echo isset($_POST['nguoinhap']) ? $_POST['nguoinhap'] : '' ?>"
               class="form-control" id="amount"/>
    </div>
  

    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </div>
</form>