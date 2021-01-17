<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>

        <div class="jumbotron page-header">
            <p class="display-4">Welcome, <?php echo ucwords($_SESSION['username']); ?> !</p>  
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum dapibus arcu eget condimentum. Curabitur sagittis sollicitudin quam non iaculis. In hac habitasse platea dictumst. Praesent tempus ligula ac accumsan viverra. Ut tempus eleifend molestie. Integer quis blandit nunc. Praesent at leo eu sem finibus porta vel nec metus.</p>
        </div>