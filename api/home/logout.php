<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    // Can use db here...

    echo '<h1>Processing...</h1>';
    
    session_destroy();
    
    redirectJS(base_url());

?>