<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div class="bg-light p-4 rounded">
    <h5>Graph 2</h5>
    <canvas id="canvasGraph2"></canvas>
</div>

<script>
var ctx = document.getElementById('canvasGraph2');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Budha', 'Hindu', 'Islam', 'Katolik', 'Protestan'],
        datasets: [
            {
                label: 'First dataset',
                data: [0, 20, 40, 50],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Second dataset',
                data: [10, 20, 30, 40],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        aspectRatio: 1,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
    }
});
</script>
