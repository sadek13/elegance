<?php
require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');


require('../class/product.class.php');
$product = new Product();

$productID = isset($_GET['id']) ? $_GET['id'] : null;

$prod = $product->getProductById($productID);



?>




<!DOCTYPE html>
<html lang="en">

<head>

  <?php require('../common/head.php'); ?>

  <script>
    var prodArray = <?php echo json_encode($prod); ?>;
  </script>

</head>

<body>


  <!-- Top bar Start -->
  <?php //require('../common/top-bar.php');
  ?>
  <!-- Top bar End -->



  <!-- Nav Bar Start -->
  <?php require('../common/nav-bar.php'); ?>
  <!-- Nav Bar End -->







  <body>




    <!-- Product Detail Start -->

    <?php require('../elements/product-details/whole.php'); ?>



    <!-- Product Detail End -->




















    <!-- Footer Bottom Start -->
    <?php require('../common/footer.php'); ?>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <?php require('../common/script.php');
    ?>


  </body>

</html>

<script>
  var prodArray = <?php echo json_encode($prod); ?>;
  var size;
  var maxQuantity;
  var price;

  function updateSpecs() {
    if (size == 0) {
      $('#quantity').attr('max', prodArray[0]['s_quantity']);
    }

    if (size == 1) {
      $('#quantity').attr('max', prodArray[0]['m_quantity']);
    }

    if (size == 2) {
      $('#quantity').attr('max', prodArray[0]['l_quantity']);
    }

    maxQuantity = $('#quantity').attr('max');
  }

  $(document).ready(function() {
    if (prodArray[0]['s_quantity'] > 0) size = 0;
    else if (prodArray[0]['l_quantity'] > 0) size = 2;
    else if (prodArray[0]['m_quantity'] > 0) size = 1;
    else size = 1;

    updateSpecs();

    $('#quan-inc').on('click', function() {
      let q = $('#quantity').val();
      if (q < maxQuantity) {
        $('#quantity').val(parseInt(q) + 1);
      }
    });

    $('#quan-dec').on('click', function() {
      let q = $('#quantity').val();
      if (q > 0) {
        $('#quantity').val(parseInt(q) - 1);
      }
    });

    $('#addToCart').click(function() {
      let url = '../actions/add_to_cart.php';
      let id = $(this).attr('data-product-id');

      $.ajax({
        url: url,
        dataType: 'json',
        type: 'POST',
        data: {
          id: id
        },
        success: function(response) {
          if (response.status == 'ok') {
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: response.message,
              timer: 2000,
              showConfirmButton: false,
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.message,
              timer: 2000,
              showConfirmButton: false,
            });
          }
        },
      });
    });
  });
</script>