<h2>Cập nhật sản phẩm</h2>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="tensp">Nhập tên sản phẩm</label>
        <input type="text" name="tensp"
               value="<?php echo isset($_POST['TenSP']) ? $_POST['TenSP'] : $product['TenSP'] ?>"
               class="form-control" id="title"/>
    </div>
<div class="form-group">
       <label for="hang">Nhập hãng xe</label>
        <input type="text" name="hang"
               value="<?php echo isset($_POST['Hang']) ? $_POST['Hang'] : $product['Hang'] ?>"
               class="form-control" id="title"/>
    </div>
<div class="form-group">
       <label for="mauhienco">Màu hiện có</label>
        <input type="text" name="mauhienco"
               value="<?php echo isset($_POST['MauHienCo']) ? $_POST['MauHienCo'] : $product['MauHienCo'] ?>"
               class="form-control" id="title"/>
    </div>
 <div class="form-group">
       <label for="soghe">Số ghế</label>
        <input type="number" name="soghe"
               value="<?php echo isset($_POST['SoGhe']) ? $_POST['SoGhe'] : $product['SoGhe'] ?>"
               class="form-control" id="title"/>
    </div>
  <div class="form-group">
       <label for="giatien">Giá tiền</label>
        <input type="number" name="giatien"
               value="<?php echo isset($_POST['GiaTien']) ? $_POST['GiaTien'] : $product['GiaTien'] ?>"
               class="form-control" id="title"/>
    </div>
  <div class="form-group">
       <label for="soluong">Số lượng còn lại</label>
        <input type="number" name="soluong"
               value="<?php echo isset($_POST['SoLuong']) ? $_POST['SoLuong'] : $product['SoLuong'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>
    </div>
</form>