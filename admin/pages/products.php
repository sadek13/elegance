<?php 
include_once '../class/product.class.php';
include_once '../class/category.class.php';

$prod =new Product();
$allProducts=$prod->getAllProducts();
$productTable=$prod->getProdTableContent();

$cat=new Category();
$allCat=$cat->getallCategories();

var_dump(count($allProducts));



?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php require('../common/head.php'); ?>
</head>

<body>
    <!-- modal -->
   <?php require('../elements/modal.php'); ?>
    <!-- modal-end -->
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        
        <!-- Spinner End -->


        <!-- Sidebar Start -->
      <?php require('../common/sidebar.php'); ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
           <?php require('../common/navbar.php'); ?>
            <!-- Navbar End -->


            <!-- content-->
            <div align='right' style='margin:10px 0px 10px 10px'>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProdModal">
    ADD
  </button>
            </div>

           <div class='container-fluid'>
            <div class="row">
                <div class="col-lg-12">
<?php require('../elements/products_table.php'); ?>                
                </div>
            </div>
           </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
  
<?php require('../common/script.php')?>
    <!-- Template Javascript -->

    <form action="../actions/product/add_product.php" method="post" enctype="multipart/form-data">
 
</form>
  
</body>

</html>
<script>

$(document).ready(function(){
  


    $('#prodTable').DataTable();


    $('.marked').on('click',function(){
        let id=$(this).attr('id');
       
   $.ajax({

    url:'../actions/product/mark_product.php',
    dataType: 'json',
    type:'post',
    data:{
state:'1',
id:id
    },
    success: function(result) {
       if(result.status=='ok'){
      
        Swal.fire({
        title: 'Success',
        text: result.message,
        icon: 'success',
        timer: 1000,
  showConfirmButton: false

       }).then(function(){
        window.location.reload();
       })
    }},
    error: function(xhr, status, error) {
        // Handle error
        console.error("AJAX Error: " + status + ": " + error);
        // Optionally, display an alert or update the UI
        alert("An error occurred: " + error);
    }
    
})  
    })



$('.unmarked').on('click',function(){
        let id=$(this).attr('id');
   $.ajax({

    url:'../actions/product/mark_product.php',
    dataType: 'json',
    type:'post',
    data:{
state:'0',
id:id
    },
    success: function(result) {
        if(result.status=='ok'){
            Swal.fire({
        title: 'Success',
        text: result.message,
        icon: 'success',
        timer: 1000,
  showConfirmButton: false

       })
        .then(function(){
            window.location.reload();
        })
        }


       },
       error: function(xhr, status, error) {
        // Handle error
        console.error("AJAX Error: " + status + ": " + error);
        // Optionally, display an alert or update the UI
        alert("An error occurred: " + error);
    }
       
    })
    
})})  


    


    $('.mat').on('click', function() {
    $('#prodMatInput').val($(this).val());
   
});

$('.cat').on('click', function() {
 
    $('#prodCatIDInput').val($(this).attr('id'));
});

    $('.size').on('click', function() {
    $('#prodSizeInput').val($(this).val());
   

})


$('#addProdForm').on('submit', function(e) {
    
    e.preventDefault(); //
    let url=$(this).attr('action');
    let form=$(this).serialize();

    $.ajax({
        url:url,
        type:'post',
        dataType: 'json',
        data: form,
        success: function(response) {
            console.log(response);
        },
        
        error: function (xhr, status, error) {

  console.log(errro.message)
        }
    })

$(".delete").on('click',function(){
     var id = $(this).attr("id");
     alert(id);
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // TODO: Perform the delete action here
      

            $.ajax({
                url:'../actions/category/delete_category.php',
                type: 'POST',
                dataType: 'json',
                data:{id},

                
            
                  
                success: function(response) {
                  console.log(response);
             
                   
                },
                error: function (xhr, status, error) {
            // Handle errors
            
                    
                    let responseText = JSON.parse(xhr.responseText)
                    console.log(responseText)
            if (responseText.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            location.reload()
                        });
                    } else if (response.status === 'error') {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        });
                    } 
           
        }
            });
        }})
        });
    })
    

$('.select').on('click', function() {
    let id = $(this).attr('id');
    var href ='product-details.php?id='
window.location.href = href+ id;

}
)








</script>
