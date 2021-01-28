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

        private function generateBarDataSets($rawResult) {
            $result["datasets"] = [];
            $result["labels"] = [];
            
            $tmpLabelDataset = "";
            $tmpData = [];
            $tmpBackgroundArr = [];
            $tmpBackgroundColor = "#000";
            $tmpTotalData = count($rawResult);
            foreach ($rawResult as $key => $data) {
                $dtPointX = $data["pointx"];
                $dtPointY = $data["pointy"];
                $dtTotal = $data["num"];

                if ($tmpLabelDataset != $dtPointY) {

                    if ($key >0) {
                        // Generate DataSets
                        $tmpDataSets["label"] = $tmpLabelDataset;
                        $tmpDataSets["data"] = $tmpData;
                        $tmpDataSets["backgroundColor"] = $tmpBackgroundArr;
                        $tmpDataSets["borderWidth"] = 1;
                        array_push($result["datasets"], $tmpDataSets); 
                    }

                    $tmpLabelDataset = $dtPointY;
                    $tmpData = [];
                    $tmpBackgroundArr = [];
                    $tmpBackgroundColor = $this->generateRandomColor();
                }

                if (!in_array($dtPointX, $result["labels"])) {
                    array_push($result["labels"], $dtPointX);
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
        
        function getDataGraphOne() {
            $rawResult = $this->DBDATA->getGraphOne();
            
            return $this->generateBarDataSets($rawResult);
        }

        function getDataGraphTwo() {
            $rawResult = $this->DBDATA->getGraphTwo();
            
            return $this->generateBarDataSets($rawResult);
        }

        function getDataGraphThree() {
            $rawResult = $this->DBDATA->getGraphThree();
            
            return $this->generateBarDataSets($rawResult);
        }

        function getDataGraphFour() {
            $rawResult = $this->DBDATA->getGraphFour();
            
            return $this->generateBarDataSets($rawResult);
        }

        function getDataGraphFive() {
            $rawResult = $this->DBDATA->getGraphFive();
            
            return $this->generateBarDataSets($rawResult);
        }

    }

?>