<?php 

require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');


require('../class/product.class.php');
$product=new Product();

$featuredProds=$product->getFeaturedProducts();

$preFilter=isset($_GET['prefilter']) ? $_GET['prefilter'] : null;

$preFilterObj=array(
'prefilter' => $preFilter
);


$jsPre=json_encode($preFilterObj);



?>


                <!DOCTYPE html>
<html lang="en">

<head>   

<?php require('../common/head.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Catalog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">





    <style>
        /* Add your custom styles here */

        #cart-button{
            color: white;
            background-color: FF6F61;
        }

        #cart-button:hover{
            color:FF6F61;
            background-color:white;
        }

        

        .product-list {
            display: flex;
            flex-wrap: wrap;
        }

        .product-item {
            width: 25%; /* Adjust as needed */
            padding: 10px;
            position: relative;
           
        }

        

        .card-buttons {
            opacity: 0;
            position: absolute;
            top: 20%;
            left: 30%;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s ease-in-out;
        
        }

        .product-item:hover .card-buttons {
            opacity: 1;
        }

        .card-buttons button {
    width: 100%; /* Set the width to 100% */
    margin-bottom: 5px; /* Adjust spacing between buttons */
    background-color: #ff6f61;
    height: 40px;
    
   
}   

.card-buttons button i {
    color: #FFFFFF; /* Corrected color format */
    
}   

.card-buttons button:hover {
    background-color: #FFFFFF; /* Corrected color format */
    /* No need to repeat width, margin-bottom, and height here */
}   

.card-buttons button:hover i {
    color: #ff6f61;
}



        
        .prodLink .card-body{
    text-decoration: none; /* Remove underlines or other decorations */
    user-select: none; /* Prevent text highlighting on selection */
    color:black;
    text-decoration-line: none;
}

 
.prodLink{
    text-decoration: none; /* Remove underlines or other decorations */
    user-select: none; /* Prevent text highlighting on selection */
    color:black;
    text-decoration-line: none;
}


    </style>
</head>

