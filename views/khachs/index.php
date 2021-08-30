
<h1>Danh sách khách hàng</h1> <br>
<a href="index.php?controller=khachhang&action=create" class="btn btn-success">
  <b>  <i class="fa fa-plus"></i> Thêm mới </b>
</a>
<table class="table table-hover" style="font-size: 15px; margin-top:10px;">

    <tr style=" font-size: 17px;">
        <th>Mã khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th></th>
    </tr>

  <?php if (!empty($khachs)): ?>
    <?php foreach ($khachs as $khach): ?>
          <tr>
              <td>
              <b> &nbsp;&nbsp; <?php echo $khach['makh']; ?></b>
              </td>
              <td>
                <?php echo $khach['tenkh']; ?>
              </td>
			  <td>
                <?php echo $khach['diachi']; ?>
              </td>
              <td>
                <?php echo $khach['sdt']; ?>
              </td>
              <td>
                
                  <a href="index.php?controller=khachhang&action=detail&id=<?php echo $khach['makh'] ?>"
                     title="Chi tiết">
                      <i class="fa fa-eye"></i>
                  </a>
                  <a title="Update" href="index.php?controller=khachhang&action=update&id=<?php echo $khach['makh'] ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                  <a title="Xóa" href="index.php?controller=khachhang&action=delete&id=<?php echo $khach['makh'] ?>" onclick="return confirm('Xác nhận xóa?')"><i
                                class="fa fa-trash"></i></a>
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

