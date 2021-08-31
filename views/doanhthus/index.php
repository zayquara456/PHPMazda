
<h1>Danh sách báo cáo doanh thu</h1>
<a href="index.php?controller=doanhthu&action=create" class="btn btn-success">
<b>  <i class="fa fa-plus"></i> Thêm mới </b>
</a>
<table class="table table-hover" style="font-size: 15px; margin-top:10px;">
    <tr style=" font-size: 17px;">
        <th>Mã doanh thu</th>
        <th>Ngày</th>
        <th>Số lượng đơn</th>
        <!-- <th>Số lượng khách</th> -->
        <th>Doanh thu</th>
        <th></th>
    </tr>
  <?php if (!empty($doanhthus)): ?>
    <?php foreach ($doanhthus as $doanhthu): ?>
          <tr>
              <td>
              <b> &nbsp;&nbsp;   <?php echo $doanhthu['madt']; ?> </b>
              </td>
              <td>
                <?php echo $doanhthu['ngay']; ?>
              </td>
              <td>
                <?php echo $doanhthu['soluongdon']; ?>
              </td>
              <!-- <td>
              
              </td> -->
              <td>
                <?php echo $doanhthu['doanhthu']; ?>
              </td>
              <td>
                <a title="Xóa" href="index.php?controller=doanhthu&action=delete&id=<?php echo $doanhthu['madt'] ?>" onclick="return confirm('Xác nhận xóa?')"><i
                              class="fa fa-trash"></i></a>
            </td>
          </tr>
    <?php endforeach; ?>
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

