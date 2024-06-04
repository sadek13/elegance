<?php $imagePath='../../user/images/' ?>;
<table id='prodTable' class="table table-bordered table-hover">
      
  

      <thead>
    <tr>

   <th>Stock</th>  
 <th>Name</th>
 <th>Type</th>
 <th>Material</th>
 <th>image</th>
 <th>Price</th>
 <th>Actions</th>
      
  
</tr>

        </thead>
<tbody>
<?php 

foreach($productTable as $sub){ ?>

<tr id="<?php echo $sub['prod_ID']?>">
<td><?php echo $sub['stock']?></td>
<td><?php echo $sub['prod_title']?></td>
<td><?php echo $sub['category_name']?></td>
<td><?php echo $sub['material']?></td>

<?php if ($prod->getDisplayImage(1)[0]['img']!="") { ?>
<td><img src="<?php echo $imagePath.$prod->getDisplayImage($sub['prod_ID'])[0]['img']?>" style='width:100px;height:100px'></td>
<?php } else { ?>
  <td>No Image Found</td>
<?php } ?>
<td><?php echo $sub['price']?></td>

<td style="text-align: right;">
<?php if($sub['featured']==1){?>
  <span id="<?php echo $sub['prod_ID']?>" class="marked">featured</span>
<?php }else{ ?>
  <span id="<?php echo $sub['prod_ID']?>" class="unmarked">unfeatured</span>
  <?php } ?>
<span  id="<?php echo $sub['prod_ID']?>" class="fa fa-ban delete "></span>

<span  id="<?php echo $sub['prod_ID']?>" class="fa fa-edit select"></span>
</td>


<?php } ?>
</tr>

</tbody>

</table>

