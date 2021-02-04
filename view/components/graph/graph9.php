<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div id="containergraphNum9" class="bg-light p-4 rounded">
    <h5>Graph 9</h5>
    <p><em>Rata-rata agama yang di anut oleh siswa</em></p>
    <div id="loadergraphNum9" class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <canvas id="graphNum9" ></canvas>
</div>

<script>
$(document).ready(function() {

    $.get($('#BASEURL').val() + "api/get.php?context=graphnine", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum9');
        $("#loadergraphNum9").removeClass('d-flex').hide();
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                // aspectRatio: 1, // to make the chart square shapped
                legend: {
                    display: true,
                    position: 'bottom',
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
});

</script>
