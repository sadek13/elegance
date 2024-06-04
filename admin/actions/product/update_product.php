<?php
require('C:\xampp\htdocs\www\matjar\admin\class\product.class.php');

header('Content-Type: application/json');


$prod=new Product();


$title=$_POST['prodTitleInput'];
$color=$_POST['prodColorInput'];
$mat=$_POST['prodMatInput'];
$stock=$_POST['prodStockInput'];


$price=$_POST['prodPriceInput'];




$desc=$_POST['prodDescInput'];

$weight=$_POST['prodWeightInput'];




$catID=$_POST['prodCatIDInput'];



$prod_ID=$_POST['prod_ID'];

$created_at=date('Y-m-d H:i:s');


// $featured=$_POST['featureProd'];


$images=$_FILES['images'];


$fixedImages=$images;

$allimages=array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected

    $product = $prod->checkIfProductExists($title);
    $result = $product;

    if (!$result) {
        $response = array(
            'status' => 'error',
            'message' => 'The name of the product already exists'
        );
      
    } else {

      
        // Check if any images were uploaded
        if (!empty($images['name'][0])) {
      
            // Iterate through each uploaded image
            $validExtensions = array("jpg", "jpeg", "png");

            $uploadDir = "../../../user/images/";

            // Get information about the uploaded file

         
            
           

           

            foreach ($images['name'] as $k => $value) {
                // Check if the file has a valid extension

 

                $originalName=$images['name'][$k];
                $extension = strtolower(pathinfo($images["name"][$k], PATHINFO_EXTENSION));
                $baseName=strtolower(pathinfo($images["name"][$k], PATHINFO_BASENAME));
                $targetPath = $uploadDir . $originalName;
              
              


                if (in_array($extension, $validExtensions)) {
                    // Move the file and insert into the database
     
                    // if (file_exists($targetPath)) {
                    //     $counter = 1;
                    //     echo $counter;
                    //     // Loop until a unique filename is found
                    //     while (file_exists($targetPath)) {  
                  
                    //         $targetPath=$uploadDir;
                    //         $fileName = pathinfo($originalName, PATHINFO_FILENAME) . "($counter)." . pathinfo($originalName, PATHINFO_EXTENSION);
                    //         $targetPath=$targetPath . $fileName;
        
                    
        
                    //         $counter++;
                           
        
                    //     }
                        
                    // }
                   
                    $allimages[]=$originalName;

           
                  
                } else {
                         $response=array(
                            "status"=> "error",
                            "message"=> "Sorry, only JPG, JPEG, PNG, and GIF files are allowed."
                        );
                        echo json_encode($response);
        
                    exit;
                }
             
            } 
             
            }
        }
}

if(!empty($allimages)){   
    $counter=0;
foreach($allimages as $image){
         if (!move_uploaded_file($_FILES["images"]["tmp_name"][$counter], $targetPath)) {
           $response=array(
               "status"=> "error",
               "message"=> "error occured while uploading image file"
           );
           echo json_encode($response);
           exit;
       } 
       $counter++;
    }
}



$product = $prod->updateProduct($title,$catID,$desc,$price,$stock,$weight,$color,$mat,$prod_ID);

          
if(!empty($allimages)){
    foreach($allimages as $image) {
       $prod->insertProductImage($prod_ID,$image);
    }
   
    
        $counter=0;
      
    }
 
$response=array(
   "status"=> "ok",
   "message"=> "Product Edited"
);
echo json_encode($response);
exit;









// $response=array(
//     'status'=> 'success',
//     'message'=>'product added successfully'
// );

// header('Content-Type: application/json');

// echo json_encode($response);


// exit; // Make sure to exit to ensure the redirect happens

?>
