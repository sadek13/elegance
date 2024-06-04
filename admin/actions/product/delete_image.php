<?php 
require('../../class/image.class.php');

require('../../class/product.class.php');

header('Content-Type: application/json');


$prod=new Product();

$image=new Image();

$id=$_POST['id'];


if($image->deleteImage($id)){

    $response=array(
        'status' => 'ok',
        'message' => 'Image deleted successfully'
    );
    
    echo json_encode($response);
    
 
}

