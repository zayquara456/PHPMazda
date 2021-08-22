<h2>Thêm mới hóa đơn</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nhân viên</label>
        <input type="text" name="nhanvien" value="<?php echo isset($_POST['nhanvien']) ? $_POST['nhanvien'] : ''; ?>"
               class="form-control"/>
    </div>
	 <div class="form-group">
        <label>Ngày viết hóa đơn: </label>
        <input type="text" name="time" value="<?php echo isset($_POST['time']) ? $_POST['time'] : 'yyyy/mm/dd'; ?>"
               class="form-control"/>
    </div>
 <div class="form-group">
        <label>Tên khách hàng</label>
        <input type="text" name="tenkhachhang" value="<?php echo isset($_POST['tenkhachhang']) ? $_POST['tenkhachhang'] : ''; ?>"
               class="form-control"/>
    </div>
	 <div class="form-group">
        <label>Mã sản phẩm</label>
        <input type="text" name="masp" value="<?php echo isset($_POST['masp']) ? $_POST['masp'] : ''; ?>"
               class="form-control"/>
    </div>
	 <div class="form-group">
        <label>Số lượng mua</label>
        <input type="text" name="soluongmua" value="<?php echo isset($_POST['soluongmua']) ? $_POST['soluongmua'] : ''; ?>"
               class="form-control"/>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>