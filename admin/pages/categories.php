<?php 
require('../class/category.class.php');
$cat =new Category();
$allCat=$cat->getallCategories();
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCatModal">
    ADD
  </button>
            </div>

           <div class='container-fluid'>
            <div class="row">
                <div class="col-lg-12">
<?php require('../elements/category_table.php'); ?>                
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
  
</body>

</html>
<script>



$(document).ready(()=>{
 
$('#catTable').DataTable();
  
  $("#addCatForm").on('submit', function (e) {
  e.preventDefault();

  var form = $(this).serialize();

  $.ajax({
      url: $(this).attr('action'),
      data: form,
      type: 'POST',
      success: function (result) {
          // Handle success
       
          if (result.status == 'ok') {
              // rest of your code...

              Swal.fire({
title: 'Success!',
text: result.message,
icon: 'success',
confirmButtonText: 'Cool'
}).then(()=>{
    window.location.reload();
})
              
          }
          else{
            
            Swal.fire({
title: 'OOPS!',
text: result.message,
icon: 'fail',
confirmButtonText: 'Try argain'
})
          }
        }, 
         error: function (request, status, error) {
       alert(error.message);
      },
  });
});





    $(".delete").on('click',function(){
     var id = $(this).attr("id");

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
                  if(response.status=='ok') {
             
                   // Reload the current page
location.reload();

                }},
                error: function (xhr, status, error) {
            // Handle errors
            console.log(error.message);
           
        }
            });
        }})
        });
    })
    

    

    $('.edit').on('click',function(){
     
     var id=$(this).attr('id');
     var name=$(this).attr('name');

 
     $("#updateCatInput").val(name);
     
     $("#updateCatID").val(id);
     $('#updateCatModal').modal('show');   



 })


    $('#updateCatForm').submit(function(e) {
        
     
        e.preventDefault();

            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                dataType: 'json',
                data:form.serialize(),
                  
                success: function(response) {
                          
                  
            if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'categories.php';
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
           
        },
    })
})
            
  
    
</script>
