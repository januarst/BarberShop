<?php
    session_start();
    include_once("backend/listFungsi.php");

    if(isset($_SESSION['is_logged_in'])){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['username']);
        unset($_SESSION['userId']);
        unset($_SESSION['cupon']);
    }

    header('location: frontend/index.php');
?>