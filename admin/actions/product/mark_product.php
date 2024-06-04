<?php

require('C:\xampp\htdocs\www\matjar\admin\class\product.class.php');

$product = new product();

$state=$_POST['state'];
$id=$_POST['id'];

$response = array(
    'status' => 'error',
    'message' => 'an error has occurred'
);


if($state =='1'){

$product->unmarkAsFeatured($id);

    $response = array(
        'status' => 'ok',
        'message' => 'product has been unmarked as featured '
    );
    }



else{
    $product->markAsFeatured($id);

    $response = array(
        'status' => 'ok',
        'message' => 'product has been marked as featured '
    );
       
    }


       
    header('Content-Type:application/json');
    // Set the Content-Type header
    echo json_encode($response); // Output the JSON response


?>




