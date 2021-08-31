<?php
require_once 'helpers/Helper.php';
?>

<h1>Danh sách hàng tồn</h1>
    <a href="index.php?controller=hangton&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
<table class="table table-bordered">
    <tr>
        <th>Mã hàng tồn</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng tồn</th>
        <th>Vốn tồn kho</th>
        <th></th>
    </tr>
    <?php if (!empty($storages)): ?>
        <?php foreach ($storages as $storage): ?>
            <tr>
                <td><?php echo $storage['MaHT'] ?></td>
                <td><?php echo $storage['TenSP'] ?></td>
                <td><?php echo number_format($storage['SoLuongTon']) ?></td>
                <td><?php echo number_format($storage['VonTonKho']) ?> &nbsp; VNĐ</td>
                <!-- <td>
                    <?php
                    $url_detail = "index.php?controller=storage&action=detail&id=" . $storage['MaSP'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                </td> -->
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Tổng vốn: <?php echo number_format($tongvon['TongVon']) ; ?> &nbsp; VNĐ</b></td>
    </tr>
</table>
<?php echo $pages; ?>