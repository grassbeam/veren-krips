<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div id="containergraphNum5" class="bg-light p-4 rounded">
    <h5>Graph 5</h5>
    <p><em>Kualitas pembelajaran siswa berdasarkan guru per mata pelajaran</em></p>
    <div id="loadergraphNum5" class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <canvas id="graphNum5" ></canvas>
</div>

<script>
$.get($('#BASEURL').val() + "api/get.php?context=graphfive", function(data, status){
    const chartData = JSON.parse(data);
    var ctx = document.getElementById('graphNum5');
    $("#loadergraphNum5").removeClass('d-flex').hide();
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            // aspectRatio: 1, // to make the chart square shapped
            legend: {
                display: true,
                position: 'right',
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
        }
    });
});

</script>
