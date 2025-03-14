<?php
  header('Content-Type:application/json');

require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');


if(!isset($_SESSION['cart'])){
    
    $_SESSION['cart']=array();

}
else{
    $cart=$_SESSION['cart'];


foreach($_POST as $key => $value) {
    if(in_array($value,$cart)){

        $response=array(
        "status"=>"error",
        "message"=>"Item already in cart",
        );

      
        echo json_encode($response);
        exit;
    }
    else{
        // var_dump($value);
$_SESSION['cart'][]=$value;
$response=array(
    "status"=>"ok",
    "message"=>"Itsasem added to cart",
    );

    echo json_encode($response);
    exit;
    }
}}

?>