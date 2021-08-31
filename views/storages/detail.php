<?php
require_once 'helpers/Helper.php';
?>
<table class="table table-bordered">
    <tr>
        <th>Mã hàng tồn</th>
        <td><?php echo $storage['MaHT']?></td>
    </tr>
    <tr>
        <th>Tên sản phẩm</th>
        <td><?php echo $storage['TenSP']?></td>
    </tr>
    <tr>
        <th>Hãng</th>
        <td><?php echo $storage['Hang']?></td>
    </tr>
  <tr>
        <th>Màu hiện có</th>
        <td><?php echo $storage['MauHienCo']?></td>
    </tr>
    <tr>
        <th>Số ghế</th>
        <td><?php echo $storage['SoGhe'] ?></td>
    </tr>
    <tr>
        <th>Số lượng tồn kho</th>
        <td><?php echo $storage['SoLuongTon'] ?></td>
    </tr>
    <tr>
        <th>Vốn tồn kho</th>
        <td><?php echo number_format($storage['VonTonKho']) ?></td>
    </tr>
  
</table>
<a href="index.php?controller=storage&action=index" class="btn btn-default">Back</a>