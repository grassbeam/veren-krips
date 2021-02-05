<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>
<div class="accordion mb-4" id="accordiongraphNum3">
    <div class="card">
        <div class="card-header" id="headinggraphNum3">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsegraphNum3" aria-expanded="false" aria-controls="collapsegraphNum3">
                    <h6>Prestasi siswa di berbagai jurusan berdasarkan SMP Asal siswa.</h6>
                </button>
            </h2>
        </div>
        <div id="collapsegraphNum3" class="collapse " aria-labelledby="headinggraphNum3" data-parent="#accordiongraphNum3">
            <div class="card-body">
                <h5>Graph 3</h5>
                <div id="loadergraphNum3" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <canvas id="graphNum3" ></canvas>
            </div>
         </div>
    </div>
</div>


<script>
$(document).ready(function() {

    $.get($('#BASEURL').val() + "api/get.php?context=graphthree", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum3');
        $("#loadergraphNum3").removeClass('d-flex').hide();
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
                            beginAtZero: true
                        }
                    }]
                },
            }
        });
    });
    
});

</script>
