<h2>Thêm mới hàng tồn</h2>
<form method="post" action="" enctype="multipart/form-data">
<div class="form-group">
        <label for="masp">Nhập mã sản phẩm</label>
        <input type="text" name="masp" value="<?php echo isset($_POST['masp']) ? $_POST['masp'] : '' ?>"
               class="form-control" id="title"/>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Thêm mới"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>