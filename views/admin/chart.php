<?php require './views/admin/navAdmin.php'; ?>

<table class="table">
    <thead class="table-success">
        <tr>
            <th>Thống kê</th>
        </tr>
    </thead>
</table>
<div id="piechart_3d" style="width: 900px; height: 500px; margin: 0 auto;"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'sectors');
        data.addColumn('number', 'percentage');

        <?php foreach ($statistical as $key => $value) : ?>
            <?php $sectors = $value->sectors; $quantity = (int)$value->percentage; ?>
            data.addRow(['<?php echo $sectors ?>', <?php echo $quantity ?>]);
        <?php endforeach; ?>

        var options = {
            title: 'Biểu đồ thống kê sản phẩm',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
