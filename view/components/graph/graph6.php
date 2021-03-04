<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div class="accordion mb-4" id="accordiongraphNum6">
    <div class="card">
        <div class="card-header" id="headinggraphNum6">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsegraphNum6" aria-expanded="false" aria-controls="collapsegraphNum6">
                    <h6 id="title-graphNum6">Kualitas pengajaran guru berdasarkan nilai teori rata-rata siswa</h6>
                </button>
            </h2>
        </div>
        <div id="collapsegraphNum6" class="collapse " aria-labelledby="headinggraphNum6" data-parent="#accordiongraphNum6">
            <div class="card-body">
                <h5>Graph 6</h5>
                <div id="loadergraphNum6" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <canvas id="graphNum6" ></canvas>
                
                <div class="bg-light p-4 rounded">
                    <!-- <h6 id="title-graphNum6">Data Graph 1</h6> -->
                    <table id="tablegraphNum6" class="display" style="width:100%">
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

    $.get($('#BASEURL').val() + "api/get.php?context=graphsix", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum6');
        $("#loadergraphNum6").removeClass('d-flex').hide();
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

$('#tablegraphNum6').DataTable( {
    "scrollX": true,
    "searching": false,
    "dom": 'Bfrtip',
    "buttons": [
        {
            extend: 'print',
            title: document.getElementById("title-graphNum6").innerText,
            customize: function ( win ) {
                
                // Generate image from Chart
                var canvas = document.getElementById("graphNum6");

                // Insert image after title
                $(win.document.body).find('h1')
                    .after(
                        '<img src="' + canvas.toDataURL() + '"  />'
                    );
            }
        }
    ],
    ajax: "api/get.php?context=graphdata&type=graphsix",
    columns: [
        { data: 'pointx' },
        { data: 'pointy' },
        { data: 'num' },
    ]
} );

});

</script>