<body>
<?php require('../common/nav-bar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <!-- Filter Section -->
            <div class="col-md-3 filter-section">
                <!-- Your filter options here -->


                <h3>Filters</h3>
                <!-- Category Checkboxes -->
                <div class="form-group">
                    <h5>Categories</h5>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter category " id="category-rings" value='rings'>
                        <label class="form-check-label" for="category-rings">Rings</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter category" id="category-necklace" value='necklace'>
                        <label class="form-check-label" for="category-nekclace">Necklace</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter category" id="category-bracelets" value='bracelets'>
                        <label class="form-check-label" for="category-bracelets">Bracelets</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter category" id="category-pendants" value='pendants'>
                        <label class="form-check-label" for="category-pendants">Pendants</label>
                    </div>
                   
                    <!-- Add more categories as needed -->
                </div>

                <div class="form-group">
                    <h5>Material</h5>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter material " id="material-diamond" value='diamond'> 
                        <label class="form-check-label" for="material-diamond">Diamond</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter material" id="material-gold" value='gold'>
                        <label class="form-check-label" for="material-gold">Gold</label>
                    </div>
                   
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter material" id="material-silver" value='silver'>
                        <label class="form-check-label" for="material-silver">Silver</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input filter material" id="material-bronze" value='bronze'>
                        <label class="form-check-label" for="material-bronze">Bronze</label>
                    </div>
                 
                    <!-- Add more categories as needed -->
                </div>

                
                <div class="form-group">
                    <h5>Weight g</h5>
                    <input type="range" class="form-control-range filter weight" id="weight-slider" min="0" max="100">
                    <span id="weight-range-label"></span>
                </div>

                <div class="form-group">
                    <h5>Price Range $</h5>
                    <input type="range" class="form-control-range price " id="price-slider" min="0" max="3000" value='1000'>
                    <span id="price-range-label"></span>
                </div>


            </div>


            <!-- Product List -->
            <div class="col-md-9 product-list">
                <!-- Product Cards -->
               
                    <!-- Product Item 1 -->
                 

</div>

<div>
<?php require('../elements/home/featured.php'); ?>
</div>
                    <!-- Add more product cards as needed -->
              
    <!-- Bootstrap JS and dependencies -->

</body>



</html>

<?php require('../common/script.php'); ?>

<?php require('../common/footer.php'); ?>

<script>

  



   
    let categories =[]
    let materials =[]
    let weight=$('#weight-slider').val()
    let price=$('#price-slider').val()


    function prodsDisplay(para,images='') {
        
        if(Array.isArray(para)){
     
           let  products=para
var displayElement=$('.product-list')
 
displayElement.empty();

let counter=0

console.log(images[counter][1][0]['img'])
    products.forEach(sub => {
       

let img=images[counter][sub['prod_ID']][0]['img']

       
// console.log(images[1])
        displayElement.append(`
        <a href='product-details.php?id=${sub['prod_ID']}' class='prodLink'>

        <div class="card-deck product-item mx-3" id='productsDis'>
        <img src="../images/${img}" alt=" products" width="100px" height="100px" />
        </a>
       
      
            <div class="card-body">
                <h5 class="card-title">${sub['prod_title']}</h5>
                <p class="card-text"> ${sub['category_name']}</p>
                <p class="card-text">$ ${sub['price']}</p>
            </div>
           
            <div class="card-buttons">
                <button id='cart-button' class="btn addToCart" data-product-id=${sub['prod_ID']}><i class="fa-solid fa-cart-shopping"></i></button>
               
            </div>
        
            
            </div>

    `
        
     
            );

            counter++
        })

    }

else{

    productDisplay.empty();
    productDisplay.append(
        `<p>${para}</p>`);
            
 
    }}




    function getProducts() {
            
  return $.ajax({
      url: '../actions/filter.php',
      data:{
      categories,
      materials,
      weight,
      price
      },
      type: 'POST',
      success: function (result) {
          // Handle success
       res=JSON.parse(result)
       console.log(res)
       
              // rest of your code...
             if(res.status=='ok')
          {
            prodsDisplay(res.products,res.images)
       

      // Create a script element with your JavaScript code
var scriptElement = document.createElement('script');
scriptElement.id = 'myDynamicScript';  // Set an ID
          
if (!document.getElementById('myDynamicScript')) {
        scriptElement.innerHTML = 
            $('.addToCart').click(function(){
                let url='../actions/add_to_cart.php';
                let id=$(this).attr('data-product-id');

              
                $.ajax({
                    url: url,
                    dataType: 'json',
                    type: 'POST',
                    data: { id: id},
                    success: function(response){
                       
                        if(response.status=='ok'){
                        Swal.fire({
  icon: "success",
  title: 'success',
  text: response.message,
  timer:2000,
  showConfirmButton: false

})}
else{

                        Swal.fire({
  icon: "error",
  title: 'ERROR',
  text: response.message,
  timer:2000,
  showConfirmButton: false

})}

                    }
                });
            });
        ;

        // Append the script element to the head of the document
        document.head.appendChild(scriptElement);}
// Later, you can remove the script element using its ID


          }
         else{
            prodsDisplay(res.message)
         }
              
          
  
          }
        , 
         error: function (request, status, error) {
   error(error.message);
      },
  });
    }

    // const urlParams = new URLSearchParams(window.location.search);
    // const prefilter = urlParams.get('prefilter');

    // if (prefilter === 'necklace') {
    //     $('#category-necklace').prop('checked', true);
    // }

    $(document).ready(function() {

        const urlParams = new URLSearchParams(window.location.search);
    const prefilter = urlParams.get('prefilter');

    if (prefilter === 'necklace') {
        $('#category-necklace').prop('checked', true);
        categories.push($('#category-necklace').val());
    }
    if (prefilter === 'bracelets') {
        $('#category-bracelet').prop('checked', true);
        categories.push($('#category-bracelet').val());
    }
    if (prefilter === 'rings') {
        $('#category-ring').prop('checked', true);
        categories.push($('#category-ring').val());
    }
    if (prefilter === 'pendants') {
        $('#category-pendant').prop('checked', true);
        categories.push($('#category-pendant').val());
    }
        getProducts()
   


        $('#weight-range-label').append(
            $('#weight-slider').val())

            $('#weight-slider').change(function(){
                
                $('#weight-range-label').html(
            $('#weight-slider').val())
            })


            $('#price-range-label').append(
            $('#price-slider').val())

            $('#price-slider').change(function(){
                
                $('#price-range-label').html(
            $('#price-slider').val())
            })
        
      
        $('.category').click(function(){
            if ($(this).is(':checked')) {
                categories.push($(this).val());
            
            } else {
                categories.splice(categories.indexOf($(this).val()), 1);
            }
            getProducts();
        });

        $('.material').click(function(){
           
            if ($(this).is(':checked')) {
                materials.push($(this).val());
             
            } else {
                materials.splice(categories.indexOf($(this).val()), 1);
            }
            getProducts();
        });
        
        $('.weight').change(function(){
            weight=$('.weight').val()
            getProducts();  
        });
            

        // Use event delegation by attaching the click event to a parent element
$('.product-list').on('click', '.addToCart', function() {
    // Your click event handling code goes here
    console.log('Add to cart button clicked');
});


        
  $('.addToCart').click(function(){
    alert('sa')
    let url='../actions/add_to_cart.php';
    let id=$(this).attr('data-product-id');
    $.ajax({
        url:url,
        dataType: 'json',
        data: {id:id},
        success: function(response){
console.log(response);  
        }
    })

});

    })


</script>