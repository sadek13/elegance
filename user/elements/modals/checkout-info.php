<div class="modal" id="checkOutModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Checkout</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="post" action="../actions/category/update_category.php" id='checkOutInfo'>
     

<div class="row">
                                   <div class="col-md-6">
                                       <label>First Name</label>
                                       <input class="form-control" type="text" placeholder="First Name" name="first_name">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Last Name</label>
                                       <input class="form-control" type="text" placeholder="Last Name" name="last_name">
                                   </div>

                                   <div class="col-md-6">
                                       <label>E-mail</label>
                                       <input class="form-control" type="text" placeholder="E-mail" name="email">
                                     
                                   </div>

                                   <div class="col-md-6">
                                       <label>Mobile No</label>
                                       <input class="form-control" type="text" placeholder="Mobile No" name="mobile">
                                   </div>

                                   <h4>Recipient Delivery Info</h4>
                                   <div class="col-md-6">
                                    <label for='address'> Address</label>
                                       <input class='form-control' id="address" type='text' placeholder='Address' name='address'>

                                       <label for='street'>Street Number or Name</label>
                                       <input class='form-control' for="street" type='text' placeholder="Street" name='street'>

                                       <label for='building'>Building name floor</label>
                                       <input class='form-control' for="building" type='text' placeholder="Building" name='building'>
                                      
                                    

                                   </div>
                                
                                   
                                 
                               </div>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id='checkout'>Checkout</button>
</form>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



