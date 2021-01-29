<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    require_once '../controller/graph-controller.php';

    $graphDataController = new GraphDataController($DataNilaiDB);

    $filterGuru = [];
    if (isset($_GET['filter1'])){
        $filterGuru=$_GET['filter1'];
    }

    $result = $graphDataController->getDataGraphSix($filterGuru);
    echo json_encode($result);


?>