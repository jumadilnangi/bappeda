Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Penggunaan Anggaran'
    },
    //subtitle: {
    //    text: '(5 Tahun Terakhir)'
    //},
    xAxis: {
        //categories: vars.catChart,
        categories: ['Organisasi Perangkat Daerah'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pagu Indikatif (Rp.)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            ' <td style="padding:0"><b>Rp. {point.y:.1f}</b></td></tr>',
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
    series: out,
});