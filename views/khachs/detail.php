<h2>Thông tin chi tiết khách hàng</h2>

<table class="table table-hover" style="margin-top:20px;">
    <tr>
        <th>Mã khách hàng</th>
        <td><?php echo $khach['makh']; ?></td>
    </tr>
    <tr>
        <th>Tên khách hàng</th>
        <td><?php echo $khach['tenkh']; ?></td>
    </tr>
    <tr>
        <th>Địa chỉ</th>
        <td><?php echo $khach['diachi']; ?></td>
    </tr>
    <tr>
        <th>Số điện thoai</th>
        <td><?php echo $khach['sdt']; ?></td>
    </tr>
	 <tr>
        <th>Sinh nhật</th>
        <td><?php echo $khach['sinhnhat']; ?></td>
    </tr>
	 <tr>
        <th>Sở thích</th>
        <td><?php echo $khach['sothich']; ?></td>
    </tr>
	<tr>
        <th>Ngày thêm</th>
        <td><?php echo $khach['ngaythem']; ?></td>
    </tr>
   
</table>
<a class="btn btn-primary" href="index.php?controller=khachhang">Back</a>
<style>
    th,td{
        font-size: 17px;
    }
</style>

