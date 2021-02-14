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

        private function generateLineDataSets($rawResult) {
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
                        $tmpDataSets["backgroundColor"] = $tmpBackgroundColor;
                        $tmpDataSets["borderColor"] = $tmpBackgroundColor;
                        $tmpDataSets["fill"] = false;
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
                    $tmpDataSets["backgroundColor"] = $tmpBackgroundColor;
                    $tmpDataSets["borderColor"] = $tmpBackgroundColor;
                    $tmpDataSets["fill"] = false;
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
        
        function getDataGraphSix($filterGuru) {
            $rawResult = $this->DBDATA->getGraphSix($filterGuru);
            
            
            return $this->generateBarDataSets($rawResult);
            // return $this->generateLineDataSets($rawResult);
        }
        
        function getDataGraphSeven() {
            $rawResult = $this->DBDATA->getGraphSeven();
            
            return $this->generateBarDataSets($rawResult);
        }
        
        function getDataGraphEight() {
            $rawResult = $this->DBDATA->getGraphEight();
            
            return $this->generateBarDataSets($rawResult);
        }
        
        function getDataGraphNine() {
            $rawResult = $this->DBDATA->getGraphNine();
            
            return $this->generateBarDataSets($rawResult);
        }

        function getDataGraph($type) {
            $result = array("data"=>"");
            switch($type) {
                case 'graphone':
                    $rawResult = $this->DBDATA->getGraphOne();
                    $result["data"] = $rawResult;
                    break;
                case 'graphtwo':
                    $rawResult = $this->DBDATA->getGraphTwo();
                    $result["data"] = $rawResult;
                    break;
                case 'graphthree':
                    $rawResult = $this->DBDATA->getGraphThree();
                    $result["data"] = $rawResult;
                    break;
                case 'graphfour':
                    $rawResult = $this->DBDATA->getGraphFour();
                    $result["data"] = $rawResult;
                    break;
                case 'graphfive':
                    $rawResult = $this->DBDATA->getGraphFive();
                    $result["data"] = $rawResult;
                    break;
                case 'graphsix':
                    $filterGuru = [];
                    $rawResult = $this->DBDATA->getGraphSix($filterGuru);
                    $result["data"] = $rawResult;
                    break;
                case 'graphseven':
                    $rawResult = $this->DBDATA->getGraphSeven();
                    $result["data"] = $rawResult;
                    break;
                case 'grapheight':
                    $rawResult = $this->DBDATA->getGraphEight();
                    $result["data"] = $rawResult;
                    break;
                case 'graphnine':
                    $rawResult = $this->DBDATA->getGraphNine();
                    $result["data"] = $rawResult;
                    break;
                default:
                    $result = createGeneralResponseModel(false, "Invalid Context");
                    break;
            }

            return $result;
        }
    }

?>