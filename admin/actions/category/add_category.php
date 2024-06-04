<?php


require('C:\xampp\htdocs\www\matjar\admin\class\category.class.php');





$categories = new Category();


if ($_POST) {
    $name = $_POST['catInput'];

    $category = $categories->getcategory($name);
    $result = $category;
    if ($result) {
        $response = array(
            'status' => 'error',
            'message' => 'The name of category is already exists'
        );
    } else {
        $categories->insertcategory($name);

        $response = array(
            'status' => 'ok',
            'message' => 'Category added successfully'
        );
    }

    header('Content-Type: application/json');
    // Set the Content-Type header
    echo json_encode($response); // Output the JSON response
}


// Check if the form is submitted


?>




