<?php
session_start();


if (!isset($_SESSION['login']))
    {

        header('Location: http://localhost/www/matjar/user/pages/login.php');    

    }
    ?>
    