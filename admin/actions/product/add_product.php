<?php
require('C:\xampp\htdocs\www\matjar\admin\class\product.class.php');

header('Content-Type: application/json');

var_dump($_POST);
var_dump($_FILES);

$prod=new Product();



$title=$_POST['prodTitleInput'];
$color=$_POST['prodColorInput'];
$mat=$_POST['prodMatInput'];
$stock=$_POST['prodStockInput'];


$price=$_POST['prodPrice'];





$desc=$_POST['prodDescInput'];

$weight=$_POST['prodWeightInput'];




$catID=$_POST['prodCatIDInput'];

$created_at=date('Y-m-d H:i:s');


// $featured=$_POST['featureProd'];





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected
    if (isset($_FILES["prodImg"])) {
        // $uploadDir = "C:\\xampp\\htdocs\\www\\matjar\\user\images"; // Specify the directory to save the uploaded images
        $image=$_FILES['prodImg']['name'];

        $uploadDir = "../../images/";

        // Get information about the uploaded file
        $originalName = basename($_FILES["prodImg"]["name"]);
     
        $targetPath = $uploadDir . $originalName;
        $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);


        // Check if the file is an image
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (in_array($fileType, $allowedTypes)) {
            if (file_exists($targetPath)) {
                $counter = 1;
            
                // Loop until a unique filename is found
                while (file_exists($targetPath)) {  
          
                    $targetPath=$uploadDir;
                    $fileName = pathinfo($originalName, PATHINFO_FILENAME) . "($counter)." . pathinfo($originalName, PATHINFO_EXTENSION);
                    $targetPath=$targetPath . $fileName;

            

                    $counter++;
                   

                }
                echo $targetPath;
            }
            
            // Move the uploaded file to the specified directory
            if (!move_uploaded_file($_FILES["prodImg"]["tmp_name"], $targetPath)) {
                $response=array(
                    "status"=> "error",
                    "message"=> "error occured while uploading image file"
                );
                echo json_encode($response);
                exit;
            } 
        } else {
                 $response=array(
                    "status"=> "error",
                    "message"=> "Sorry, only JPG, JPEG, PNG, and GIF files are allowed."
                );
                echo json_encode($response);

            exit;
        }
    } else {
        $response=array(
            "status"=> "error",
            "message"=> "No file selected"
        );
        echo json_encode($response);
        exit;
    }
}





$pro=$prod->insertProduct($title,$desc,$price,$stock,$weight,$color,$mat) ;
$prod->insertProductImage($pro,$image);

$response=array(
    'status'=> 'success',
    'message'=>'product added successfully'
);

header('Content-Type: application/json');

echo json_encode($response);


exit; // Make sure to exit to ensure the redirect happens

?>
