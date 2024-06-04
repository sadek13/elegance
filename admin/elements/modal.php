<!-- Add Category Modal -->
<div class="modal" id="addCatModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="post" action="../actions/category/add_category.php" id='addCatForm'>
        <label for="catInput">
          <input type="text" id="catInput" name="catInput" placeholder="Enter Category Name">
        </label>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
</form>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<!-- Update Cat Modal -->

<div class="modal" id="updateCatModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="post" action="../actions/category/update_category.php" id='updateCatForm'>
        <label for="updateCatInput">
          <input type="text" id="updateCatInput" name="updateCatInput" placeholder="Enter Category Name">
          <input type="hidden" id="updateCatID" name="id">
        </label>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
</form>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<div class="modal" id="addProdModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div  class='custom-modal-body'>
      <form method="post" action="../actions/product/add_product.php" id='addProdForm' enctype="multipart/form-data">


        <label for="prodTitle" value='title'>Title:
          <input type="text" id="prodTitleInput" name="prodTitleInput">
         
        </label>
        <br>
 

        
     
<!-- Material -->
       <div> 
        <div class="container mt-5">
    <div class="btn-group" role="group" aria-label="Medal Buttons">
        <button type="button" class="btn btn-bronze text-white prod-btn mat" id="prod-bronze" value='Bronze' >Bronze</button>
        <button type="button" class="btn btn-silver text-white prod-btn mat" id="prod-silver" value='Silver'>Silver</button>
        <button type="button" class="btn btn-warning text-white prod-btn mat" id="prod-gold" value='Gold'>Gold</button>
    <button type="button" class="btn btn-silver text-white prod-btn mat" id="prod-diamond" value='Dimaond'>Diamond</button>
    


    </div>
</div>
       </div>
<br>
<br>

<label for="prodColorInput">Color
      <input type='text' id="prodColorInput" name="prodColorInput">
        </label>
        <br>
        <br>
        
        <!-- Size -->
  <div>Size:
        <div class="btn-group" id="sizeBtnGroup" role="group" aria-label="Button group">
  <button type="button" class="btn btn-dark prod-btn size" id='prod-small' value='small'>small</button>
  <button type="button" class="btn btn-dark prod-btn size" id='prod-medium' value='medium'>medium</button>
  <button type="button" class="btn btn-dark prod-btn size" id='prod-big' value='big'>big</button>
  </div>
  </div>
  <br>
  <br>


      <div>
        <label for="prodWeightInput">Weight
      <input type='number' id="prodWeightInput" name="prodWeightInput">
        </label>g
</div>
        <br>
        <br>

        <label for="prodDescInput" ></label>Item Description
        <input type='text' id="prodDescInput" name="prodDescInput">
      </label>
      <br>
      <br>

      <div>
      <label for="prodStockInput">Stock
        <input type='number' id="prodStockInput" name="prodStockInput" style="width: 50px;">
      </label>
</div>
    <br>
    <br>


<div>
      <div class="btn-group" id="sizeBtnGroup" role="group" aria-label="Button group">
       <?php foreach($allCat as $sub){?>
  <button type="button" class="btn btn-dark prod-btn cat" id="<?php echo $sub['category_ID']?>">
<?php echo $sub['category_name']?>
</button>
<?php } ?>
       
      </div>
  </div>
  <br>
  <br>
  




    
   <div>
  $:<input type="text" id="prodPrice" name="prodPrice" >
   </div>
        <br>
        <br>

        <label for="fileInput">Choose an image:</label>
    <input type="file" name="prodImg" id="fileInput">
  



   
<br>
<br>

<!-- <div>
Mark As featured<input type='checkbox' name="featureProd" id="featureProd" value='ssa'>
       </div>
          -->
 
  <input type="hidden" id="prodCatIDInput" name="prodCatIDInput">
  <input type="hidden" id="prodSizeInput" name="prodSizeInput">
  <input type="hidden" id="prodMatInput" name="prodMatInput">

  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
 
    
</form>
      </div>
    </div>

      <!-- Hidden Input -->



      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





