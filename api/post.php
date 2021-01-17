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


    if (!isset($_POST['context'])) {
        echo json_encode(createGeneralResponseModel(false, "Invalid Context"));
    } else {
        switch($_POST['context']) {
            case 'login':
                require_once './login/login.php';
                break;
        }
    }


?>