<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>

      <div class="bg-light p-5 rounded">
        <div class="mx-5">
          <form action="./api/post.php" method="post">
            <input type="hidden" name="context" value="login">
            <div class="form-group">
              <label for="txtUsername">Username</label>
              <input type="text" class="form-control" name="username" style="max-width: 75%;" id="txtUsername" >
            </div>
            <div class="form-group">
              <label for="txtPassword">Password</label>
              <input type="password" class="form-control" name="password" style="max-width: 75%;" id="txtPassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>