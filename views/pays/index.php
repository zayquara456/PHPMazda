<?php
require_once 'helpers/Helper.php';
?>
<!--form search-->
<form action="" method="GET">
    <div class="form-group">
        <label for="title">Tìm kiếm theo mã sản phẩm</label>
        <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" id="title"
               class="form-control"/>
    </div>
    <input type="hidden" name="controller" value="chitieu"/>
    <input type="hidden" name="action" value="index"/>
    <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>
    <a href="index.php?controller=chitieu" class="btn btn-default">Xóa filter</a>
</form>


<h1>Danh sách chi tiêu</h1>
    <a href="index.php?controller=chitieu&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Mã sản phẩm</th>
        <th>Giá tiền nhập</th>
        <th>Số lượng nhập</th>
        <th>Người nhập</th>
        <th></th>
    </tr>
    <?php if (!empty($pays)): ?>
        <?php foreach ($pays as $pay): ?>
            <tr>
                <td><?php echo $pay['MaCT'] ?></td>
                <td><?php echo $pay['MaSP'] ?></td>
                <td><?php echo number_format($pay['GiaTienNhap']) ?></td>
                <td><?php echo $pay['SoLuongNhap'] ?></td>
                <td><?php echo $pay['NguoiNhap'] ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=chitieu&action=detail&id=" . $pay['MaCT'];
                    $url_update = "index.php?controller=chitieu&action=update&id=" . $pay['MaCT'];
                    $url_delete = "index.php?controller=chitieu&action=delete&id=" . $pay['MaCT'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>
<?php echo $pages; ?>