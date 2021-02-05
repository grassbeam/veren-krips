<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div class="accordion mb-4" id="accordiongraphNum8">
    <div class="card">
        <div class="card-header" id="headinggraphNum8">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsegraphNum8" aria-expanded="false" aria-controls="collapsegraphNum8">
                    <h6>Ekstrakulikuler favorit siswa di setiap jurusan</h6>
                </button>
            </h2>
        </div>
        <div id="collapsegraphNum8" class="collapse " aria-labelledby="headinggraphNum8" data-parent="#accordiongraphNum8">
            <div class="card-body">
                <h5>Graph 8</h5>
                <div id="loadergraphNum8" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <canvas id="graphNum8" ></canvas>
            </div>
         </div>
    </div>
</div>


<script>
$(document).ready(function() {

    $.get($('#BASEURL').val() + "api/get.php?context=grapheight", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum8');
        $("#loadergraphNum8").removeClass('d-flex').hide();
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
