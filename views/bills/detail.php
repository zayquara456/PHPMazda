<h1>Chi tiết hóa đơn</h1>

<table class="table table-bordered">
    <tr>
        <th>Mã hóa đơn</th>
        <td><?php echo $bill['MaHD']; ?></td>
    </tr>
    <tr>
        <th>Ngày tạo hóa đơn</th>
        <td><?php echo $bill['NgayGioTao']; ?></td>
    </tr>
    <tr>
        <th>Nhân viên tạo hóa đơn</th>
        <td><?php echo $bill['NhanVien']; ?></td>
    </tr>
    <tr>
        <th>Tên khách hàng</th>
        <td><?php echo $bill['TenKhachHang']; ?></td>
    </tr>
	 <tr>
        <th>Mã sản phẩm</th>
        <td><?php echo $bill['MaSP']; ?></td>
    </tr>
	 <tr>
        <th>Tên sản phẩm</th>
        <td><?php echo $bill['TenSP']; ?></td>
    </tr>
	 <tr>
        <th>Đơn giá</th>
        <td><?php echo $bill['DonGia']; ?></td>
    </tr>	
	 <tr>
        <th>Số lượng mua</th>
        <td><?php echo $bill['SoLuongMua']; ?></td>
    </tr>
	<tr>
        <th>Thành Tiền</th>
        <td><?php echo ($bill['SoLuongMua']*$bill['DonGia']); ?></td>
    </tr>
   
</table>
<a class="btn btn-primary" href="index.php?controller=hoadon">Back</a>

