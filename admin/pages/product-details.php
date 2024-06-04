<?php 
require("../class/product.class.php");
require("../class/category.class.php");
$products = new Product();
$categories=new Category();

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    // Get the value of the 'id' parameter
    $id = $_GET['id'];

  
  
} 

$allcategories = $categories->getallcategories();
$productDetails=$products->getProductByID($id);
var_dump($id);

$allimages = $products->getProductImagesById($id);
// var_dump($allimages);exit;

?>
<?php require('../common/head.php') ?>


    <style>
        .btn-custom {
    background-color: black; /* Golden background */
    color: white; /* White text */
    border: none; /* Removes border, optional */
    margin-bottom:10px;
}

.btn-custom:hover {
    background-color: #d4af37; /* Slightly darker gold on hover, optional */
}
</style>
<div class="content">
    <?php require('../common/sidebar.php'); ?>

    <?php require('../common/navbar.php');
   ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class ="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</li></a>
                    <li class="breadcrumb-item active">Products</li>
                </ol>

                <div class="card mb-4">

                    <div class="card-body">
                        <div class="modal-body">
                        <div style="text-align: right;">
                        <?php if($productDetails[0]['featured']==1){ ?>
                        <button id="<?php echo $productDetails[0]['prod_ID'] ?>" class="btn btn-custom marked">Featured</button>

                        <?php } else { ?>
                            <button id="<?php echo $productDetails[0]['prod_ID'] ?>" class="btn btn-custom unmarked">Not Featured</button>
                            <?php } ?>

</div>

                            <form action="../actions/product/update_product.php" id="updateForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-3" hidden>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">ID</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="id" aria-label="ID" name="id" aria-describedby="basic-addon1" value="<?php $productDetails[0]['prod_ID'] ?>">
                                </div>   
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Name" aria-label="Username" name="prodTitleInput" aria-describedby="basic-addon1" value="<?php echo $productDetails[0]['prod_title'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Description</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Description" aria-label="Description" name="prodDescInput" aria-describedby="basic-addon2" value="<?php echo $productDetails[0]['description'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Category</label>
                                    </div>
                                    <select name="prodCatIDInput" id="inputGroupSelect02" class="form-control input-control">
                                        <?php foreach ($allcategories as $k => $item) { ?>
                                            <option value="<?php echo $item["category_ID"] ?>" <?php echo ($item["category_name"] == $productDetails[0]["category"]) ? "selected" : ""; ?>>
                                                <?php echo $item["category_name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Material</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Material" aria-label="material" name="prodMatInput" aria-describedby="basic-addon2" value="<?php echo $productDetails[0]['material'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Weight  g</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="Weight" aria-label="weight" name="prodWeightInput" aria-describedby="basic-addon2" value="<?php echo $productDetails[0]['weight'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Color</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="color" aria-label="color" name="prodColorInput" aria-describedby="basic-addon2" value="<?php echo $productDetails[0]['stock'] ?>">
                                </div>


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Price  $</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="price" aria-label="price" name="prodPriceInput" aria-describedby="basic-addon2" value="<?php echo $productDetails[0]['price'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Stock</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="Stock" aria-label="stock" name="prodStockInput" aria-describedby="basic-addon2" value="<?php echo $productDetails[0]['stock'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Images</span>
                                    </div>
                                    <input type="file" class="form-control input-control" placeholder="Images" aria-label="Images" name="images[]" aria-describedby="basic-addon3" multiple>
                                </div>
                                <div class="row">
                                    <?php foreach ($allimages as $k => $row) { ?>
                                      
                                 
                                        <div class="col-sm-4 text-center my-3">
                                            <span class="d-block text-danger delete_img fa fa-ban" data-id="<?php echo $row['img_ID'] ?>" style="float:right ;">
                                                <i class="fa-solid fa-delete-left"></i>
                                            </span>
                                            <img src="../../user/images/<?php echo $row['img'] ?>" class="rounded" height="200px" width="200px">
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                                <input type="hidden" name="prod_ID" value="<?php echo $id ?>" />    
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" value="submit"> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                                  </div>
    </div>
    </div>
    
    </main>
  

    </body>

    </html>


    <?php require('../common/script.php') ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
        $(document).ready(function() {
         
            $('.delete_img').on('click', function() {
                var id = $(this).attr('data-id');
              
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

                        $.ajax({
                            cache: false,
                            type: 'POST',
                            data: {
                               id
                            },
                            url: '../actions/product/delete_image.php',
                            success: function(response) {
                                if (response.status == 'ok') {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then((result) => {
                                        window.location.href = 'product-details.php?id=<?php echo $id ?>';
                                    })

                                } else {
                                    Swal.fire('You can not delete this category')
                                }


                            }

                        });

                    }
                })
            })




           }) 

                 

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
    
})

    
        

// This code uses the FormData object directly to send the form data via AJAX. Also, note that I've set contentType: false and processData: false to ensure that jQuery doesn't process the data or set the content type, as it would with a standard form submission.

// Make sure your server-side script ("actions/add_products.php") handles the FormData correctly, using $_POST for form fields and $_FILES for file uploads.

        $('#updateForm').submit(function(e) {
            e.preventDefault();

            // Create FormData object
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "../actions/product/update_product.php",
                type: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false, // Set content type to false
                processData: false, // Prevent jQuery from processing the data
                success: function(response) {
                    if (response.status === 'ok') {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'button btn btn-primary app_style'
                            }
                        }).then(function() {
                            window.location.href = 'product-details.php?id=<?php echo $id ?>';
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
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        });
                    }
                }
      
        });

   
  
    });

    </script>
