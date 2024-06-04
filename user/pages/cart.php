<?php 
 require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');

require('../class/product.class.php');
 require('../common/head.php');
$product=new Product();




$items=isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$jsonItems = json_encode($items);

$userID=json_encode($_SESSION['userID']);




// $wishlist=$_SESSION['wishlist'];
// $wishProds=[];
// foreach($wishlist as $item){
// $prod=$product->getProductByID($item);
// $wishProds.push($prod);



function getImage($id,$product){
    return $product->getAProdImage($id)[0]['img'];
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require('../common/head.php');?>
    </head>

    <body>


    <!-- checkout-info modal start -->
    <?php require('../elements/modals/checkout-info.php'); ?>

   <!-- checkout-info modal end -->
        
        <!-- Nav Bar Start -->
        <?php require('../common/nav-bar.php');?>
        <!-- Nav Bar End -->      
   

        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Material</th>
                                            
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <?php foreach ($items as $item) {
                                            $prod=$product->getProductByID($item);
                                            $image=$product->getAProdImage($item);

                                            
                                    ?>

                                        <tr>
                                            <td>
                                                <div>
                                                  <p id='prod_title' class='prod-title'><?php echo $prod[0]['prod_title'] ?></p>
                                                </div>
                                            </td>
                                            <td><img src='../images/<?php echo $image[0]['img'] ?>' style='width:100px;height:100px'></td>
                                            
                                            <td id='material' class='material'><?php echo $prod[0]['material'] ?></td>
                                  
                                        
                                                <td><div class="qty" id="<?php echo $prod[0]['prod_ID']?>">
                                                    
                                                    <input type="number" class="quantity  <?php echo $prod[0]['prod_ID']?>" value="1" min="1" max='5' id="<?php $prod[0]['prod_ID']?>">
                                                   
                                                   
                                                </div>
                                            </td>

                                            <!-- <td><div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" class='qunatity' value='1' max='2' id="<?php $prod[0]['prod_ID']?>">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td> -->

                                            <td>
    <input class='price <?php echo $prod[0]['prod_ID']; ?>' id="<?php echo $prod[0]['prod_ID']; ?>" value="<?php echo $prod[0]['price']; ?>" data-price="<?php echo $prod[0]['price']; ?>">
</td>

                                            <td><button><i class="fa fa-trash remove" id='<?php echo $prod[0]['prod_ID'] ?>'></i></button></td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                        </table>
                                        </div>
            </div>
        </div>

                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                             
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span id='sub-total'></span></p>
                                            <p>Delivery Cost<span id='delivery-cost' data-delivery-cost="5">$5</span></p>
                                            <h2>Grand Total<span id='grand-total'></span></h2>
                                            
                                        </div>


                                        <div class="cart-btn">
                                          
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkOutModal">

Checkout
  </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          
        <!-- Footer Bottom Start -->
     <?php require('../common/footer.php'); ?>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  
        <?php require('../common/script.php');?>
      
    </body>
</html>


<script>

let cartItems = <?php echo $jsonItems; ?>;
let userID=<?php echo $userID ?>

function orderInfo(){






}


function orderAndIndividItemsInfo() {
    let individItems = {}; // Use an array to store individual items
    let orderInfo = {};
    let data={
        'userID':userID
    } //
    cartItems.forEach(id => {
        let _id=id
        let item={};
        let elements = $('.' + id); // Assuming id is the correct identifier
        elements.each(function() { // Use .each() for jQuery objects
            //
            let element = $(this); // Convert to jQuery object
            
           
         

            if (element.hasClass('price')) {
                item.price = element.val();
            }
            if (element.hasClass('quantity')) {
                item.quantity = element.val();
            }
            
            individItems[_id]=item
            
            

        });

       

    });

    
   // Alerting the stringified version of the

   let grandTotal=$('#grand-total').html()
   let charToRemove = '$';

let newGrand = grandTotal.split(charToRemove).join('');

orderInfo.orderTotal=newGrand



data.individItems=individItems; //
        data.orderInfo=orderInfo; //
    

return data;

        console.log(data);
   
}



function getSubAndTotal() {

let subTotal=0

$('.price').each(function() {
// Parse the price as a float and add it to the subtotal
subTotal += parseFloat($(this).val());

});
var grandTotal = subTotal + parseFloat($('#delivery-cost').data('delivery-cost'));


$('#sub-total').html('$'+subTotal)
$('#grand-total').html('$'+grandTotal);
}




    $(document).ready(function(){
  

getSubAndTotal();
          
        $('.remove').on('click', function(){
         
            let id=$(this).attr('id')
            $.ajax({
                url:'../actions/remove_from_cart.php',
                type:'post',
                dataType: 'json',
                data:{id},
                success:function(response){
                    Swal.fire({
  icon: "success",
  title: 'success',
  text: response.message,
  timer:2000,
  showConfirmButton: false
                }
                    )
                    location.reload();
          
        }
    }
    )
    })

    $('.quantity').each(function(index) {
     
    $(this).on('change', function() {
      
        var quantity = $(this).val();
        var priceElement = $('.price').eq(index);
        var price=priceElement.data('price');

        priceElement.val(price * quantity);
      
      getSubAndTotal()
      

    });
});


$('#checkOutInfo').on('submit',function(e){
    
    e.preventDefault();



 
nonForm=orderAndIndividItemsInfo()

    let formData=$(this).serializeArray()
    $.ajax({
                url:'../actions/checkout.php',
                type:'post',
                dataType: 'json',
                data:{
                   formData,
                   nonForm
                
                
                    

                },
                success:function(response){

                    if(response.status=='ok'){
                   
                        Swal.fire({
  icon: "success",
  title: "Welcome",
  text: response.message,
  timer:2000,
  showConfirmButton: false

}).then(function(){
    window.location.href = 'http://localhost/www/matjar/user/pages/home.php';

}
)
                       }
                    
    }}
    )
})
    })



    




</script>