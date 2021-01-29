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

    <!-- Library CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/main.css"/>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

      
      <!-- Custom Script -->
      <script src="./assets/js/data-nilai-page.js"></script>
      <?php } ?>

      <?php 
        if ($__PageView == 'graph') {
      ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      
      <?php } ?>

      <!-- END OF SCRIPT FOR LOGGEDIN SESSION -->
        <?php
      }
    ?>

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

      
  </body>
</html>
