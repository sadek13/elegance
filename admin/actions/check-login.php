<?php 
session_start();
if (!$_SESSION['login'] || $_SESSION["user-type"] != 'admin')
    {



       
header('Location: http://localhost/www/matjar/user/pages/login.php');
exit;
    }

  
    
    ?>
    