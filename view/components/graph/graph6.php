<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div id="containergraphNum6" class="bg-light p-4 rounded">
    <h5>Graph 6</h5>
    <p><em>Kualitas pengajaran guru berdasarkan nilai teori rata-rata siswa</em></p>
    <button class="btn btn-light" id="clearAllGurugraphNum6">Clear All</button>
    <button class="btn btn-primary" id="selectAllGurugraphNum6">Select All</button>
    <div id="loadergraphNum6" class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <canvas id="graphNum6" ></canvas>
</div>

<script>

var graphNum6Obj = null;

const creatingGraph6 = function(ctx, chartData) {

    graphNum6Obj = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                // aspectRatio: 1, // to make the chart square shapped
                legend: {
                    display: true,
                    position: 'bottom',
                },
                // scales: {
                //     yAxes: [{
                //         ticks: {
                //             stepSize: 0.0001,
                //         }
                //     }]
                // },
            }
        });
};

$(document).ready(function() {



    $('#selectAllGurugraphNum6').click(function (e) {
        e.preventDefault();
        graphNum6Obj.data.datasets.forEach(function(ds) {
            ds.hidden = false;
        });
        graphNum6Obj.update();
    });

    $('#clearAllGurugraphNum6').click(function (e) {
        e.preventDefault();
        graphNum6Obj.data.datasets.forEach(function(ds) {
            ds.hidden = true;
        });
        graphNum6Obj.update();
    });

    $.get($('#BASEURL').val() + "api/get.php?context=graphsix", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum6');
        $("#loadergraphNum6").removeClass('d-flex').hide();
        creatingGraph6(ctx, chartData);
    });
    
});


</script>
