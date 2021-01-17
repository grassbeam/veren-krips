<?php

    session_start();
    define('BASE', 'BASE');
    
    require_once './utility/config.php';
    require_once './utility/db.php';
    require_once './utility/utility.php';


    if (isset($_GET['page'])) {
      $__PageView = $_GET['page'];
    }

    if (!isset($_SESSION['isLogin'])) {
      $__PageView = "login";
    } else {
      if(!isset($__PageView)){
        $__PageView = 'home';
      }else{
        if($__PageView =='login'){
          $__PageView ='home';
        }else{
          $__PageView = $__PageView;
        }
      }
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Veren Krips bbb</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"
    <link rel="stylesheet" src="./assets/css/main.css"/>

  </head>
  <body>

    <input type="hidden" id="BASEURL" value="<?php echo base_url(); ?>">

    <?php
      if (isset($_SESSION['isLogin'])) {
        require_once './view/components/navbar.php';
      }
    ?>

    <main class="container">
    <?php
      if (isset($_SESSION['isLogin'])) {
        // Do Something about loggedin pages
        // var_dump($__PageView);
        switch ($__PageView) {
          case 'home':
            require_once './view/pages/home.php';
            break;
          case 'data':
            require_once './view/pages/data.php';
            break;
          case 'graph':
            require_once './view/pages/graph.php';
            break;
        }
      } else {
        // give login page
        require_once './view/pages/login.php';
      }
    ?>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <?php
      if (isset($_SESSION['isLogin'])) {
        ?>
      <!-- SCRIPT FOR LOGGEDIN SESSION -->
      <script src="./assets/js/navbar.js" > </script>
      <?php 
        if ($__PageView == 'data') {
      ?>
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
      <script src="./assets/js/data-nilai-table.js"></script>
      <?php } ?>
      <!-- END OF SCRIPT FOR LOGGEDIN SESSION -->
        <?php
      }
    ?>
      
  </body>
</html>
