<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Quản lí bình luận</th>
        </tr>
    </thead>
</table>
<div class="table-responsive">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng bình luận</th>
                    <th>Mới nhất</th>
                    <th>Cũ nhất</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($statisticalComment as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value -> nameproduct ?></td>
                        <td><?php echo $value -> total_comment ?></td>
                        <td><?php echo $value -> new_comment ?></td>
                        <td><?php echo $value -> old_comment ?></td>
                        <td>
                            <a href="?action=detailsComment&&idproduct=<?php echo $value -> idproduct ?>" class="btn btn-primary edit">Chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>
