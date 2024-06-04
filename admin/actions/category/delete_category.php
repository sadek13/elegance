<?php

require('C:\xampp\htdocs\www\matjar\admin\class\category.class.php');

$categories = new Category();

$id=$_POST['id'];

    $category = $categories->deletecategory($id);
  $result=$category;
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




