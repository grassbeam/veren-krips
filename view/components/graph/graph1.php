<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div class="accordion mb-4" id="accordiongraphNum1">
    <div class="card">
        <div class="card-header" id="headinggraphNum1">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsegraphNum1" aria-expanded="false" aria-controls="collapsegraphNum1">
                    <h6 id="title-graphNum1">Kualitas pembelajaran seluruh siswa laki-laki dan perempuan setiap tahun</h6>
                </button>
            </h2>
        </div>
        <div id="collapsegraphNum1" class="collapse " aria-labelledby="headinggraphNum1" data-parent="#accordiongraphNum1">
            <div class="card-body">
                <h5>Graph 1</h5>
                <div id="loadergraphNum1" class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <canvas id="graphNum1" ></canvas>

                <div class="bg-light p-4 rounded">
                    <!-- <h6>Data Graph 1</h6> -->
                    <table id="tablegraphNum1" class="display" style="width:100%">
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

    $.get($('#BASEURL').val() + "api/get.php?context=graphone", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum1');
        $("#loadergraphNum1").removeClass('d-flex').hide();
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

    $('#tablegraphNum1').DataTable( {
        "scrollX": true,
        "searching": false,
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'print',
                title: document.getElementById("title-graphNum1").innerText,
                customize: function ( win ) {
                    
                    // Generate image from Chart
                    var canvas = document.getElementById("graphNum1");

                    // Insert image after title
                    $(win.document.body).find('h1')
                        .after(
                            '<img src="' + canvas.toDataURL() + '"  />'
                        );
                }
            }
        ],
        ajax: "api/get.php?context=graphdata&type=graphone",
        columns: [
            { data: 'pointx' },
            { data: 'pointy' },
            { data: 'num' },
        ],
    } );

});

</script>
