<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>



<div class="accordion mb-4" id="accordiongraphNum4">
    <div class="card">
        <div class="card-header" id="headinggraphNum4">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsegraphNum4" aria-expanded="false" aria-controls="collapsegraphNum4">
                    <h6>Rata-rata nilai teori siswa laki-laki dan perempuan di setiap mapel dalam jurusan</h6>
                </button>
            </h2>
        </div>
        <div id="collapsegraphNum4" class="collapse " aria-labelledby="headinggraphNum4" data-parent="#accordiongraphNum4">
            <div class="card-body">
                <h5>Graph 4</h5>
                <div id="loadergraphNum4" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <canvas id="graphNum4" ></canvas>
                
                <div class="bg-light p-4 rounded">
                    <!-- <h6>Data Graph 1</h6> -->
                    <table id="tablegraphNum4" class="display" style="width:100%">
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

    $.get($('#BASEURL').val() + "api/get.php?context=graphfour", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum4');
        $("#loadergraphNum4").removeClass('d-flex').hide();
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                // aspectRatio: 1, // to make the chart square shapped
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                        }
                    }]
                },
            }
        });
    });

$('#tablegraphNum4').DataTable( {
    "scrollX": true,
    "searching": false,
    ajax: "api/get.php?context=graphdata&type=graphfour",
    columns: [
        { data: 'pointy' },
        { data: 'pointx' },
        { data: 'num' },
    ]
} );

    
});


</script>
