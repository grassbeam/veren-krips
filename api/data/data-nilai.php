<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    require_once '../controller/data-nilai.php';

    $dataNilaiController = new DataNilaiController($DataNilaiDB);

    // echo json_encode($_GET);
    // if (!isset($_GET['pageno']) || !isset($_GET['rowcount'])) {
    //     echo json_encode(createGeneralResponseModel(false, "Invalid Parameter"));
    // } else {
    //     $pageNo = $_GET['pageno'];
    //     $rowCount = $_GET['rowcount'];

    //     $result = $dataNilaiController->getDataNilaiByPaging($pageNo, $rowCount);
    //     echo json_encode($result);
    // }

    $columns = $_GET["columns"];
    $start = $_GET["start"];
    $length = $_GET["length"];
    $order = $_GET["order"][0];
    $draw = $_GET["draw"];

    $result = $dataNilaiController->getDataNilaiByDT($columns, $start, $length, $order, $draw);
    echo json_encode($result);


?>