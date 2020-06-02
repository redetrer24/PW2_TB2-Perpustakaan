<div id="container"></div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    // Build the chart
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perbandingan Stok Antar Buku'
    },
    xAxis: {
        categories: [
            'Buku',
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Stok'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
        <?php foreach($data_buku as $buku):?>
            {
                name  : '<?php echo $buku['Judul'];?>',
                data  : [<?php echo $buku['Stok'];?>],
                
            },
        <?php endforeach?>
    ]
});
</script>
