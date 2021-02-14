<?php 

if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

require_once '../controller/graph-controller.php';

$graphDataController = new GraphDataController($DataNilaiDB);

$type = $_GET['type'];


$result = $graphDataController->getDataGraph($type);
echo json_encode($result);

?>