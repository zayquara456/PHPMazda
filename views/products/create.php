<h2>Thêm mới sản phẩm </h2>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="tensp">Nhập tên sản phẩm</label>
        <input type="text" name="tensp" value="<?php echo isset($_POST['tensp']) ? $_POST['tensp'] : '' ?>"
               class="form-control" id="title"/>
    </div>
 <div class="form-group">
        <label for="hang">Nhập hãng xe</label>
        <input type="text" name="hang" value="<?php echo isset($_POST['hang']) ? $_POST['hang'] : '' ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="mauhienco">Màu hiện có</label>
        <input type="text" name="mauhienco" value="<?php echo isset($_POST['mauhienco']) ? $_POST['mauhienco'] : '' ?>"
               class="form-control" id="price"/>
    </div>
    <div class="form-group">
        <label for="soghe">Số ghế</label>
        <input type="number" name="soghe" value="<?php echo isset($_POST['soghe']) ? $_POST['soghe'] : '' ?>"
               class="form-control" id="amount"/>
    </div>
  <div class="form-group">
        <label for="giatien">Giá tiền</label>
        <input type="number" name="giatien" value="<?php echo isset($_POST['giatien']) ? $_POST['giatien'] : '' ?>"
               class="form-control" id="amount"/>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>
    </div>
</form>