
let orderArray = array()

function getSubAndTotal() {

let subTotal=0

$('.price').each(function() {
// Parse the price as a float and add it to the subtotal
subTotal += parseFloat($(this).val());

});
let grandTotal = subTotal + parseFloat($('#delivery-cost').data('delivery-cost'));


$('#sub-total').html('$'+subTotal)
$('#grand-total').html('$'+grandTotal);
}

function orderArray(){


}


    $(document).ready(function(){
    alert('sa')
    }
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





 
    

});