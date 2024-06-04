

   
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