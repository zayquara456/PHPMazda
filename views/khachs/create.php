<h2>Thêm mới khách hàng</h2>
<form method="post" action="" enctype="multipart/form-data" style="margin-top: 20px;">
    <div class="form-group">
        <label>Tên khách hàng</label>
        <input type="text" name="tenkh" value="<?php echo isset($_POST['tenkh']) ? $_POST['tenkh'] : ''; ?>"
               class="form-control"/>
    </div>
 <div class="form-group">
        <label>Địa chỉ</label>
        <input type="text" name="diachi" value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : ''; ?>"
               class="form-control"/>
    </div>

 <div class="form-group">
        <label>Số điện thoai</label>
        <input type="text" name="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : ''; ?>"
               class="form-control"/>
    </div>
	 <div class="form-group">
        <label>Sinh nhật</label>
        <input type="text" name="sinhnhat" value="<?php echo isset($_POST['sinhnhat']) ? $_POST['sinhnhat'] : ''; ?>"
               class="form-control"/>
    </div>
	 <div class="form-group">
        <label>Sở thích</label>
        <input type="text" name="sothich" value="<?php echo isset($_POST['sothich']) ? $_POST['sothich'] : ''; ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label>Ngày thêm</label>
        <input type="date" name="ngaythem" value="<?php echo isset($_POST['ngaythem']) ? $_POST['ngaythem'] : ''; ?>"
               class="form-control"/>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Thêm mới"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>
<style>
       label{
              font-size: 17px;
       }
</style>