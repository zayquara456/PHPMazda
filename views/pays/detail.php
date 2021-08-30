<?php
$date = date('m/d/Y h:i:s a', time());
?>
<h1>Chi tiết chi tiêu</h1>
<table class="table table-bordered">
    <tr>
        <th>Mã sản phẩm</th>
        <td><?php echo $pay['MaSP']; ?></td>
    </tr>
    <tr>
        <th>Tên sản phẩm</th>
        <td><?php echo $pay['TenSP']; ?></td>
    </tr>
    <tr>
        <th>Hãng</th>
        <td><?php echo $pay['Hang'] ?></td>
    </tr>
    <tr>
        <th>Màu hiện có</th>
        <td><?php echo $pay['MauHienCo'] ?></td>
    </tr>
    <tr>
        <th>Số ghế</th>
        <td><?php echo $pay['SoGhe'] ?></td>
    </tr>
    <tr>
        <th>Giá tiền nhập</th>
        <td><?php echo number_format($pay['GiaTienNhap']) ; ?> &nbsp; VNĐ</td>
    </tr>
    <tr>
        <th>Số lượng nhập</th>
        <td><?php echo $pay['SoLuongNhap']; ?></td>
    </tr>
    <tr>
        <th>Tổng tiền</th>
        <td><?php echo number_format($pay['SoLuongNhap'] * $pay['GiaTienNhap']); ?> &nbsp;VNĐ</td>
    </tr>

</table>
<a class="btn btn-primary" href="index.php?controller=chitieu">Back</a>