<?php
  header('Content-Type:application/json');

require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');

$id=$_POST['id'];


if(isset($_SESSION['cart'])){
    

    $cart=$_SESSION['cart'];

    
   
// Sample array


// Remove the element with value 'banana'
$key = array_search($id, $cart);
if ($key !== false) {
    unset($_SESSION['cart'][$key]);

    $response=array(
        'status'=> 'success',
        'message'=> 'Item remvoed from cart'
    );

    echo json_encode($response);
}

// Display the modified array

}

?>