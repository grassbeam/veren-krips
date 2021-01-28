<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div id="containergraphNum1" class="bg-light p-4 rounded">
    <h5>Graph 1</h5>
    <p><em>Kualitas pembelajaran seluruh siswa laki-laki dan perempuan setiap tahun</em></p>
    <div id="loadergraphNum1" class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <canvas id="graphNum1" ></canvas>
</div>

<script>
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

</script>
