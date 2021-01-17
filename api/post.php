<?php 

    // Allowing POST method only
    if (!isset($_POST)) {
        die('<h1 class="try-hack">Restricted access!</h1>');
    }

    session_start();
    define('BASE', 'BASE');
    
    require_once '../utility/config.php';
    require_once '../utility/db.php';
    require_once '../utility/utility.php';

    $isContextValid = true;
    if (isset($_POST['context'])) {
        switch($_POST['context']) {
            case 'login':
                require_once './home/login.php';
                break;
            case 'logout':
                require_once './home/logout.php';
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