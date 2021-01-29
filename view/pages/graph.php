<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
    
    require_once './utility/config.php';
    require_once './utility/db.php';
    require_once './utility/utility.php';
    require_once './model/data-master.php';

    $MasterDataDB = new DB_MasterData();


    require_once './controller/data-master-controller.php';

    $masterDataController = new DataMasterController($MasterDataDB);

    $MasterArr = $masterDataController->getAllMasterData([$masterDataController->INDEX_DATA_GURU]);
    $DATA_GURU = $MasterArr[$masterDataController->INDEX_DATA_GURU];

?>
    <div class="jumbotron page-header">
        <p class="h1">Graph Page</p>  
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum dapibus arcu eget condimentum. Curabitur sagittis sollicitudin quam non iaculis. In hac habitasse platea dictumst. Praesent tempus ligula ac accumsan viverra. Ut tempus eleifend molestie. Integer quis blandit nunc. Praesent at leo eu sem finibus porta vel nec metus.</p>
    </div>
    <div class="container">
        <div class="row graph-row">
            <div class="col-6 pl-0 ">
                <?php 
                    require_once './view/components/graph/graph1.php';
                ?>
            </div>
            
            <div class="col-6 pr-0 ">
                <?php 
                    require_once './view/components/graph/graph2.php';
                ?>
            </div>

        </div>

        <div class="row graph-row">
            <div class="col-12 p-0">
                <?php 
                    require_once './view/components/graph/graph3.php';
                ?>
            </div>
        </div>

        <div class="row graph-row">
            <div class="col-12 p-0">
                <?php 
                    require_once './view/components/graph/graph4.php';
                ?>
            </div>
        </div>

        <div class="row graph-row">
            <div class="col-12 p-0">
                <?php 
                    require_once './view/components/graph/graph5.php';
                ?>
            </div>
        </div>

        <div class="row graph-row">
            <div class="col-12 p-0">
                <?php 
                    require_once './view/components/graph/graph6.php';
                ?>
            </div>
        </div>

    </div>


    <script>
        // $('.graph-filter-select2').select2();
    // $(document).ready(function() {

    // } );
    </script>