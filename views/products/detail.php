<?php
require_once 'helpers/Helper.php';
?>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $product['MaSP']?></td>
    </tr>
    <tr>
        <th>Tên sản phẩm</th>
        <td><?php echo $product['TenSP']?></td>
    </tr>
    <tr>
        <th>Hãng</th>
        <td><?php echo $product['Hang']?></td>
    </tr>
  <tr>
        <th>Màu hiện có</th>
        <td><?php echo $product['MauHienCo']?></td>
    </tr>
    <tr>
        <th>Số ghế</th>
        <td><?php echo $product['SoGhe'] ?></td>
    </tr>
    <tr>
        <th>Giá tiền</th>
        <td><?php echo $product['GiaTien'] ?></td>
    </tr>
    <tr>
        <th>Số lượng</th>
        <td><?php echo $product['SoLuong'] ?></td>
    </tr>
  
</table>
<a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>