<?php 


require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');


require('../class/category.class.php');
require('../class/product.class.php');
require('../class/user.class.php');



$product=new Product();
$category=new Category();
$user=new User();

// Now you can set session variables

//ID
$userID= $_SESSION['userID'];



//getting error from not having the id inside the url when going back using the home button
$userIN=$user->getUserDataByID($userID);

$prod=$product->getProductById(1);




$featuredProds=$product->getFeaturedProducts();
$cats=$category->getallCategories(); 


$_SESSION['userID'] = $userID;    






?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require('../common/head.php');?>

  
    </head>

    <body>



        <!-- Top bar Start -->
  <?php //require('../common/top-bar.php');?>
        <!-- Top bar End -->

        <span id="words"></span>
<input id="number" type="text" />
<button id='translate'></button>
        
        <!-- Nav Bar Start -->
        <?php require('../common/nav-bar.php');?>
        <!-- Nav Bar End -->      
        


        
        
        <!-- Main Slider Start -->
    
       <?php require('../elements/home/main-slider.php');?>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
    <?php //require('../elements/home/brands.php');?>
        <!-- Brand End -->     
        
        
    

        
        <!-- Example Displayer-->
<?php //require('../elements/home/example-displayer.php'); ?>
        <!-- Example Displayer End-->       


        
        <!-- Call to Action Start -->
      <?php require('../elements/home/call.php'); ?>
        <!-- Call to Action End -->       
        
       
<div id='featured'> 
        <!-- Featured Product Start -->
        <?php require('../elements/home/featured.php'); ?>
        <!-- Featured Product End -->       
        
</div>
        <!-- Self Procs Start -->
        <?php require('../elements/home/self-procs.php'); ?>
        <!-- Self Procs End -->


        <!-- Footer Bottom Start -->
     <?php require('../common/footer.php');?>
        <!-- Footer Bottom End -->       
        
    
   
    <?php 
    require('../common/script.php');?>
     
    </body>
</html>
<script>

//     function sendPreFilter(filter){
      
              
//         $.ajax({
//                     url: url,
//                     dataType: 'json',
//                     type: 'POST',
//                     data:filter,                
//     })

//     }

//     $(document).ready(function(){
//         let filter;
//      $('#b-necklace').on('click', function() {
//         filter='necklace';
        
//      })

//      $('#b-rings').on('click', function() {
//         filter='rings';

//      })

//      $('#b-bracelets').on('click', function() {
//         filter='braceletes';
//      })

//      $('#b-pendants').on('click', function() {
//         filter='prendants';
//      })

     
// sendPreFilter(filter)



    </script>
