<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div class="accordion mb-4" id="accordiongraphNum7">
    <div class="card">
        <div class="card-header" id="headinggraphNum7">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsegraphNum7" aria-expanded="false" aria-controls="collapsegraphNum7">
                    <h6>Perkembangan prestasi siswa per tahun</h6>
                </button>
            </h2>
        </div>
        <div id="collapsegraphNum7" class="collapse " aria-labelledby="headinggraphNum7" data-parent="#accordiongraphNum7">
            <div class="card-body">
                <h5>Graph 7</h5>
                <div id="loadergraphNum7" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <canvas id="graphNum7" ></canvas>
                
                <div class="bg-light p-4 rounded">
                    <!-- <h6>Data Graph 1</h6> -->
                    <table id="tablegraphNum7" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>PointX</th>
                                <th>PointY</th>
                                <th>Num</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                
            </div>
         </div>
    </div>
</div>


<script>
$(document).ready(function() {

    $.get($('#BASEURL').val() + "api/get.php?context=graphseven", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum7');
        $("#loadergraphNum7").removeClass('d-flex').hide();
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

$('#tablegraphNum7').DataTable( {
    "scrollX": true,
    "searching": false,
    ajax: "api/get.php?context=graphdata&type=graphseven",
    columns: [
        { data: 'pointy' },
        { data: 'pointx' },
        { data: 'num' },
    ]
} );

});

</script>
