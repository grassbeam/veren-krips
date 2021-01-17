<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    // Can use db here...
    

    class DataNilaiController {
        private $DBDATA;

        function __construct($dbData) {
            $this->DBDATA = $dbData;
        }

        function getDataNilaiByPaging($pageNo, $rowCount) {
            return $this->DBDATA->getAllByPaging($pageNo, $rowCount);
        }

        function getDataNilaiByDT($columns, $start, $length, $order, $draw) {
            $query = "SELECT ";
            $totalCol = count($columns);
            for ($i=0; $i<$totalCol ; $i++) {
                $query = $query . $columns[$i]["data"];
                if ($i < $totalCol-1) {
                    $query = $query . ", ";
                }
            }

            $query = $query . " FROM data_nilai";

            $orderCol = $order["column"];
            $orderDir = $order["dir"];

            
            $query = $query . " ORDER BY " . ($orderCol+1) . " " . $orderDir;

            $query = $query . " LIMIT " . $start . ", " . $length;
            

            return $this->DBDATA->getAllByDataTable($draw, $query);
        }

    }

?>