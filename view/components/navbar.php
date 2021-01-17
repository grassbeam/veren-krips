<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="./">VEREN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item<?php if ($__PageView == 'home') echo ' active' ?>">
          <a class="nav-link" href="./">Home</a>
        </li>
        <li class="nav-item<?php if ($__PageView == 'data') echo ' active' ?>">
          <a class="nav-link" href="./?page=data">Data</a>
        </li>
        <li class="nav-item<?php if ($__PageView == 'graph') echo ' active' ?>">
          <a class="nav-link" href="./?page=graph">Graph</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" id="formLogout" action="<?php echo base_url() . 'api/post.php' ?>" method="post"> >
        <input type="hidden" name="context" value="logout">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" id="btnLogout">LOGOUT</button>
      </form>
    </div>
  </nav>
