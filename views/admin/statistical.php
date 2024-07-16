<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Thống kê</th>
        </tr>
    </thead>
</table>
<div class="table-responsive">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Loại hàng</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($statistical as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value -> sectors ?></td>
                        <td><?php  echo $value -> count_product ?></td>
                        <td><?php echo number_format($value -> max_price) ?></td>
                        <td><?php echo number_format($value -> min_price) ?></td>
                        <td><?php echo number_format($value -> avg_price , 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <a href="?action=chart" class="btn products">Xem biểu đồ</a>
        </table>
    </div>
</div>