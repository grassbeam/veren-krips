<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>
    <div class="jumbotron page-header">
        <p class="h1">Graph Page</p>  
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum dapibus arcu eget condimentum. Curabitur sagittis sollicitudin quam non iaculis. In hac habitasse platea dictumst. Praesent tempus ligula ac accumsan viverra. Ut tempus eleifend molestie. Integer quis blandit nunc. Praesent at leo eu sem finibus porta vel nec metus.</p>
    </div>
    <div class="container">
        <div class="row graph-row">
            <div class="col-6 pl-0 ">
                <?php 
                    require_once './view/components/graph/graph1.php';
                ?>
            </div>
            
            <div class="col-6 pr-0 ">
                <?php 
                    require_once './view/components/graph/graph2.php';
                ?>
            </div>

        </div>

        <div class="row graph-row">
            <div class="col-12 p-0">
                <?php 
                    require_once './view/components/graph/graph3.php';
                ?>
            </div>
        </div>

        <div class="row graph-row">
            <div class="col-12 p-0">
                <?php 
                    require_once './view/components/graph/graph4.php';
                ?>
            </div>
        </div>

        <div class="row graph-row">
            <div class="col-12 p-0">
                <?php 
                    require_once './view/components/graph/graph5.php';
                ?>
            </div>
        </div>

    </div>