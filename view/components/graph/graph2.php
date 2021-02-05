<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>
<div class="accordion mb-4" id="accordiongraphNum2">
    <div class="card">
        <div class="card-header" id="headinggraphNum2">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsegraphNum2" aria-expanded="false" aria-controls="collapsegraphNum2">
                    <h6>Kualitas pembelajaran seluruh siswa laki-laki dan perempuan setiap tahun</h6>
                </button>
            </h2>
        </div>
        <div id="collapsegraphNum2" class="collapse " aria-labelledby="headinggraphNum2" data-parent="#accordiongraphNum2">
            <div class="card-body">
                <h5>Graph 2</h5>
                <div id="loadergraphNum2" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <canvas id="graphNum2" ></canvas>
            </div>
         </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $.get($('#BASEURL').val() + "api/get.php?context=graphtwo", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum2');
        $("#loadergraphNum2").removeClass('d-flex').hide();
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                aspectRatio: 1, // to make the chart square shapped
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
