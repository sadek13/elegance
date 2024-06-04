<?php

require('C:\xampp\htdocs\www\matjar\admin\class\product.class.php');

$product = new product();

var_dump($_POST);
$id=$_POST['id'];

    $prod = $prod->deleteProduct($id);
  $result=$prod;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'The name of category is already exists'
        );
    } else {


        $response = array(
            'status' => 'ok',
            'message' => 'Category deleted successfully'
        );
    }

    header('Content-Type:application/json');
    // Set the Content-Type header
    echo json_encode($response); // Output the JSON response


?>




