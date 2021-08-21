<h1>Tìm kiếm</h1>
<form action="" method="get">
    <input type="hidden" name="controller" value="hoadon"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label>Nhập tên nhân viên</label>
        <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
        <a href="index.php?controller=hoadon" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách hóa đơn</h1>
<a href="index.php?controller=hoadon&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>Mã hóa đơn</th>
        <th>Ngày giờ</th>
        <th>Nhân Viên</th>
        <th></th>
    </tr>
  <?php if (!empty($bills)): ?>
    <?php foreach ($bills as $bill): ?>
          <tr>
              <td>
                <?php echo $bill['MaHD']; ?>
              </td>
              <td>
                <?php echo $bill['NgayGioTao']; ?>
              </td>
			  <td>
                <?php echo $bill['NhanVien']; ?>
              </td>
             
              <td>
                  <a href="index.php?controller=hoadon&action=detail&id=<?php echo $bill['MaHD'] ?>"
                     title="Chi tiết">
                      <i class="fa fa-eye"></i>
                  </a>
              </td>
          </tr>
    <?php endforeach ?>
      <tr>
          <td colspan="7"><?php echo $pages; ?></td>
      </tr>

  <?php else: ?>
      <tr>
          <td colspan="7">Không có bản ghi nào</td>
      </tr>
  <?php endif; ?>
</table>
<!--  hiển thị phân trang-->

