<?php 

    // Allowing POST method only
    if (!isset($_GET)) {
        die('<h1 class="try-hack">Restricted access!</h1>');
    }

    session_start();
    define('BASE', 'BASE');
    
    require_once '../utility/config.php';
    require_once '../utility/db.php';
    require_once '../utility/utility.php';

    /**
     * DB class
     */

     require_once '../model/data-nilai.php';


     $DataNilaiDB = new DB_DataNilai();

        // phpinfo();

     //////////////// END OF DB Class ////////////////

    $isContextValid = true;
    if (isset($_GET['context'])) {
        switch($_GET['context']) {
            case 'data':
                require_once './data/data-nilai.php';
                break;
            case 'graphone':
                require_once './graph/data-graph-1.php';
                break;
            case 'graphtwo':
                require_once './graph/data-graph-2.php';
                break;
            case 'graphthree':
                require_once './graph/data-graph-3.php';
                break;
            case 'graphfour':
                require_once './graph/data-graph-4.php';
                break;
            case 'graphfive':
                require_once './graph/data-graph-5.php';
                break;
            case 'graphsix':
                require_once './graph/data-graph-6.php';
                break;
            case 'graphseven':
                require_once './graph/data-graph-7.php';
                break;
            case 'grapheight':
                require_once './graph/data-graph-8.php';
                break;
            case 'graphnine':
                require_once './graph/data-graph-9.php';
                break;


            default:
                $isContextValid = false;
                break;
        }
    } else {
        $isContextValid = false;
    }

    if (!$isContextValid) {
        echo json_encode(createGeneralResponseModel(false, "Invalid Context"));
    }


?>