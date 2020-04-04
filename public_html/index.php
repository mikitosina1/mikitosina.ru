<?php
    require_once "./miki_components/functions.php";
    session_start();
    include("./miki_connect/connect.php");
    function is_guest(){
        if (!empty($_SESSION['log'])) {
            return false;
        }return true;
    }
?>
<!DOCTYPE HTML>
<html lang="ru">
    <?php require_once './miki_components/head.php';?>
    <body>
    <?php require_once './miki_components/nav_panel.php';?>
    <div class="container-fluid main_content">
        <div class="row cell_content">
            <div class="col-sm-8 l_side_content"></div>
            <div class="col-sm-4 mt-4 r_side_content">
                <?php require './miki_components/chat.php';?>
                <?php require_once './miki_components/userpanel.php';?>
            </div>
        </div>
    </div>
    <?php require_once './miki_components/footer.php';?>
    </body>
</html>