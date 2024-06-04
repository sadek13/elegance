<?php 
session_start();
unset($_SESSION['username']);
session_destroy();
require('C:\\xampp\htdocs\\www\\matjar\\admin\\actions\\check-login.php');
exit;
?>