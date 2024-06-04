<?php

// require('C:\\xampp\htdocs\\www\\matjar\\admin\\actions\\check-login.php');

require('C:\xampp\htdocs\www\matjar\admin\class\category.class.php');

$categories = new Category();

$id=$_POST['id'];
$name=$_POST['updateCatInput'];



if ($categories->categoryExists($name,$id)) {
    $response = array(
        'status' => 'error',
        'message' => 'Category already exists. Please choose a different category.'
    );
} else {

    $categories->updatecategory($id,$name);
    
    $response = array(
        'status' => 'success',
        'message' => 'Category updated successfully.'
    );
}

header('Content-Type: application/json');
echo json_encode($response);
?>
