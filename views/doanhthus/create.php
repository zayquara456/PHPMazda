<h2>Thêm mới báo cáo</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Chọn Ngày</label>
        <input type="date" name="ngay" value="<?php echo isset($_POST['ngay']) ? $_POST['ngay'] : ''; ?>"
               class="form-control"/>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Thêm mới"/>
    <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
</form>