<?php 
require('../class/user.class.php');
$user =new User();
$allUsers = $user->getallUsers();
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
    

           <div class='container-fluid'>
            <div class="row">
                <div class="col-lg-12">
<?php require('../elements/users_table.php'); ?>                
                </div>
            </div>
           </div>
        <!-- Content End -->


        <!-- Back to Top -->
     
    <!-- JavaScript Libraries -->
  
<?php require('../common/script.php')?>
    <!-- Template Javascript -->
  
</body>

</html>
<script>



$(document).ready(()=>{
 
$('#usersTable').DataTable();
})
            
  
    
</script>
