<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>


<div id="containergraphNum6" class="bg-light p-4 rounded">
    <h5>Graph 6</h5>
    <p><em>Kualitas pengajaran guru berdasarkan nilai teori rata-rata siswa</em></p>
        <div class="accordion mb-4" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h6>Filter</h6>
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="p-3 collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <form action="#">
                        <div class="form-row mb-2">
                            <div class="col-12">
                                <label for="graphNum6-filter-guru">Nama Guru</label>
                                <select class="graph-filter-select2 form-control" id="graphNum6-filter-guru" name="guru[]" multiple="multiple">
                                    <?php
                                        foreach ($DATA_GURU as $guru) {
                                            echo '<option value="' . $guru . '" selected>' . $guru . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-3">
                                <button class="btn btn-light" id="clearAllGurugraphNum6">Clear All</button>
                                <button class="btn btn-primary" id="selectAllGurugraphNum6">Select All</button>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <div id="loadergraphNum6" class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <canvas id="graphNum6" ></canvas>
</div>

<script>

$('#graphNum6-filter-guru').select2();

var graphNum6Obj = null;

const creatingGraph6 = function(ctx, chartData) {

    graphNum6Obj = new Chart(ctx, {
            type: 'line',
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
                            stepSize: 0.0001,
                        }
                    }]
                },
            }
        });
};

const filteringGuruFunction = function(filterData) {

    $.get($('#BASEURL').val() + "api/get.php?", {  "context": "graphsix", "filter1[]": filterData } )
            .done (function(data, status){
                const chartData = JSON.parse(data);
                var ctx = document.getElementById('graphNum6');
                $("#loadergraphNum6").removeClass('d-flex').hide();
                creatingGraph6(ctx, chartData);
            });
};

$(document).ready(function() {

    $('#graphNum6-filter-guru').on('change', function (e) {
        // Do something
        const arrdata = $(this).select2('data').map(dt=>dt.text);
        if (arrdata.length > 0) {
            // only when length more than 0
            graphNum6Obj.destroy();
            $("#loadergraphNum6").addClass('d-flex').show();
            filteringGuruFunction(arrdata);
        }
    });

    $('#selectAllGurugraphNum6').click(function (e) {
        e.preventDefault();
        $("#graphNum6-filter-guru > option").prop("selected","selected");// Select All Options
        $("#graphNum6-filter-guru").trigger("change");// Trigger change to select 2
    });

    $('#clearAllGurugraphNum6').click(function (e) {
        e.preventDefault();
        $('#graphNum6-filter-guru').val(null).trigger('change');
    });

    $.get($('#BASEURL').val() + "api/get.php?context=graphsix", function(data, status){
        const chartData = JSON.parse(data);
        var ctx = document.getElementById('graphNum6');
        $("#loadergraphNum6").removeClass('d-flex').hide();
        creatingGraph6(ctx, chartData);
    });
    
});


</script>
