<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    class DataMasterController {
        private $DBDATA;
        public $INDEX_DATA_GURU = "DATA_GURU";

        function __construct($dbData) {
            $this->DBDATA = $dbData;
        }

        function getAllMasterData($filter=[]) {
            $flagGetAll = count($filter) == 0;
            $returnData = [];

            if (in_array($this->INDEX_DATA_GURU, $filter) || $flagGetAll) {
                $returnData[$this->INDEX_DATA_GURU] = $this->DBDATA->getMasterGuru();
            }

            $this->DBDATA->closeDBConnection();

            return $returnData;
        }

    }

?>