<?php
require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');

require('../class/product.class.php'); 

$product=new Product();

$price=$_POST['price'];

if(isset($_POST['weight'])){
    $weight=$_POST['weight'];
    
     
    }







$sql = "SELECT * 
        FROM products
        JOIN categories ON products.cat_ID = categories.category_ID
        WHERE products.price between 0 AND '$price' AND products.weight between 0 AND '$weight' 
   
        ";



if(isset($_POST['categories'])){
    $categories = $_POST['categories'];
    $categoryConditions = array();

    foreach ($categories as $sub) {
        switch ($sub) {
            case 'rings':
                $categoryConditions[] = "categories.category_name = 'rings'";
                break;
            case 'bracelets':
                $categoryConditions[] = "categories.category_name = 'bracelets'";
                break;
            case 'pendants':
                $categoryConditions[] = "categories.category_name = 'pendants'";
                break;
            case 'necklace':
                $categoryConditions[] = "categories.category_name = 'necklace'";
                break;
            // Add more cases as needed
        }
    }

    // Combine category conditions with OR
    if (!empty($categoryConditions)) {
        $sql .= " AND (" . implode(" OR ", $categoryConditions) . ")";
    }
}


if (isset($_POST['materials'])) {
    $materials = $_POST['materials'];
    $materialConditions=[];

    foreach ($materials as $sub) {
        switch ($sub) {
            case 'diamond':
               $materialConditions[] = "material='diamond'";
                break;
            case 'gold':
                $materialConditions[] = "material='gold'";
                break;
            case 'silver':
                $materialConditions[] = "material='silver'";
                break;
            case 'bronze':
                $materialConditions[] = "material='bronze'";
                break;
            // Add more cases as needed
        }
    }
}

if (!empty($materialConditions)) {
    $sql .= " AND (" . implode(" OR ", $materialConditions) . ")";
}








$prods = $product->getdata($sql);

$imageArray = array(); // Initialize an empty array



foreach ($prods as $sub) {

    $image = $product->getAProdImage($sub['prod_ID']); // Assuming getAProdImage is a method that gets the image
    $imageArray[][$sub['prod_ID']] = $image;
    }

if (count($prods) > 0) {
    $response = array(
        "status" => "ok",
        "products" => $prods,
        "images" => $imageArray
    );
}

else{
    $response=array(
        "status"=>"no",
        "message" => "No Items Found"
    );
}

echo json_encode($response);

?>




