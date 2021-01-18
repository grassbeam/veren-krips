<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div class="bg-light p-4 rounded">
    <h5>Graph 1</h5>
    <canvas id="myChart" ></canvas>
</div>

<script>
$.get($('#BASEURL').val() + "api/get.php?context=graph1-test", function(data, status){
    const chartData = JSON.parse(data);
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            aspectRatio: 1,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });
});

</script>
