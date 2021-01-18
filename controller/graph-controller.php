<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    // Can use db here...
    

    class GraphDataController {
        private $DBDATA;

        function __construct($dbData) {
            $this->DBDATA = $dbData;
        }

        private function generateRandomColor() {
            $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
            $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
            return $color;
        }

        function getDataGraphTestOne() {
            // Defining results...
            $result["datasets"] = [];
            $result["labels"] = [];

            $rawResult = $this->DBDATA->getGraphTest();
            
            $tmpLabelDataset = "";
            $tmpData = [];
            $tmpBackgroundArr = [];
            $tmpBackgroundColor = "#000";
            $tmpTotalData = count($rawResult);
            foreach ($rawResult as $key => $data) {
                $dtMapel = $data["mapel_lm"];
                $dtAgama = $data["agama"];
                $dtTotal = $data["total"];

                if ($tmpLabelDataset != $dtMapel) {

                    if ($key >0) {
                        // Generate DataSets
                        $tmpDataSets["label"] = $tmpLabelDataset;
                        $tmpDataSets["data"] = $tmpData;
                        $tmpDataSets["backgroundColor"] = $tmpBackgroundArr;
                        $tmpDataSets["borderWidth"] = 1;
                        array_push($result["datasets"], $tmpDataSets); 
                    }

                    $tmpLabelDataset = $dtMapel;
                    $tmpData = [];
                    $tmpBackgroundArr = [];
                    $tmpBackgroundColor = $this->generateRandomColor();
                }

                if (!in_array($dtAgama, $result["labels"])) {
                    array_push($result["labels"], $dtAgama);
                }

                array_push($tmpData, $dtTotal);
                array_push($tmpBackgroundArr, $tmpBackgroundColor);


                if ($key >= $tmpTotalData -1) {
                    // Generate DataSets
                    $tmpDataSets["label"] = $tmpLabelDataset;
                    $tmpDataSets["data"] = $tmpData;
                    $tmpDataSets["backgroundColor"] = $tmpBackgroundArr;
                    $tmpDataSets["borderWidth"] = 1;
                    array_push($result["datasets"], $tmpDataSets); 
                }
            }

            return $result;

        }

    }

?>