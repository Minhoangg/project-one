<?php
$getdata = new thongke();
$data = [];
foreach ($getdata->getDataChart() as $key) {
    $data[] = "['" . $key['name'] . "'," . $key['countct'] . "]";
}
$data = implode(',', $data);
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
            ['Tên danh mục', 'Số lượng sản phẩm'],
            <?= $data ?>
        ]);

        const options = {
            title: 'BIỂU ĐỒ THỐNG KÊ SẢN PHẨM',
            is3D: false
        };

        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5">BIỂU ĐỒ THỐNG KÊ</h2>
        <div class="row mt-5">
            <div class="text-center" id="myChart" style="width:1000px; height:500px;">
            <div class="mx-auto ">
                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>
</body>

</html>
