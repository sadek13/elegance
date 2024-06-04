<?php 
require('../class/order.class.php');
$order =new Order();
$allOrders=$order->getallOrders();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php require('../common/head.php'); ?>

 <style>
 .hidden-row {
    display: none;
}

.clickable {
    cursor: pointer;
}

/* Styling for visual appeal */
table {
    width: 100%;
    border-collapse: collapse;
    border:10px
}

td {
    border-right: none;
    padding: 8px;
    border-top:10px

}

.bold{
font-style: bold;
font-weight: 900;
}

.italic{
font-style: italic;
font-weight: 400;
}

.details{
    font-style: regular;
font-weight: 300;
}

.clickable{
    border-top:10px;
    border-bottom:10px
}


</style>
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
       
           <div class='container-fluid'>
            <div class="row">
                <div class="col-lg-12">
<?php require('../elements/orders_table.php'); ?>                
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


    

    $(".clickable").click(function() {
       
        let id = $(this).attr("id");
      
 $(this).closest('tbody').find('.hidden-row.'+id).slideToggle();


});

   
    })
 


           

  
    
</script>
