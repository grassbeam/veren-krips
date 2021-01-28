<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div id="containergraphNum3" class="bg-light p-4 rounded">
    <h5>Graph 3</h5>
    <p><em>Prestasi siswa di berbagai jurusan berdasarkan SMP Asal siswa.</em></p>
    <div id="loadergraphNum3" class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <canvas id="graphNum3" ></canvas>
</div>

<script>
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

</script>
