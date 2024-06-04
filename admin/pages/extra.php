

<?php require('../common/head.php') ?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">

    <a class="navbar-brand ps-3" href="index.php">E-Commerce</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>

    <?php require('../common/navbar.php') ?>
    <?php require('../common/sidebar.php') ?>


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</li></a>
                    <li class="breadcrumb-item active">Products</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="modal-body">
                            <form action="actions/add_products.php" id="updateForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-3" hidden>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">ID</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="id" aria-label="ID" name="id" aria-describedby="basic-addon1" value="<?php echo $allproducts[0]['id'] ?>">
                                </div>   
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Name" aria-label="Username" name="product_name" aria-describedby="basic-addon1" value="<?php echo $allproducts[0]['product_name'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Description</span>
                                    </div>
                                    <input type="text" class="form-control input-control" placeholder="Description" aria-label="Description" name="description" aria-describedby="basic-addon2" value="<?php echo $allproducts[0]['description'] ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">Category_name</label>
                                    </div>
                                    <select name="cat_id" id="inputGroupSelect02" class="form-control input-control">
                                        <?php foreach ($allcategories as $k => $item) { ?>
                                            <option value="<?php echo $item["category_id"] ?>" <?php echo ($item["category_name"] == $allproducts[0]["category_name"]) ? "selected" : ""; ?>>
                                                <?php echo $item["category_name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Price</span>
                                    </div>
                                    <input type="number" class="form-control input-control" placeholder="price" aria-label="price" name="price" aria-describedby="basic-addon2" value="<?php echo $allproducts[0]['price'] ?>">
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
                                            <span class="d-block text-danger delete_img" data-id="<?php echo $row['id'] ?>" style="float:right ;">
                                                <i class="fa-solid fa-delete-left"></i>
                                            </span>
                                            <img src="assets/img/<?php echo $row['image_name'] ?>" class="rounded" height="200px" width="200px">
                                        </div>
                                    <?php
                                    } ?>
                                </div>
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
    
    </main>
    <?php require('../common/footer.php') ?>

    </body>

    </html>


    <?php require('../common/script.php') ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
        $(document).ready(function() {

            $('.delete_img').on('click', function() {
                var id = $(this).attr('data-id');
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

                        $.ajax({
                            cache: false,
                            type: 'POST',
                            data: {
                                image_id: id
                            },
                            url: 'actions/image_delete.php',
                            success: function(response) {
                                if (response == 0) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then((result) => {
                                        window.location.href = "update_form_products.php?id=<?php echo $id ?>";
                                    })

                                } else {
                                    Swal.fire('You can not deleted this category')
                                }


                            }

                        });

                    }
                })
            })
        })

// This code uses the FormData object directly to send the form data via AJAX. Also, note that I've set contentType: false and processData: false to ensure that jQuery doesn't process the data or set the content type, as it would with a standard form submission.

// Make sure your server-side script ("actions/add_products.php") handles the FormData correctly, using $_POST for form fields and $_FILES for file uploads.

        $('#updateForm').submit(function(e) {
            e.preventDefault();

            // Create FormData object
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "actions/update_products.php",
                type: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false, // Set content type to false
                processData: false, // Prevent jQuery from processing the data
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
                            window.location.href = 'update_form_products.php?id=<?php echo $id ?>';
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