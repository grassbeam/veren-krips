<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>

      <div class="bg-light p-5 rounded">
          <h3>Welcome, <?php echo ucwords($_SESSION['username']); ?> !</h3>
      </div>