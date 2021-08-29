<h2>Cập nhật thông tin khách hàng</h2>
<form action="" method="post" enctype="multipart/form-data" style="margin-top:20px;">
    <div class="form-group">
        <label for="">Nhập tên khách hàng</label>
        <input type="text" name="tenkh"
               value="<?php echo isset($_POST['tenkh']) ? $_POST['tenkh'] : $khach['tenkh'] ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="diachi"
               value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : $khach['diachi'] ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" name="sdt"
               value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : $khach['sdt'] ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Sinh nhật</label>
        <input type="text" name="sinhnhat"
               value="<?php echo isset($_POST['sinhnhat']) ? $_POST['sinhnhat'] : $khach['sinhnhat'] ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Sở thích</label>
        <input type="text" name="sothich"
               value="<?php echo isset($_POST['sothich']) ? $_POST['sothich'] : $khach['sothich'] ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <label for="">Ngày thêm</label>
        <input type="date" name="ngaythem"
               value="<?php echo isset($_POST['ngaythem']) ? $_POST['ngaythem'] : $khach['ngaythem'] ?>"
               class="form-control" />
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary"/>
        <a href="index.php?controller=khachhang&action=index" class="btn btn-default">Back</a>
    </div>
</form>
<style>
    label{
        font-size: 17px;
    }
</style>