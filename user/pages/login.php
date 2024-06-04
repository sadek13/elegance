   <!DOCTYPE html>
   <html lang="en">

   <head>
       <?php
       
        require('../common/head.php'); ?>
        <style>
            #citySelect{
                width:100px;
                padding-bottom:8px
            }
            </style>
   </head>

   <body>






       <!-- Nav Bar Start -->
       <?php
       
       require('../common/nav-bar-login.php'); ?>
       <!-- Nav Bar End -->

       <p id="topNot">
           <!-- <span><i class="fas fa-check"></i></span> -->

       </p>



       <!-- Login Start -->

       <div class="login">
           <div class="container-fluid">
               <div class="row">

                   <div class="col-lg-6">
                       <div class="register-form">
                           <form action='../actions/register.php' method='post' enctype='multipart/form-data' id='registerForm'>
                               <div class="row">
                                   <div class="col-md-6">
                                       <label>First Name</label>
                                       <input class="form-control" type="text" placeholder="First Name" name="first_name">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Last Name"</label>
                                       <input class="form-control" type="text" placeholder="Last Name" name="last_name">
                                   </div>

                                   <div class="col-md-6">
                                       <label>E-mail</label>
                                       <input class="form-control" type="email" placeholder="E-mail" name="email">
                                      <p class='error' id='emailTaken'>
                                   </div>
                                   <div class="col-md-6">
                                       <label for="city">City</label><br>
                                       <select id='citySelect' id="city" name='city'>
                                           <option>Tyre</option>
                                           <option>Saida</option>
                                           <option>Beirut</option>
                                           <option>Tripoli</option>
                                           <option>Bekaa</option>

                                       </select>

                                   </div>
                                   <div class="col-md-6">
                                    <!-- Chnaged this to type text; was using type text before -->
                                       <label>Mobile No</label>
                                       <input class="form-control" type="text" placeholder="Mobile No" name="mobile">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Password</label>
                                       <input class="form-control" type="password" placeholder="Password" name="password">
                                   </div>
                                   

                                   <div class="col-md-12">
                                       <button type='submit' class="btn">Create Account</button>
                                   </div>
                               </div>
                           </form>

                       </div>
                   </div>

                   <div class="col-lg-6">
                       <div class="login-form">
                           <form action='../actions/login.php' method='post' id='loginForm'>

                               <div class="row">
                                   <div class="col-md-6">

                                       <label>E-mail</label>
                                       <input class="form-control" type="text" placeholder="E-mail" name='l-email'>
                                   </div>
                                   <div class="col-md-6">
                                       <label>Password</label>
                                       <input class="form-control" type="password" placeholder="Password" name='l-password'>
                                   </div>
                                 
                                   <div class="col-md-12">
                                       <button type='submit' class='btn'>Log In</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Login End -->




       <!-- Footer Bottom Start -->
       <?php require('../common/footer.php'); ?>
       <!-- Footer Bottom End -->

       <!-- Back to Top -->
       <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

       <?php require('../common/script.php'); ?>

   </body>

   </html>

   <script>
    //    function topNotification(not, state) {
    //        let topNot = $('#topNot');
    //        if (state == 'registered') {

    //        } else {

    //        }
    //    }


       $(document).ready(function() {



        //    let t = $('#emailTaken');


        //    t.css('visibility', 'hidden');
         


           $('#registerForm').on('submit', function(e) {
       
 $('form input[type="text"]').each(function() {
    if($(this).val() ==''){
e.preventDefault(); //
//         Swal.fire({
//   icon: "succes",
//   title: "Welcome",
//   text: response.message,
//   timer:2000,
//   showConfirmButton: false


//     }).then(result=>{
//         console.log(result);
//     })
    }
 

  }) 
  

               // Serialize the form data
               e.preventDefault();
               let formData = $(this).serialize();

               // Specify the URL for the AJAX request
               let url = $(this).attr('action');

               // Make the AJAX request
               $.ajax({
                   type: 'POST', // or 'GET' depending on your form submission method
                   url: url,
                   data: formData,
                   success: function(response) {
                       // Handle the success response here


                       console.log(response);
                  


                       if (response.status == "error") {
                           // Show the element with id 'emailTaken'
                           Swal.fire({
  icon: "error",
  title: "Oops...",
  text: response.message
  
});
                           
                         
                       } 
                       else{
                        Swal.fire({
  icon: "success",
  title: "Welcome",
  text: response.message,
  timer:2000,
  showConfirmButton: false

}).then(function(){
    window.location.reload();
}
)
                       }
                   


                   },
                   error: function(error) {
                       // Handle the error response here
                       console.error(error);
                   }
               });
           });
       });



       $('#loginForm').on('submit', function(e) {
           e.preventDefault();

           // Serialize the form data
           let formData = $(this).serialize();

           // Specify the URL for the AJAX request
           let url = $(this).attr('action');

           // Make the AJAX request
           $.ajax({
               type: 'POST', // or 'GET' depending on your form submission method
               url: url,
               data: formData,
               success: function(response) {
                   // Handle the success response here
                   console.log(response.status);
                   console.log(response.id)
                   let id

                   if (response.status == 'user') {
                       id = response.id
                       window.location.href='../pages/home.php?id='+id;
                   } else if (response.status == 'admin') {
                       id = response.id
                       window.location.href='../../admin/pages/categories.php?id='+id;

                   } else {
                    Swal.fire({
  icon: "error",
  title: "Wrong email or password",
  text: response.message
  
});
                   }
               },
               error: function(error) {
                   // Handle the error response here
                   console.error(error);
               }
           });
       });

       $('input[type="text"],textarea,input[type="password"]').on('input', function() {
 var trimmedValue = $(this).val().trim();
 if (trimmedValue == "") {
 $(this).val(trimmedValue);
 }
 });


   </script>