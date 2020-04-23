<div class="chart">
    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
<script src="{{asset('js/Chart.min.js')}}"></script>
<script>
    var areaChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label               : 'Finca',
                borderColor         : '#00b388',
                pointColor          : '#00b388',
                pointStyle          : 'circle',
                hitRadius           : 5,
                pointStrokeColor    : '#00b388',
                pointBackgroundColor: '#00b388',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: '#00b388',
                data                : [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label               : 'Promedio',
                borderColor         : '#0083b3',
                hitRadius           : 5,
                pointColor          : '#0083b3',
                pointBackgroundColor: '#0083b3',
                pointStrokeColor    : '#0083b3',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: '#0083b3',
                data                : [65, 59, 80, 81, 100, 55, 40]
            },
            {
                label               : 'El mejor',
                borderColor         : '#7500b3',
                hitRadius           : 5,
                pointColor          : '#7500b3',
                pointBackgroundColor: '#7500b3',
                pointStrokeColor    : '#7500b3',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: '#7500b3',
                data                : [12, 30, 50, 40, 54, 67, 80]
            }
        ]
    }

    var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
            display: true,
            position: 'bottom'
        },
        scales: {
            xAxes: [{
                gridLines : {
                    display : true,
                }
            }],
            yAxes: [{
                gridLines : {
                    display : true,
                }
            }]
        }
    }

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartData.datasets[2].fill = false;
    lineChartOptions.datasetFill = false;

    var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
    });
</script>
