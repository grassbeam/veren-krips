<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    // Can use db here...

    // Do Login
    $isLoginValid = false;
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Username password validation
        if ($username == 'admin' && $password == admin) {
            $isLoginValid = true;
            $_SESSION['username'] = $username;
        }
    }

    if ($isLoginValid) {
        $_SESSION['isLogin'] = 1;
        echo '<h1>Processing...</h1>';
        redirectJS("../");
    } else {
        alertRedirectJS("Invalid Username or Password!", "../");
    }

?>